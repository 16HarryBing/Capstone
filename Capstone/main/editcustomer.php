<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcustomer.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['customer_name']; ?>" autocomplete="off" /><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['address']; ?>" autocomplete="off" /><br>
<span>Contact : </span><input type="text" onkeypress="isInputNumber(event)" maxlength="11" style="width:265px; height:30px;" name="contact" value="<?php echo $row['contact']; ?>"  autocomplete="off"/><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
<script> 
    function isInputNumber(evt) { 
        var char = String.fromCharCode(evt.which); 

            if (!(/[0-9]/.test(char))) { 
                evt.preventDefault();
            }
    }
</script>
</div>
</div>
</form>
<?php
}
?>