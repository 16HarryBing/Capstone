<?php
include('../connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userId = $_POST['id'];
  $newStatus = $_POST['status'];
  
  // update the user status in the database
  $query = "UPDATE user SET status = :status WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam(':status', $newStatus);
  $stmt->bindParam(':id', $userId);
  $result = $stmt->execute();

  if ($result) {
    echo 'success';
  } else {
    echo 'error';
  }
}