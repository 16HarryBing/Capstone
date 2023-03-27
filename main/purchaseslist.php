<html>
<head>
<title>
POS
</title>
<?php
	require_once('auth.php');
?>
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
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
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
<body>
<?php include('navfixed.php');?>
	
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="contentheader">
			</div>
			<ul class="breadcrumb">
			<li class="active icon-list" style="font-size: 25px;"> Stock Lists</li>
			</ul>
<br>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="products.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<input type="text" style="height:35px; width:300px; color:#222;" name="filter" value="" id="filter" placeholder="Search Name..." autocomplete="off" />
<a rel="facebox" href="purchases.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Stock</button></a><br><br>
 
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if ($position=='Admin') {
    ?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="15%">Name </th>
			<th width="15%"> Date </th>
			<th width="15%"> Supplier </th>
			<th width="7%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
                    include('../connect.php');
    $result = $db->prepare("SELECT * FROM purchases ORDER BY transaction_id DESC");
    $result->execute();
    for ($i=0; $row = $result->fetch(); $i++) {
        ?>
			<tr class="record">
			<td><?php echo $row['invoice_number']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['suplier']; ?></td>
			<td><a rel="facebox" href="view_purchases_list.php?iv=<?php echo $row['invoice_number']; ?>"> <button class="btn btn-primary btn-mini"><i class="icon-search"></i> View </button></a> 
			<a href="#" id="<?php echo $row['transaction_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete </button></a></td>
			</tr>
			<?php
    }
    ?>
	<?php
} 
?>	
<?php
if ($position=='Inventory Staff') {
    ?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="15%">Name </th>
			<th width="15%"> Date </th>
			<th width="15%"> Supplier </th>
			<th width="5%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
                    include('../connect.php');
    $result = $db->prepare("SELECT * FROM purchases ORDER BY transaction_id DESC");
    $result->execute();
    for ($i=0; $row = $result->fetch(); $i++) {
        ?>
			<tr class="record">
			<td><?php echo $row['invoice_number']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['suplier']; ?></td>
			<td><a rel="facebox" href="view_purchases_list.php?iv=<?php echo $row['invoice_number']; ?>"> <button class="btn btn-primary btn-mini"><i class="icon-search"></i> View </button></a> 
			</tr>
			<?php
    }
    ?>
	<?php
} 
?>	
		
	</tbody>
</table>
<div class="clearfix"></div>
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
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletepppp.php",
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