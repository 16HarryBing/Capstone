<?php
include 'connect.php';
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>
POS
</title>
    <link rel="shortcut icon" href="main/images/pos.jpg">

	<link href="main/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
  
	<link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body style="background-image: url('main/img/bg/2.png');background-attachment:scroll;
  background-size: 100% 100%;">

<div class="container-fluid">
		
	<div class="row-fluid">
	<div class="span4">
		</div>
	
</div>
        
<div id="log-in" class="login">
<style type="text/css" > 
	#log-in { 
	background:#c9bebe;
	color:#000;
	width:400px;
	height:auto;
	margin:auto;
	margin-top:90px;
	padding:30px;
	border:1px solid #484848;
	box-shadow:0 5px 5px 5px #000;
	border-radius:20px;
	text-align:center;
	}

</style>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
   
<form action="login.php" method="post">

			<font style=" font:bold 44px 'Aleo'; color:black;"><center>Login  </center></font>
		<br>

		<?php 
			if(isset($_SESSION['error']))
			{ ?>
				<div class="" style="font-size: 15px; color:red;">
  				<strong> <?php echo $_SESSION['error'];
						unset($_SESSION['error']);?>				
				</strong> 
					
 				</div>
			<?php }
				
		  ?>
		  <br>
<div class="input-prepend">

		<span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px;" type="text" name="username" Placeholder="Username" autocomplete="off"/ required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px;" name="password" Placeholder="Password" required/><br>
		</div>
		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button>
</div>
		 </form>
</div>
</div>
</div>
</div>
</body>
</html>