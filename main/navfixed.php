

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php  include('../connect.php');?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="index.php"><b>Two M's  Sales and Inventory System</b></a>
      <div class="nav-collapse collapse" id="navbar">
        <ul class="nav pull-right">
          <style> 

            #navbar ul li { 
              cursor: pointer;
            }

            #navbar ul li a:hover { 
              background: none;
              cursor:default;
            }
            .log-out { 
              margin-left: 50rem;
              margin-top: .5rem;
              font-size: 25px;
            }
          </style>
          <li><a><i class="icon-user icon-large"  id="welcome"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME'] ; ?> </strong></a></li>
          <li><a> <i class="icon-calendar icon-large" id="calendar"></i>
            <?php
              $Today = date('y:m:d');
              $new = date('l, F d, Y', strtotime($Today));
              echo $new;
            ?>
          </a></li>
          <li><a><i class="icon-money icon-large"></i>
            <?php
              // Execute a SQL query to retrieve the total sales for the current day
          $result = $db->prepare("SELECT IFNULL(SUM(amount), 0) as total_sales FROM sales WHERE DATE(date) = CURDATE()");
          $result->execute();
          $row = $result->fetch(PDO::FETCH_ASSOC);
          $total_sales = $row['total_sales'];

          function formatno($number, $decimal_places = 0) {
         return number_format($number, $decimal_places, '.', ',');
    }
              // Format and display the total sales
              echo "Today Sales: ₱ " . formatno($total_sales,2);
            ?>
          </a></li>
          <div class="log-out">
  <a href="#" onclick="logout()">
    <font color="red">
      <i class="icon-off" title="Log-out?"></i>
    </font>  
  </a>
</div>

<script src="js/sweetalert1.js"></script>
<script>
function logout() {
  swal({
    title: "Are you sure?",
    text: "You will be logged out!",
    icon: "warning",
    buttons: ["Cancel", "Logout"],
    dangerMode: true,
  })
  .then((willLogout) => {
    if (willLogout) {
      window.location.href = "../index.php"; // Redirect to logout page
    }
  });
}
</script>
       
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>


  
</body>
</html>






