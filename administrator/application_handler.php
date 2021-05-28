<?php
	require 'php/init.php';

	if(isset($_POST['grant'])){
		$id_number = $_POST['id_number'];

		$result = $db_conn -> grantStatus($id_number);

		if($result){
			//email
			header('Location:success.php');
		}

	}

	if(isset($_POST['deny'])){
		$id_number = $_POST['id_number'];

		$result = $db_conn -> denyStatus($id_number);

		if ($result) {
			header('Location:success.php');
		}
	}

	if(isset($_POST['crashGrant'])){
		$id_number = $_POST['id_number'];

		$result = $db_conn -> grantStatusCrash($id_number);

		if($result){
			//email
			header('Location:success.php');
		}

	}

	if(isset($_POST['crashDeny'])){
		$id_number = $_POST['id_number'];

		$result = $db_conn -> denyStatusCrash($id_number);

		if ($result) {
			header('Location:success.php');
		}
	}

	if(isset($_POST['fireGrant'])){
		$id_number = $_POST['id_number'];

		$result = $db_conn -> grantStatusFire($id_number);

		if($result){
			//email
			header('Location:success.php');
		}

	}

	if(isset($_POST['fireDeny'])){
		$id_number = $_POST['id_number'];

		$result = $db_conn -> denyStatusFire($id_number);

		if ($result) {
			header('Location:success.php');
		}
	}

	// if(isset($_POST['fireGrant'])){
	// 	$number = $_POST['id_number'];
	// 	$result = $db_conn -> updateAlert($number);
	//
	// 	if($result){
	// 		header('Location:success2.php');
	// 	}
	// 	else{
	// 		echo "Not succesfull";
	// 		die();
	// 	}
	// }
	//
	// if(isset($_POST['fireDeny'])){
	// 	$number_plate = $_POST['id_number'];
	// 	$result = $db_conn -> removeAlert($number_plate);
	//
	// 	if($result){
	// 		header('Location:success2.php?s=found');
	// 	}
	//
	// }

	if(isset($_POST['alertPerson'])){
		$name = $_POST['person'];
		$result = $db_conn -> postAlert($name);

		if($result){
			header('Location:success2.php');
		}

	}

	if(isset($_POST['personFound'])){
		$person = $_POST['person'];
		$result = $db_conn -> removeAlert2($person);

		if($result){
			header('Location:success2.php');
		}

	}



?>
