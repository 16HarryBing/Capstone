<?php
session_start();
include('../connect.php');

// Get the transaction ID and product code
$id = $_GET['id'];
$code = $_GET['code'];

// Query to get the order details
$result = $db->prepare("SELECT * FROM sales_order WHERE transaction_id = :id");
$result->bindParam(':id', $id);
$result->execute();

$row = $result->fetch();

// Get the quantity and product code from the order
$qty = $row['qty'];
$product_code = $row['product_code'];

// Update the product quantity in the inventory
$sql = "UPDATE products SET qty = qty + :qty WHERE product_code = :code";
$q = $db->prepare($sql);
$q->execute(array(':qty'=>$qty, ':code'=>$product_code));

// Delete the order from the database
$sql = "DELETE FROM sales_order WHERE transaction_id = :id";
$q = $db->prepare($sql);
$q->bindParam(':id', $id);
$q->execute();

// Redirect to the sales page with the invoice number
$invoice = $_GET['invoice'];
$sdsd = $_GET['dle'];
header("location: sales.php?id=$sdsd&invoice=$invoice");
?>