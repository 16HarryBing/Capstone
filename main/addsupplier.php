<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savesupplier.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr>
<div id="ac">
<span>Supplier Name : </span><input type="text" style="width:265px; height:30px;" name="name"autocomplete="off"/ required/><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address"autocomplete="off"/ required/><br>
<span>Contact Person : </span><input type="text" style="width:265px; height:30px;" name="cperson"autocomplete="off"/ required /><br>
<span>Contact No. : </span><input type="text" maxlength="11"  onkeypress="isInputNumber(event)"  style="width:265px; height:30px; "  name="contact"autocomplete="off"/ required /> <br>
<span>Note : </span><textarea maxlength="20"  style="width:265px; height:80px;" name="note" /></textarea><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
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