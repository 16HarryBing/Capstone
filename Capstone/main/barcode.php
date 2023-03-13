<?php
require_once '../vendor/autoload.php'; // include the Picqer library
include('products.php');

use Picqer\Barcode\BarcodeGeneratorPNG;

if(isset($_POST['sbt-btn'])) {
    $barcodeText = $_POST['bartext'];
    $generator = new BarcodeGeneratorPNG();
    $barcode = $generator->getBarcode($barcodeText, $generator::TYPE_CODE_128);
    file_put_contents('../barcodes/' . $barcodeText . '.png', $barcode);
    // Save the barcode image as a PNG file
    if (file_exists($fileName)) {
        echo "File already exists: $fileName";
    } else {
        file_put_contents($fileName, $barcode);
        echo "Barcode saved as: $fileName";
    }
}

?>

<style> 
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
    top: .5rem;
}
.form-group { 
    text-align: center;
}
#bartext { 
    height: 2rem;
    border-radius: .4rem;
}
input{
    height:2rem
}
.generatedbarcode { 
    padding-top: 2rem;
}
</style>

<div class="form">
    <form method="post" action="barcode.php">
        <div class="form-group">
            <center><h4>Enter Barcode Text</h4></center>
            <a href="products.php"><i class="icon-remove"></i></a>
            <input type="text" name="bartext" id="bartext" placeholder="Enter Barcode Text" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" class="form-control" autocomplete="off" />
        </div>
        <div class="form-group">
            <input type="submit" name="sbt-btn" value="Barcode Generate" class="btn btn-success" />
            
        </div>
        <div class="generatedbarcode">
        <?php if(isset($barcodeText)) { ?>
            <img src="../barcodes/<?php echo $barcodeText; ?>.png" alt="barcode" /><br>
            <?php  echo $barcodeText;?>
        <?php }
         ?>
        </div>

       
    </form>
</div>
