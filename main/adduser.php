<?php include('admin-settings.php') ?>
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
<div class="background">
<div class="form">
<form action="saveuser.php" method="post" id="form">
<center><h4><i class="icon-plus-sign icon-large"></i> Add User</h4></center>
<a href="admin-settings.php"><i class="icon-remove"></i>  </i></a>
<hr>
        <?php if(isset($_SESSION['error1'])) { ?>
        <div class="" style="font-size: 15px; color:red;">
            <strong> <?php echo $_SESSION['error1']; unset($_SESSION['error1']); ?> </strong> 
        </div>
        <?php } ?>
        
<div id="ac">
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ; unset($_SESSION['name'])  ?>"   Required autocomplete="off" / ><br>
<span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" placeholder="Username"value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; unset($_SESSION['username']) ?>"  autocomplete="off" /><br>
<span>Password : </span><input type="password" style="width:265px; height:30px;" name="password" placeholder="Password" autocomplete="off" /><br>
<span>Confirm Password : </span><input type="password" style="width:265px; height:30px;" name="cpassword" placeholder="Confirm Password" autocomplete="off" /><br>
<span>Position : </span>
<select name="position" style="width:265px; height:30px; margin-left:-5px;">
    <option value="" <?php if(!isset($_SESSION['position']) || $_SESSION['position'] == '');  unset($_SESSION['position']) ?>>--</option>
    <option value="Cashier" <?php if(isset($_SESSION['position']) && $_SESSION['position'] == 'Cashier') echo 'selected'; ?>>Cashier</option>
    <option value="Admin" <?php if(isset($_SESSION['position']) && $_SESSION['position'] == 'Admin') echo 'selected'; ?>>Admin</option>
    <option value="Inventory Staff" <?php if(isset($_SESSION['position']) && $_SESSION['position'] == 'Inventory Staff') echo 'selected'; ?>>Inventory Staff</option>
</select><br>

<div style="margin-left:4.5rem">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save User</button>
</div>
</div>
</form>
</div>
</div>