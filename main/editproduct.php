<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Product</h4></center>
<br>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Item Code : </span><input type="text" style="width:265px; height:30px;"  name="code" value="<?php echo $row['product_code']; ?>" Required readonly/><br>
<span>Category : </span><input type="text" style="width:265px; height:30px;"  name="gen" value="<?php echo $row['gen_name']; ?>" /><br>
<span>Item Name : </span><input type ="text" style="width:265px; height: 30px;px;" name="name" value="<?php echo $row['product_name']; ?>" autocomplete="off" /><br>
<span>Date Arrival: </span><input type	="date" style="width:265px; height:30px;" name="date_arrival" value="<?php echo $row['date_arrival']; ?>"autocomplete="off"  /><br>
<span>Qty: </span><input type="number" style="width:265px; height:30px;" name="qty" value="<?php echo $row['qty']; ?>" readonly><br>
<span>Selling Price : </span><input type="text" style="width:265px; height:30px;" id="txt1" name="price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required autocomplete="off" /><br>
<span>Original Price : </span><input type="text" style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required autocomplete="off" /><br>
<span>Profit : </span><input type="text" style="width:265px; height:30px;" id="txt3" name="profit" value="<?php echo $row['profit']; ?>" readonly><br>
<span>Supplier : </span>
<select name="supplier" style="width:265px; height:30px; margin-left:-5px;" required>
<option value="<?php echo $row['supplier']; ?>"> <?php echo $row['supplier']; ?></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM supliers");
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
	?>
		<option value="<?php echo $row['suplier_name']; ?>"><?php echo $row['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px; margin-left:2rem;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>

<?php
}
?>