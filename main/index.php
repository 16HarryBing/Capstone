<?php include 'header.php'; ?>
<?php include('navfixed.php');?>


<div class = "main-table "> 
	 
    <div class="container-fluid">

      <div class="row-fluid">
	
	<div class="contentheader">
			</div>
			<ul class="breadcrumb">
			<li class="active icon-dashboard" style="font-size: 25px;" > Dashboard</li>
			</ul>
			<br>
			<font style=" font:bold 60px 'Aleo'; color:black;"><center>TWO M's PASALUBONG CENTER</center></font>

<div id="main">
<style type="text/css" >
		#main{ 
			font-style: bold;
			
		}
		#main {
		margin:30px auto;
		text-align: center;
		width: 980px;
		}
		#main a{ 
		text-decoration: none;
		padding-top:15px;
		padding-bottom:5px;
		padding-left:15px;
		padding-right:15px;
		border-radius:10px;
		margin:10px;
		box-shadow:0 5px 5px 2px #484848;
		-moz-box-shadow:0 5px 5px 2px #484848;
		-webkit-box-shadow:0 5px 5px 2px #484848;
		background: #c9bebe;
		color: #222222;
		font-size:20px;
		display: inline-block;
		width: 265px;
		height: 80px;
		text-align: center;
		margin-bottom: 5px;
	
	}
	</style>
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='Cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>

<?php
}
if($position=='Inventory Staff') {
?>
<a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Products</a>
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<br> 
<?php
}

if($position=='Admin') {
?>
	
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Sales</a>               
<a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Products</a> 
<a href="sales_inventory.php"><i class="icon-list-alt icon-2x"></i><br> Sales Inventory</a>                
<a href="cat.php"><i class="icon-list-alt icon-2x"></i><br> Categories</a>     
<a href="customer.php"><i class="icon-group icon-2x"></i><br> Customers</a>     
<a href="supplier.php"><i class="icon-group icon-2x"></i><br> Suppliers</a>     
<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Sales Report</a>     
<a href="inventoryreport.php?t1=0&t2=0"><i class="icon-bar-chart icon-2x"></i><br> Inventory Report</a>   
<a href="admin-settings.php"><i class="icon-flag icon-2x"></i><br> User Manager</a>  

<?php 
    }                   
    ?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
