<?php
    include 'php/includes/header.php';
?>
	<div class="container" id="wrapper">
		<div id="header">
			<div class="mainLogo">
           			 <div class="logo"><img src="images/india.png" width="70px"/>Crime Reporting System</div>
       	    </div>
			<div id="login">
				<?php if(isset($_SESSION['email'])){?>
					You are logged in as: <b><?php echo $_SESSION['email']; ?></b>
				<?php } else { ?>
				<a href="login.php">Login</a> | <a href="register.php">Register</a>
				<?php } ?>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div id="nav">
			<?php include 'php/includes/navigation.php'?>
		</div>
		<div id="main">
			<div class="row" id="slider-background">
				<div class="col-sm-3">
		<div class="leftSidebar">
        	<div class="titleBlock">
        	  <p>What we investigate</p>
       	    </div>
            <div class="blockList">
            	<ul>
                	<li><a href="">Cyber Crime</a></li>
                	<li><a href="">Car Accidents</a></li>
					        <li><a href="">Fire Accidents</a></li>
					        <li><a href="">Drug Dealers</a></li>
           	  </ul>
          </div>
        </div>
				</div>
				<div class="col-sm-9">
				 <img src="images/welcomeBG.jpg" width="847px" alt="">
			</div>

		</div>

	</div>

<?php include 'php/includes/footer.php'; ?>
