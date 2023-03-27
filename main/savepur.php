<?php
session_start();
include('../connect.php');
$a = $_POST['iv'];
$b = $_POST['date'];
$c = $_POST['supplier'];
// query
$sql = "INSERT INTO purchases (invoice_number,date,suplier) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: purchasesportal.php?iv=$a");


?>