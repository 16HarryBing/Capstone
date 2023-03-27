<html>
<head>
<title>
Admin Settings
</title>
<?php
	require_once('auth.php');
?>
<link rel="shortcut icon" href="images/background.jpg">
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">  
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script src="js/sweetalert2.js"></script>

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



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
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
			<li class="active icon-group" style="font-size: 25px;"> User Manager</li>
			</ul>
<br>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM user ORDER BY id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Users: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="height:35px; color:#222;" id="filter" placeholder="Search user..." autocomplete="off" />
<a href="adduser.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add User</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="10%"> Username </th>
			<th width="17%"> Full Name </th>
			<th width="8%"> Position</th>
			<th width="3%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM user ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['position']; ?></td>

			<td>
  <button class="btn btn-<?php echo $row['status'] == 1 ? 'success' : 'danger'; ?> btn-mini" onclick="toggleStatus(<?php echo $row['id']; ?>, <?php echo $row['status']; ?>)">
    <?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?>
  </button>
  <a  title="Click To Edit Customer" href="edituser.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
</td>
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
	
	function toggleStatus(userId, currentStatus) {
  var newStatus = currentStatus == 1 ? 0 : 1; // toggle the status value

  // display a confirmation dialog using SweetAlert
  Swal.fire({
    title: 'Change User Status',
    text: 'Are you sure you want to change the user status?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.isConfirmed) {
      // send an AJAX request to update the status in the database
      $.ajax({
        type: 'POST',
        url: 'updatestatus.php',
        data: { id: userId, status: newStatus },
		success: function(result) {
  if (result == 'success') {
    // update the button style, text, and onclick attribute
    var buttonClass = newStatus == 1 ? 'btn-success' : 'btn-danger';
    var buttonText = newStatus == 1 ? 'Active' : 'Inactive';
    var onclick = "toggleStatus(" + userId + ", " + newStatus + ")";
    $('#toggle-status-' + userId)
      .removeClass('btn-success btn-danger')
      .addClass(buttonClass)
      .text(buttonText)
      .attr('onclick', onclick);

    // display a success message using SweetAlert and redirect to admin-settings.php
    Swal.fire({
      title: 'Success',
      text: 'Status has been changed.',
      icon: 'success'
    }).then(function() {
      window.location.href = 'admin-settings.php';
    });
  } else {
    // display an error message using SweetAlert
    Swal.fire({
      title: 'Error',
      text: 'Failed to update user status.',
      icon: 'error'
    });
  }
},
        error: function() {
          Swal.fire({
            title: 'Error',
            text: 'Failed to update user status.',
            icon: 'error'
          });
        }
      });
    }
  });
}

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
   url: "deleteuser.php",
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