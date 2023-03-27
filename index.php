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
Welcome To POS and Inventory System
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
	#password { 
		margin-right: .8rem;
	}
	.showpassword { 
		margin-left: 4.2rem;
		margin-right: -2rem;
		width: 20rem;
		padding-top: .5rem;
		
	}
	.showpassword  p  { 
		font-weight: bolder;
		margin-left: -9rem;
		color: #3f3030;
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

			<font style=" font:bold 60px 'Aleo'; color:black;"><center>Login  </center></font>
		<br>

		<?php 
			if(isset($_SESSION['error']))
			{ ?>
				<div class="invalid-tooltip" style="font-size: 15px; color:red;">
  				<strong> <?php echo $_SESSION['error'];
						unset($_SESSION['error']);?>				
				</strong> 
					
 				</div>
			<?php }
				
		  ?>
		  <br>
<div class="input-prepend">

		<span style="height:30px; width:40px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px;" type="text" name="username"   Placeholder="Username" autocomplete="off"/ required/><br>
</div>
<style> 

	
/* The switch - the box around the slider */
.password-toggle {
  font-size: 17px;
  position: relative;
  display: inline-block;
  width: 4rem;
  height: 2em;
}

/* Hide default HTML checkbox */
.password-toggle .chk {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 4rem;
  right: 0;
  bottom: 0;
  background-color: rgb(255, 255, 255);
  transition: .4s;
  border-radius: 30px;
}

.slider:before {
  position: absolute;
  content: "OFF";
  display: grid;
  place-content: center;
  height: 1.6em;
  width: 3.6em;
  border-radius: 20px;
  left: 0.17em;
  bottom: 0.22em;
  background-color: rgb(255, 0, 0);
  box-shadow: 0px 0px 3.7px black;
  transition: .4s ease-in-out;
}

.chk:checked + .slider:before {
  content: "ON";
  background-color: limegreen;
  box-shadow: inset 0px 0px 5px black;
}

</style>
<div class="input-prepend">
    <span style="height:30px; width:40px; margin-left:.7rem" class="add-on"><i class="icon-lock icon-2x"></i></span>
    <input type="password" style="height:40px;" name="password" placeholder="Password" id="password" required autocomplete="off	"/>
<div class="showpassword">
  <label class="password-toggle">
  <input class="chk" type="checkbox" onclick="showPassword()">
  <span class="slider"></span>
  <p>Show Password?</p>
 
</label>
</div>
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




<script src="../sweetalert2/jquery-3.4.1.min.js"></script>
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
     <script src="../sweetalert2/bootstrap.bundle.min.js"></script>
      <script src="../sweetalert2/bootstrap.min.js"></script>
      <script src="../sweetalert2/bootstrap.js"></script>
<script>
function showPassword() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
</script>
