<?php
// configuration
include('../connect.php');
// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['username'];

$d = $_POST['position'];
$e = $_POST['current_password'];
// query
if($_POST['password'] == ""){

        $sql = "UPDATE user 
        SET name=?, username=?, password=?, position=?
        WHERE id=?";
$q = $db->prepare($sql);
$q -> execute(array($a,$b,$e,$d,$id));   
header("location: admin-settings.php");

}
else
{

        $c=md5($_POST['password']);
        $sql = "UPDATE user 
        SET name=?, username=?, password=?, position=?
        WHERE id=?";
$q = $db->prepare($sql);
$q -> execute(array($a,$b,$c,$d,$id));   
header("location: admin-settings.php");

}
?>
