<?php include 'header.php'; ?>
<?php include('navfixed.php');?>
	<br>
	<div class="container-fluid">
      <div class="row-fluid">
			<ul class="breadcrumb">
			<li class="active icon-money"  style="font-size: 25px;"> Sales</li>
			</ul> 
			<br>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];

if($position=='Admin'|| 'Cashier') {
?>
 <?php if(isset($_SESSION['error1'])) { ?>
        <div class="" style="font-size: 15px; color:red;">
            <strong> <?php echo $_SESSION['error1']; unset($_SESSION['error1']); ?> </strong> 
        </div>
        <?php } ?>
				<?php } ?>										
<form action="incoming.php" method="post" >
											
<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
<input type="text" id="product" name="product" list="productList" style="width:600px;" class="chzn-select" accesskey="b" required autocomplete="off">
<input type="text" name="qty" id="qty" value="1" min="0" max="" placeholder="Qty" autocomplete="off" style="width: 68px; border-radius: 5px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" accesskey="v" required>



<script>
 window.onload = function() {
  document.getElementById("product").focus();
};

function handleBarcodeScan(barcode) {
  // Set the product input field value to the barcode value
  document.getElementById("product").value = barcode;

  // Set the quantity input field value to 1
  document.getElementById("qty").value = 1;

  // Submit the form
  document.getElementById("form").submit();
}
function showUpdateQtyFacebox() {
  document.getElementById("updateQtyFacebox").style.display = "block";
}
function updateQty(event) {
            event.preventDefault();

            // get the quantity value from the form
            var qty = document.getElementById("qty").value;

            // make an AJAX request to update the quantity in the database
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // hide the facebox
                    document.getElementById("updateQtyFacebox").style.display = "none";

                    // show a success message
                    alert("Quantity updated!");
                }
            };
            xhttp.open("POST", "updateQty.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("qty=" + qty);
        }

</script>

<datalist id="productList" style="width:600px;">
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM products");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['product_code'] . ' - ' . $row['gen_name'] . ' - ' . $row['product_name']; ?>"></option>
	<?php
	}
	?>
</datalist>

<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("y/m/d"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
<style>
#filter { 
	width: 20%;
	position: absolute;
	left: 75%;
	float: left;
	border-radius: 5px;
}
#updateQtyFacebox {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  border: 1px solid #000;
  padding: 20px;
  z-index: 9999;
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

</style> 
<?php 
	
?> 

</form>
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Item Code </th>
			<th> Category </th>
			<th> Item Name</th>
			<th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
			<!-- <th> Profit </th> -->
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['invoice'];
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td>₱
			<?php
			$ppp=$row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>₱
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<!-- <td>
			<?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?>
			</td> -->
			<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th> Total Items:</th>
			<td> Total Amount: </td>
			<!-- <td> Total Profit: </td> -->
			<th>  </th>
		</tr>
			<tr>
				<th colspan="4"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php 
				$sdsd=$_GET['invoice'];
				$resulta = $db->prepare("SELECT sum(qty) FROM sales_order WHERE invoice= :c");
				$resulta->bindParam(':c', $sdsd);
				$resulta->execute();
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$asd=$qwe['sum(qty)'];
				echo formatNumber($asd, true);
				}
				?>	
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">₱
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				function formatNumber($number) {
					if ($number) {
						$number = sprintf( $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				
				$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				<!-- </strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php 
				$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
				$resulta->bindParam(':b', $sdsd);
				$resulta->execute();
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$asd=$qwe['sum(profit)'];
				echo formatMoney($asd, true);
				}
				?>
		
				</td> -->
				<th></th>
			</tr>
		
		
	</tbody>
</table><br>
<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large" accesskey="x"></i> SAVE</button></a>
<div class="clearfix"></div>
</div>
</div>
</body>
<?php include('footer.php');?>
</html>