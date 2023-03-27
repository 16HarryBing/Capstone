<?php
session_start();
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$name = $_POST['name'];
$username = $_POST['username'];
$position = $_POST['position'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// check if current password is correct
$sql = "SELECT * FROM user WHERE id = ?";
$q = $db->prepare($sql);
$q->execute(array($id));
$user = $q->fetch(PDO::FETCH_ASSOC);

if (!empty($current_password)) {
    if (md5($current_password) !== $user['password']) {
        $_SESSION['error1'] = "Current password is incorrect!";
        header("location: edituser.php?id=$id");
        exit();
    }

    // check if new password and confirm password match
    if (!empty($new_password) && $new_password !== $confirm_password) {
        $_SESSION['error1'] = "New password and Confirm Password did not match!";
        header("location: edituser.php?id=$id");
        exit();
    }

    // check if new password meets strength requirements
    if (!empty($new_password) && (strlen($new_password) < 8 || !preg_match("#[0-9]+#", $new_password) || !preg_match("#[A-Z]+#", $new_password) || !preg_match("#[a-z]+#", $new_password))) {
        $_SESSION['error1'] = "New password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
        header("location: edituser.php?id=$id");
        exit();
    }

    // update user with new data and new password
    if (!empty($new_password)) {
        $password = md5($new_password);
        $sql = "UPDATE user 
                SET name=?, username=?, password=?, position=?
                WHERE id=?";
        $q = $db->prepare($sql);
        $q->execute(array($name, $username, $password, $position, $id));
    } else {
        $sql = "UPDATE user 
                SET name=?, username=?, position=?
                WHERE id=?";
        $q = $db->prepare($sql);
        $q->execute(array($name, $username, $position, $id));
    }

} else {

        $sql = "SELECT COUNT(*) AS count FROM user WHERE username = ?";
$q = $db->prepare($sql);
$q->execute(array($username));
$row = $q->fetch(PDO::FETCH_ASSOC);
if ($row['count'] > 0 && $user['username'] !== $username) {
    $_SESSION['error1'] = "Username already exists!";
    header("location: edituser.php?id=$id");
    exit();
}
    // update user with new data and keep old password
    $sql = "UPDATE user 
            SET name=?, username=?, position=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($name, $username, $position, $id));
}

header("location: admin-settings.php");
exit();

?>
