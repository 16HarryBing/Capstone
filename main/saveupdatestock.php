<?php
  include('../connect.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $new_qty = $_POST['new_qty'];

    // Validate inputs
    if (!is_numeric($new_qty) || $new_qty <= 0) {
      echo "Invalid quantity entered.";
      exit();
    }

    // Get current quantity from database
    $query = "SELECT qty FROM products WHERE product_name = :product_name";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->execute();
    $current_qty = $stmt->fetchColumn();

    // Calculate updated quantity
    $update_qty = $current_qty + $new_qty;

    // Update stock in database
    $query = "UPDATE products SET qty = :update_qty WHERE product_name = :product_name";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':update_qty', $update_qty);
    $stmt->bindParam(':product_name', $product_name);
    if ($stmt->execute()) {
      header("Location: products.php");
      exit();
    } else {
      echo "Error updating stock.";
    }
  }
?>
