<html>
<?php
	require_once('auth.php');
?>
<head>
<title>
POS
</title>
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
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
// <!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
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
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			</div>
			<ul class="breadcrumb">
			<li class="active icon-bar-chart" style="font-size: 25px;"> Monthly Inventory Report</li>
			</ul>
<br>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="inventoryreport.php?t1=0&t2=0"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

<style> 
	#button{ 
		width: 123px; 
		height: 35px;
		border: none;
		border-radius: 5px;
		background: #0489bd;
		border-color: #2f96b4 #2f96b4 #1f6377;
		color: #fff;
		font-size:19px;
		margin-left: 3rem;
		font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
		height: 2.5rem;
	}
	#button:hover { 
		color: #1554a7;
	}
</style>
<button id="button"><a href="dailyinventoryreports.php"> Daily </button>
<button id="button"><a href="yearlyinventory.php"> Yearly </button>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>
<form action="" method="post">
	<center>
		<strong>
			From : <input style="width: 223px; height:35px; color:#222;" name="monthlyinv" type="month" value="<?php echo isset($_POST['monthlyinv']) ? $_POST['monthlyinv'] : ''; ?>" autocomplete="off" />
			<button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" name="submit" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
		</strong>
	</center>
</form>
<div class="content" id="content">
	<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
		<?php 
			if(isset($_POST['submit']))
			{
				$date=$_POST['monthlyinv'];
		?>

	Inventory Report as of&nbsp;

	<?php echo $_POST['monthlyinv']?>&nbsp;
	<?php
		}
		else
		{
	?>
	Inventory Report
	<?php
		}
	?>
</div>
<style>
	.table tr th { 
	position: sticky;
	top: 42px;
	}
</style> 
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="25%"> Date </th>
			<th width="25%"> Product Name </th>
			<th width="25%"> Qty Sold </th>
			<th width="25%"> Total Earnings</th>
		</tr>
	</thead>
	<tbody>
	<?php
   if(isset($_POST['submit'])) {
	$date = $_POST['monthlyinv'];
	$month = date('m', strtotime($date));

	$result = $db->prepare("SELECT DATE_FORMAT(date, '%Y-%m-%d') AS date, name, SUM(qty) AS qty_sold, SUM(amount) AS earnings
							FROM sales_order
							WHERE MONTH(date) = :month
							GROUP BY DATE_FORMAT(date, '%Y-%m-%d'), name
							ORDER BY date DESC, name ASC");
	$result->bindParam(':month', $month);
	$result->execute();

	$prev_date = null;
	$total_qty_sold = 0;
	$total_earnings = 0;
	while ($row = $result->fetch()) {
		$date = date('F d, Y', strtotime($row['date']));
		$name = $row['name'];
		$qty_sold = $row['qty_sold'];
		$earnings = $row['earnings'];
		if ($prev_date !== $row['date']) {
			// If the date is different from the previous row, display the date and calculate the total
			?>
			<tr class="record">
				<td><?php echo $date; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $qty_sold; ?></td>
				<td>₱ <?php echo number_format($earnings, 2); ?></td>
			</tr>
			<?php
			$total_qty_sold += $qty_sold;
			$total_earnings += $earnings;
			$prev_date = $row['date'];
		} else {
			// If the date is the same as the previous row, just display the product info and add to the total
			?>
			<tr class="record">
				<td></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $qty_sold; ?></td>
				<td>₱ <?php echo number_format($earnings, 2); ?></td>
			</tr>
			<?php
			$total_qty_sold += $qty_sold;
			$total_earnings += $earnings;
		}
	}

	// Display the total for the last date
	?>
	<tr>
	<th colspan="2" style="border-top:1px solid #999999; background: #0489bd ;color:#fff; font-size:13px "> Total: </th>
	<td  colspan="1" style="border-top:1px solid #999999; background: #0489bd ;color:#fff; font-size:13px "><?php echo isset($total_qty_sold) ? $total_qty_sold : "0"; ?></td>
	<td style="border-top:1px solid #999999; background: #0489bd;color:#fff; font-size:13px "> ₱ <?php echo isset($total_earnings) ? number_format($total_earnings, 2) : "0.00"; ?> </td>
	</tr>

<?php } 
?>



</table>
</div>
<div class="clearfix"></div>
</div>
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