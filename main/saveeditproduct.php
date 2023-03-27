<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $d - $g; // calculate profit
$i = $_POST['gen'];
$j = $_POST['date_arrival'];

// query
$sql = "UPDATE products SET product_name=:b, price=:d, supplier=:e, qty=:f, o_price=:g, profit=:h, gen_name=:i, date_arrival=:j WHERE product_code=:a";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j));
header("location: products.php");
?>
