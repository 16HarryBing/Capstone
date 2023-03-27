<html>
<?php
	require_once('auth.php');
?>
<head>
<title>
POS
</title>
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
			<li class="active icon-bar-chart" style="font-size: 25px;"> Sales Report</li>
			</ul>
<br>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<style> 
	.report{ 
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
	.report:hover { 
		color: #fff;
	}
</style>
<button class="report"><a href="dailyreport.php"> Daily </button>
<button class="report"><a href="monthlyreport.php"> Monthly </button>
<button class="report"><a href="yearlyreport.php"> Yearly </button>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>
<center><form action="quarterly.php" method="post">
  <label for="quarter">Quarter:</label>
  <select id="quarter" name="quarter">
    <option value="Q1">Q1</option>
    <option value="Q2">Q2</option>
    <option value="Q3">Q3</option>
    <option value="Q4">Q4</option>
  </select>
  <label for="year">Year:</label>
  <input type="number" id="year" name="year" min="2000" max="2099" required><br><br>
  <input type="submit" value="Submit" name="submit">
</form>
</center>
</div>
<div class="content" id="content">
  <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
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
        <th width="13%"> Transaction ID </th>
        <th width="13%"> Transaction Date </th>
        <th width="20%"> Customer Name </th>
        <th width="16%"> Invoice Number </th>
        <th width="18%"> Amount </th>
        <th width="13%"> Profit </th>
      </tr>
    </thead>
    <tbody>
        
      <?php

$servername = "localhost"; // replace with your server name if necessary
$username = "root"; // replace with your MySQL username
$password = ""; // replace with your MySQL password
$dbname = "sales"; // replace with the name of your database

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $year = $_POST['year'];
    $total_sales = 0;
    $total_profit = 0;

    for ($i = 1; $i <= 4; $i++) {
        $quarter = 'Q' . $i;
        $start_date = date('Y-m-d', strtotime($year . '-01-01 +' . (($i - 1) * 3) . ' months'));
        $end_date = date('Y-m-d', strtotime($start_date . ' +2 months'));
        $sql = "SELECT transaction_id, transaction_date, customer_name, invoice_number, amount, profit
                  FROM transactions
                  WHERE transaction_date BETWEEN '$start_date' AND '$end_date'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='record'>";
            echo "<td>" . $row['transaction_id'] . "</td>";
            echo "<td>" . $row['transaction_date'] . "</td>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['invoice_number'] . "</td>";
            echo "<td>₱ " . number_format($row['amount'], 2) . "</td>";
            echo "<td>₱ " . number_format($row['profit'], 2) . "</td>";
            echo "</tr>";
            $total_sales += $row['amount'];
            $total_profit += $row['profit'];
        }
    }
?>
    </tbody>
    <?php
} 
?>
    <thead>
      <tr>
        <th colspan="4" style="border-top:1px solid #999999"> Total: </th>
        <th colspan="1" style="border-top:1px solid #999999"> ₱ <?php echo number_format($total_sales, 2); ?>
        </th>
        <th colspan="1" style="border-top:1px solid #999999"> ₱ <?php echo number_format($total_profit, 2); ?>
        </th>
      </tr>
    </thead>
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