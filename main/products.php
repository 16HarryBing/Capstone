<html>
<head>
<title>
POS
</title>

<?php 
require_once('auth.php');
?>
<link rel="shortcut icon" href="images/background.jpg">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>



<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			</div>
			<ul class="breadcrumb">
			<li class="active icon-table" style="font-size: 25px;"> Products</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<br>
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold ASC");
				$result->execute();
				$rowcount = $result->rowcount();
			?> 
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products where qty < 20 ORDER BY product_id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();
				$warning = '';

	if ($rowcount123 > 0) {
		$warning = '<div style="text-align:center; color:red; font-size:20px;">Warning: Products with qty less than 20!</div>';
	}

			?>
				<div style="text-align:center;">
			Total Number of Products:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
			<div style="text-align:center;">
			<font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';">[<?php echo $rowcount123;?>]</font> Products need to Restock!
			</div>
</div>
<?php 
			include('../connect.php');

			?>
<style>
th { 
	position: sticky;
	top:43px;
	}
</style>       
<input type="text" style="height:35px; width:300px; color:#222;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<a href="addproduct.php"><Button type="submit" class="btn btn-primary" style="float:right; width:150px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button></a><br><br>
<a rel="facebox" href="addstock.php"><Button class="btn btn-primary " style="float:right; width:150px; height:35px;" /> Update QTY</button></a><br><br>
<a href="barcode.php"><Button type="submit" class="btn btn-warning" style="float:right; width:200px; height:35px;" /><i class="bi bi-upc"></i> </i>Generate Barcode</button></a><br><br>
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> Item Code </th>
			<th width="14%"> Item Name </th>
			<th width="7%"> Category </th>
			<th width="15%"> Supplier </th>
			<th width="9%"> Date Added </th>
			<!-- <th width="10%"> Expiry Date </th> -->
			<th width="6%"> Original Price </th>
			<th width="6%"> Selling Price </th>
			<!-- <th width="6%"> QTY </th> -->
			<th width="3%"> Qty Left </th>
			<th width="8%"> Total </th>
			<th width="9%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
	<?php
include('../connect.php');
function formatMoney($number, $fractional = false)
{
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
$result = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY qty ASC ");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
    $total = $row['total'];
    $availableqty = $row['qty'];
	if ($availableqty < 20) {
        echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
        $warning = '!';
    } else {
        echo '<tr class="alert alert-warning record" style="color: #fff; background:#e30fff;">';
        $warning = '';
    }

?>
		
		
			<td><?php echo $row['product_code'] . "       " .  $warning;?></td>
			<td> <?php echo $row['product_name']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
					<td><?php echo $row['supplier']; ?></td>
			<td><?php echo $row['date_arrival']; ?></td>
			<!-- <td><?php echo $row['expiry_date']; ?></td> -->
			<td>₱<?php
			$oprice=$row['o_price'];
			echo formatMoney($oprice, true);
			?></td>
			<td>₱<?php
			$pprice=$row['price'];
			echo formatMoney($pprice, true);
			?></td>
			<!-- <td><?php echo $row['qty_sold']; ?></td> -->
			<td><?php echo $row['qty']; ?></td>
			<td>₱<?php
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			</td>			
			<td>
				<a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
			</tr>
			<?php
				}
			?>
		
		
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>

</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Product? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteproduct.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>