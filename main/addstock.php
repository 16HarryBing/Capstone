<form action="saveupdatestock.php" method="post">

  <center><h4><i class="icon-plus-sign icon-large"></i> Add Stock</h4></center>
<hr>
<div id="ac">
<span>Products: </span>
  <select name="product_name" style="width:265px; height:30px; margin-left:-5px;" onchange="getQty()">
    <?php
      include('../connect.php');
      $result = $db->prepare("SELECT * FROM products ORDER BY qty ASC");
      $result->execute();
      for ($i=0; $row = $result->fetch(); $i++) {
        echo '<option value="' . $row['product_name'] . '">' . $row['product_name'] . '</option>';
      }
    ?>
  </select>
  <br>
  <span>Current Quantity: </span>
  <input type="number" name="qty" id="qty" value="<?php echo $row['qty']; ?>" style="width:265px; height:30px; margin-left:-5px;"  readonly>
  <br>
  <span>Add Quantity: </span>
  <input type="number" name="new_qty" min="0" id="new_qty" style="width:265px; height:30px; margin-left:-5px;"  required>
  <br>
  <div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>

</form>

<script>
function getQty() {
  var product_name = document.getElementsByName("product_name")[0].value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("qty").value = this.responseText;
    }
  };
  xhttp.open("GET", "getqty.php?product_name=" + product_name, true);
  xhttp.send();
}
</script>
</form>
</div>