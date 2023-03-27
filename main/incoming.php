<?php
session_start();
include('../connect.php');

// Get form data
$invoice = $_POST['invoice'];
$product_data = explode(' - ', $_POST['product']);
$product_code = $product_data[0];
$gen_name = isset($product_data[1]) ? $product_data[1] : "";
$product_name = isset($product_data[2]) ? $product_data[2] : "";
$qty = $_POST['qty'];
$date = $_POST['date'];

if (!empty($product_code)) {
    // Query to get product price, profit, generic name, and name
    $result = $db->prepare("SELECT price, profit, gen_name, product_name FROM products WHERE product_code = :product_code");
    $result->bindParam(':product_code', $product_code);
    $result->execute();
    $row = $result->fetch();

    // Check if the product code exists in the database
    if ($result->rowCount() == 0) {
        // product code not found in the database, show error message and redirect to sales.php page
        $_SESSION['error1'] = 'Product not found in database';
        $pt = $_POST['pt'];
        header("Location: sales.php?id=$pt&invoice=$invoice");
        exit();
    }

    // Get the product's generic name and name
    $gen_name = $row['gen_name'];
    $product_name = $row['product_name'];

    // Query to get product quantity
    $result_qty = $db->prepare("SELECT qty FROM products WHERE product_code = :product_code");
    $result_qty->bindParam(':product_code', $product_code);
    $result_qty->execute();
    $row_qty = $result_qty->fetch();
    // Check if product quantity is greater than or equal to 1
    if (( $row_qty['qty'] - $qty) < 0) {
        // product quantity is zero after update, show error message and redirect to sales.php page
        $_SESSION['error1'] = 'Insufficient Quantity';
        $pt = $_POST['pt'];
        header("Location: sales.php?id=$pt&invoice=$invoice");
        exit();
    }

    $price = $row['price'];
    $profit = $row['profit'];

    // Calculate total and profit
    $total_amount = $price * $qty;
    $total_profit = $profit * $qty;

    // Update product quantity
    $sql = "UPDATE products SET qty = qty - :qty WHERE product_code = :product_code";
    $q = $db->prepare($sql);
    $q->execute(array(':qty'=>$qty, ':product_code'=>$product_code));

    // Insert data into database
    $sql = "INSERT INTO sales_order (invoice, product_code, gen_name, name, qty, price, profit, amount, date) VALUES (:invoice, :product_code, :gen_name, :name, :qty, :price, :profit, :amount, :date)";
    $q = $db->prepare($sql);
    $q->execute(array(':invoice'=>$invoice, ':product_code'=>$product_code, ':gen_name'=>$gen_name, ':name'=>$product_name, ':qty'=>$qty, ':price'=>$price, ':profit'=>$total_profit, ':amount'=>$total_amount, ':date'=>$date));
}

// Redirect to sales.php page
$pt = $_POST['pt'];
header("Location: sales.php?id=$pt&invoice=$invoice");
exit();
?>
