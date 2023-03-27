<?php
// Initialize the database connection
$conn = mysqli_connect('localhost', 'root', '', 'sales');

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the user's search query
$q = mysqli_real_escape_string($conn, $_GET['q']);

// Query the database for product names and codes that match the search query
$sql = "SELECT * FROM products WHERE product_code LIKE '%$q%' OR product_name LIKE '%$q%'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// Create an array of matching product names and codes
$suggestions = array();
while ($row = mysqli_fetch_assoc($result)) {
  $suggestions[] = $row['product_id']. "- ".  $row['product_code'] . " - " .$row['gen_name'] . " - ". $row['product_name'];
}

// Return the suggestions as a JSON response
echo json_encode($suggestions);

// Close the database connection
mysqli_close($conn);
?> 