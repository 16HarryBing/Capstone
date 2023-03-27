<?php
// Connect to the database
$db = new PDO("mysql:host=localhost;dbname=sales", "root", "");

// Retrieve the product data from the database
$stmt = $db->prepare("SELECT * FROM products WHERE code = :code");
$stmt->bindParam(":code", $_POST["code"]);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the product data in JSON format
header("Content-Type: application/json");
echo json_encode($product);
?>
