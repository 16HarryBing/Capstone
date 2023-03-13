<?php
include('../connect.php');

$product_name = $_GET['product_name'];

$stmt = $db->prepare("SELECT qty FROM products WHERE product_name = :product_name");
$stmt->bindParam(':product_name', $product_name);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo $result['qty'];
?>
