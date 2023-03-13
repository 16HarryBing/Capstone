  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><b>Two M's Pasalubong Sales and Inventory System</b></a>
          <div class="nav-collapse collapse" id="navbar">
            <ul class="nav pull-right">
              <style> 
                #navbar ul li { 
                  cursor: pointer;
                }
              </style>
            <li><a><i class="icon-user icon-large"  id="welcome"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME'];?></strong></a></li>
			 <li><a> <i class="icon-calendar icon-large" id = "calendar"></i>
								<?php
								$Today = date('y:m:d',);
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>

				</a></li>
             
              <li><a href="../index.php"><font color="red"><i class="icon-off"></i></font> Log out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
 