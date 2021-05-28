<?php

$current = basename($_SERVER['SCRIPT_NAME']);

?>

<div id="navcontainer">
	<ul id="navlist">
		<li <?php if($current == 'index.php') echo 'class="active"'?>><a href="index.php">HOME</a><span></li>
		<li <?php if($current == 'report.php') echo 'class="active"'?>><a href="report.php">REPORT CRIME</a><span></li>
		<li <?php if($current == 'report_status.php') echo 'class="active"'?>><a href="report_status.php">REPORT STATUS</a><span></li>

		<li style="float:right;<?php if(!isset($_SESSION['email'])) echo 'display:none;';?>"  ><a href="logout.php">Logout[<?php echo $_SESSION['email']; ?>]</a></li>
	</ul>
</div>
