<?php
session_start();
include('../connect.php');

// Get form data
$a = $_POST['name'];
$b = $_POST['username'];
$c = $_POST['password'];
$d = $_POST['position'];
$e = $_POST['cpassword'];

// Check if password is empty
if (empty($c)) {
    $_SESSION['error1'] = "Password cannot be empty!";
    $_SESSION['name'] = $a;
    $_SESSION['username'] = $b;
    $_SESSION['position'] = $d;
    header("location: adduser.php");
    exit();
}

// Check if password meets strength requirements
if (strlen($c) < 8 || !preg_match("#[0-9]+#", $c) || !preg_match("#[A-Z]+#", $c) || !preg_match("#[a-z]+#", $c)) {
    $_SESSION['error1'] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
    $_SESSION['name'] = $a;
    $_SESSION['username'] = $b;
    $_SESSION['position'] = $d;
    header("location: adduser.php");
    exit();
}

// Check if password and confirm password match
if ($c != $e) {
    $_SESSION['error1'] = "Password and Confirm Password did not match!";
    $_SESSION['name'] = $a;
    $_SESSION['username'] = $b;
    $_SESSION['position'] = $d;
    header("location: adduser.php");
    exit();
}

// Check if username already exists
$sql = "SELECT COUNT(*) AS count FROM user WHERE username = :b";
$q = $db->prepare($sql);
$q->execute(array(':b' => $b));
$row = $q->fetch(PDO::FETCH_ASSOC);
if ($row['count'] > 0) {
    $_SESSION['error1'] = "Username already exists!";
    $_SESSION['name'] = $a;
    $_SESSION['username'] = $b;
    $_SESSION['position'] = $d;
    header("location: adduser.php");
    exit();
}

// Insert new user
$sql = "INSERT INTO user (name, username, password, position) VALUES (:a, :b, :c, :d)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a, ':b' => $b, ':c' => md5($c), ':d' => $d));
header("location: admin-settings.php");
exit();

?>