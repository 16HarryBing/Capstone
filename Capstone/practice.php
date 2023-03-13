<?php

// Define the array of search items
$searchItems = array("apple", "banana", "orange", "grape", "kiwi");

// Check if a search query has been submitted
if (isset($_GET['search'])) {
  $searchQuery = $_GET['search'];
  $foundMatch = false;
  
  // Loop through the search items to find a match
  foreach ($searchItems as $item) {
    if (strtolower($item) == strtolower($searchQuery)) {
      // Display the search item if there's a match
      echo "The search item \"" . $item . "\" was found!";
      $foundMatch = true;
      break;
    }
  }
  
  // If no match was found, display an error message
  if (!$foundMatch) {
    echo "Sorry, the search item \"" . $searchQuery . "\" was not found.";
  }
}

?>

<!-- HTML form to submit a search query -->
<form action="" method="get">
  <label for="search">Search for an item:</label>
  <input type="text" name="search" id="search">
  <button type="submit">Search</button>
</form>