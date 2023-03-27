<?php
session_start();
include('../connect.php');

// Get form data
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$cname = $_POST['cname'];
$f = $_POST['cash'];

// Only insert customer if a name is provided
if (!empty($cname)) {
    // Check if customer name already exists in the database
    $sql = "SELECT * FROM customer WHERE customer_name = :cname";
    $q = $db->prepare($sql);
    $q->execute(array(':cname'=>$cname));
    $row = $q->fetch(PDO::FETCH_ASSOC);

    // If customer name doesn't exist, insert it into the database
    if (!$row) {
        $sql = "INSERT INTO customer (customer_name) VALUES (:cname)";
        $q = $db->prepare($sql);
        $q->execute(array(':cname'=>$cname));
    }
}

// Insert sales data into the database
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,amount_tendered,name) VALUES (:a,:b,:c,:d,:e,:z,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname));
header("location: preview.php?invoice=$a");
