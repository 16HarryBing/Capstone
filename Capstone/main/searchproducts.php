<?php include('sales.php'); ?>

<div class="searchform">
<?php
      include('../connect.php');
      $result = $db->prepare("SELECT * FROM products");
      $result->execute();
    ?>
<form method="post" action="incoming.php?id=cash&invoice=<?php echo $finalcode ?>">
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
  <input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
  <input type="number" name="qty" value="" min="0" max=" " placeholder="Qty" autocomplete="off" style="width: 68px; border-radius: 5px;	 height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
  <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
  <input type="hidden" name="date" value="<?php echo date("y/m/d"); ?>" />
  <label for="keywords">Search for products:</label>
  <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-remove"></i>  </i></a>
 
  <input type="text" name="product" id="search" placeholder="Enter keywords" onkeyup="getSuggestions()" autocomplete="off">
  <button type="submit">Search</button>
  <ul class="suggest" id="suggestions"></ul>
</form>

<Style> 
.searchform { 
  width: 30%;
  background: #8dad7f;
  position: absolute; 
  top: 2.7rem;
  left: 59.5rem;
  height: 35.5rem;
  text-align: center;
  line-height: 2rem;
}
.suggest { 
  list-style: none;
  color: white;
  background: #8dad7f;
  height: 25rem;
  width: 60%;
  font-size: 20px;
  margin-left: 5rem;
  cursor: pointer;
  overflow: auto;
  margin-top: 3rem;
}
ul.suggest li {
  line-height: 2;
}
.bi-x { 
        font-size: large;
        color: black;
}
.icon-remove { 
        color: rgb(32, 32, 32);
        position: absolute;
        right: 1rem; 
        top: 1rem;
}


</Style>
<?php 
// Initialize the database connection
$conn = mysqli_connect('localhost', 'root', '', 'sales');

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the entered keywords from the form
  $keywords = mysqli_real_escape_string($conn, $_POST['product']);

  // Query the database for products that match the keywords
  $sql = "SELECT * FROM products WHERE product_name LIKE '%$keywords%'";
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful
  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }


}

// Close the database connection
mysqli_close($conn);
?>
</div>
<script>
function getSuggestions() {
  var input = document.getElementById('search').value;
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      var suggestions = document.getElementById('suggestions');
      suggestions.innerHTML = '';
      response.forEach(function(item) {
        var li = document.createElement('li');
        li.addEventListener('click', function() {
          document.getElementById('search').value = this.textContent;
          suggestions.innerHTML = '';
        });
        li.textContent = item;
        suggestions.appendChild(li);
      });
    }
  };
  xhr.open('GET', 'suggestions.php?q=' + input, true);
  xhr.send();

}
</script>
