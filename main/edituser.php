<?php
	include('admin-settings.php');
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM user WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<style>
.background {
        background: black;
        width: 100%;
}
.form { 
        width: 30%;
        background: white;
        position: absolute; 
        top: 50%; 
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
<form action="saveedituser.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit User</h4></center>
<a href="admin-settings.php"><i class="icon-remove"></i>  </i></a>
<hr>
<?php if(isset($_SESSION['error1'])) { ?>
        <div class="" style="font-size: 15px; color:red;">
            <strong> <?php echo $_SESSION['error1']; unset($_SESSION['error1']); ?> </strong> 
        </div>
        <?php } ?>
        
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['name']; ?>" autocomplete="off" /><br>
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" value="<?php echo $row['username']; ?>" autocomplete="off" /><br>
<span> Current Password : </span><input type="password" style="width:265px; height:30px;" name="current_password"   autocomplete="off" /><br> 
<span>New  <br> Password : </span><input type="password" style="width:265px; height:30px;" name="new_password" autocomplete="off" />
<br>
<span>Confirm Password : </span><input type="password" style="width:265px; height:30px;" name="confirm_password" autocomplete="off" />
<span>Position : </span>
<select name="position" style="width:265px; height:30px; margin-left:-5px;" >
		<option><?php echo $row['position']; ?></option>
        <option>Admin</option>
        <option>Cashier</option>
        <option>Inventory Staff</option>
	</select><br>


<div style=" margin-left: 5rem;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>
</div>