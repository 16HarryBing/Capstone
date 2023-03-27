<?php
$id = $_POST['id'];
$invoice = $_POST['invoice'];
$qty = $_POST['qty'];

// Connect to database
include('../connect.php');

// Select the latest data with the given invoice
$result = $db->prepare("SELECT * FROM sales_order WHERE invoice = ? ORDER BY date DESC LIMIT 1");
$result->execute([$invoice]);
$row = $result->fetch();

if ($row) {
  // Update the quantity of the latest data
  $new_qty = $qty;
  $new_price = $new_qty * $row['amount'];
  
  $stmt = $db->prepare("UPDATE sales_order SET qty = ?, amount = ? WHERE invoice = ?");
  $stmt->execute([$new_qty, $new_price, $invoice]);
}

// Redirect back to the previous page
header("Location: sales.php?id=$id&invoice=$invoice");
exit();

?>
