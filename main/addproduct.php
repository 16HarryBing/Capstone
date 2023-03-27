<?php
	require_once('auth.php');
  include('products.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Product</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="tcal.css" />
  <script src="jquery.js"></script>
  <link href="facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="facebox.js"></script>
	<style type="text/css">
    
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
		.sidebar-nav {
			padding: 9px 0;
		}
	</style>
</head>
<body>
  <style> 
.background {
        background: black;
        width: 100%;
}
.form { 
        width: 30%;
        background: white;
        position: absolute; 
        top: 55%; 
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        border-radius: 1rem;
        line-height: 2rem;
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
  <div class="form">
	<form action="saveproduct.php" method="post">
		<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
    <a href="products.php"><i class="icon-remove"></i>  </i></a>
		<hr>
    <?php if(isset($_SESSION['error1'])) { ?>
        <div class="" style="font-size: 15px; color:red;">
            <strong> <?php echo $_SESSION['error1']; unset($_SESSION['error1']); ?> </strong> 
        </div>
        <?php } ?>
		<div id="ac">
			<span>Item Code : </span><input type="text" style="width:265px; height:30px;" value="TPC-<?php 
				$prefix = md5(time() * rand(1, 2)); 
				echo strip_tags(substr($prefix, 0, 4));
			?>" name="code" readonly required ><br>
			<span>Item Name : </span><input type="text" style="width:265px; height:30px;" name="name" autocomplete="off" required /><br>
			<span>Category : </span>
			<select name="gen" style="width:265px; height:30px; margin-left:-5px;">
    <option></option>
    <?php
        include('../connect.php');
        $result = $db->prepare("SELECT * FROM category");
        $result->execute();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
    <?php
        }
    ?>
</select><br>
			<span>Date Arrival: </span><input type="date" style="width:265px; height:30px;" placeholder="09/13/2017" class="tcal tcalInput" name="date_arrival" required ><br>
			<span>Selling Price : </span><input type="number" id="txt1" min="0" style="width:265px; height:30px;" name="price" onkeyup="sum();" autocomplete="off" required><br>
			<span>Original Price : </span><input type="number" id="txt2" min="0" style="width:265px; height:30px;" name="o_price" onkeyup="sum();" autocomplete="off" required><br>
			<span>Profit : </span><input type="number" id="txt3" min="0" style="width:265px; height:30px;" name="profit" readonly><br>
			<span>Supplier : </span>
			<select name="supplier" style="width:265px; height:30px; margin-left:-5px;" required>
	<option value="">Select a supplier</option>
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
<span>Quantity : </span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" Required ><br>
<span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<div style="float:right; margin-right:10px;">
<button  class="btn btn-success btn-block btn-large" style="width:250px; margin: 0 2rem 2rem 0"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
</div>
</body>
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
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
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
<?php include('footer.php');?>
</html>