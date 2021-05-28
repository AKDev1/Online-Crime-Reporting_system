<?php


	include 'php/includes/header.php';
	 if(!isset($_SESSION['email'])){
		Header('Location:logout.php');
	}
?>
	<div class="container" id="wrapper">
		<div id="header">
			<div class="mainLogo">
           <div class="logo"><img src="images/india.png" width="70px"/>Crime Reporting System</div>
       	    </div>
			<div id="login">
				<?php if(isset($_SESSION['email'])){?>
					You are logged in as:  <b><?php echo $_SESSION['email']; ?></b>
				<?php } else { ?>
				<a href="login.php">Login</a> | <a href="register.php">Register</a>
				<?php } ?>
			</div>
		</div>
		<div id="nav">
			<?php include 'php/includes/navigation.php'?>
		</div>
		<div id="main">
			<div class="row">
			<div class="col-sm-3" id="side_menu3">
			   <ul id="side_menu">
					<li id="r_crime"><a href="">Crime Report Status</a></li>
					<li ><a href="" id="person_missing">Fire Report Status</a></li>
					<li><a href="" id="vehicle_missing">Car Crash Report Status </a></li>
			  </ul>

			</div>
			<div class="col-sm-8">
        <div class="col-lg-12" id="m_person_form_display">
                <style type="text/css">
                  table th{
                    padding:10px;
                    font-family:trebuchet ms;
                    color:#fff;
                    background:#1B1B1B;
                    text-align:center;
                  }

                  table tr td{
                    border:1px solid #090909;
                    padding:10px;
                    font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
                    color:#000000;
                  }

                  table tr td.carry-up{
                    height:80px;
                  }
                </style>
                <table style="width:100%;">
                  <?php
                  echo '<tr style="border:1px solid #000;">';
                  echo '<th><b>Fire Report ID</b></th>';
                  echo '<th><b>Status</b></th>';
                  echo '</tr>';
                    $db_conn -> getFireStatus();
                  ?>
                </table>
		     </div>

         <div class="col-lg-12" id="m_vehicle_form_display">
            <style type="text/css">
                table th{
                  padding:10px;
                  font-family:trebuchet ms;
                  color:#fff;
                  background:#1B1B1B;
                  text-align:center;
                }
                table tr td{
                  border:1px solid #090909;
                  padding:10px;
                  font-family:Verdana, Geneva, Arial,   Helvetica, sans-serif;
                  color:#000000;
                }
                table tr td.carry-up{
                  height:80px;
                }
            </style>
            <table style="width:100%;">
              <?php
                echo '<tr style="border:1px solid #000;">';
                echo '<th><b>Crash Report ID</b></th>';
                echo '<th><b>Status</b></th>';
                echo '</tr>';
                $db_conn -> getCrashStatus();
              ?>
            </table>
			    </div>


          <div class="col-lg-12" id="report_crime_display">
            <style type="text/css">
              table th{
                padding:10px;
                font-family:trebuchet ms;
                color:#fff;
                background:#1B1B1B;
                text-align:center;
              }
              table tr td{
                border:1px solid #090909;
                padding:10px;
                font-family:Verdana, Geneva, Arial,   Helvetica, sans-serif;
                color:#000000;
              }
              table tr td.carry-up{
                height:80px;
              }
          </style>
          <table style="width:100%;">
            <?php
              echo '<tr style="border:1px solid #000;">';
              echo '<th><b>Crime Report ID</b></th>';
              echo '<th><b>Status</b></th>';
              echo '</tr>';
              $db_conn -> getCrimeStatus();
            ?>
          </table>
        </div>

			</div>
		</div>
		<div class="clearer" style="height:3px;"></div>
<?php include 'php/includes/footer.php'; ?>
