<?php

	class pdo_database{
		private $db_conn;
		//private $stmt;

		public function __construct(){
			try{
			$this ->db_conn = new PDO('mysql:host=localhost;dbname=station',"root","");
			return $this->db_conn;
			}
			catch(PDOException $e){
				echo "Could not connect to database. Check you database parameters";
			}
		}


		public function get_crimes(){
			$sql = "SELECT Status,Category,Description,Crime_Scene,Suspects FROM crimes ";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute();
			$crimes = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $crimes;
		}



		public function get_abstract_application(){
			$sql = "SELECT ID_Number,Type FROM applications";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute();
			$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $applications;
		}

		public function getDetailedInfo($id){

			$sql ="SELECT status, Category, Description, Crime_Scene FROM crimes WHERE Crime_No = ?";


			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array($id));

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows) > 0){
					$address = $rows[0]['Crime_Scene'];

					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Crime ID:</b></td><td>'.$id.'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Crime Category:</b></td><td>'.$rows[0]['Category'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['Description'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Location:</b></td><td><a target="iframe_crime" href="https://maps.google.com/maps?q='.$address.'&output=embed">'.$rows[0]['Crime_Scene'].'</a></td></tr>';

			}

			}
	}

		public function getStatictics(){
			$sql = "SELECT Category,COUNT(*) AS number FROM crimes GROUP BY Category";

			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));

			$stat = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $stat;
		}

		public function login($email,$password){
			$sql = "SELECT email,password FROM users WHERE email=:email AND password=:password";
			$stmt = $this ->db_conn ->prepare($sql);

			$results = $stmt -> execute(array(
				':email' => $email,
				':password' => $password
			));


			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $details;
			}

		}

		public function register($data){
			extract($data);

			$password = sha1($password);
			$sql = "INSERT INTO users () VALUES(?,?,?)";
			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute(array($id_number,"$password","$email"));

			if($results){
				return $results;
				die();
			}
		}

		public function register_person($data){
			extract($data);
			$sql = "INSERT INTO persons () VALUES(?,?,?,?,?)";
				$stmt = $this -> db_conn -> prepare($sql);
				$results = $stmt-> execute(array("$firstName","$lastName",$id_number,"$county","$gender"));

				if($results){
					return $results;
				}

		}

		public function getTotalCrimes(){
			$sql = "SELECT COUNT(*) AS number FROM crimes";

			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute();

			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo $details[0]['number'];
				return;
			}

		}

		public function getTotalMissingPersons(){
			$sql = "SELECT COUNT(*) AS number FROM fire_acc";

			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute();

			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo $details[0]['number'];
				return;
			}

		}

		public function  getTotalMissingVehicles(){
			$sql = "SELECT COUNT(*) as number FROM car_crash";

			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute();

			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo $details[0]['number'];
				return;
			}
		}

		public function  getTotalLostItems(){
			$sql = "SELECT COUNT(*) as number FROM items WHERE status = 'Not found'";

			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute();

			if($results){
				$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo $details[0]['number'];
				return;
			}
		}

		public function getApplications(){
			$sql = "SELECT Crime_no, Category FROM crimes";

			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute();

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

				if(count($rows) > 0){
					echo '<tr style="border-bottom:2px solid #000;">';
					echo '<td><b>Crime_no</b></td>';
					echo '<td><b>Category</b></td>';
					echo '<td text-align="center"><b>Action</b></td>';
					echo '</tr>';
					foreach($rows as $row){
						echo '<tr class="border-bottom:1px solid #6f716d;"><td>'.ucfirst($row['Crime_no']).'</td><td>'.ucfirst($row['Category']).'</td><td><a href="viewCrimes.php?id='.$row['Crime_no'].'">View</a></td></tr>'	;
					}
				}
				else{
					echo "No applications";
				}
			}


			return;

		}
		public function grantStatus($id){
			$sql = "DELETE from crimes WHERE Crime_No = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));

			$sql1 = "INSERT INTO crime_status(crime_id, status) VALUES (?,?)";
			$stmt1= $this -> db_conn -> prepare($sql1);
			$stmt1->execute([$id, "Granted"]);
			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function denyStatus($id){
			$sql = "DELETE from crimes WHERE Crime_No = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));

			$sql1 = "INSERT INTO crime_status(crime_id, status) VALUES (?,?)";
			$stmt1= $this -> db_conn -> prepare($sql1);
			$stmt1->execute([$id, "Denied"]);
			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function grantStatusCrash($id){
			$sql = "DELETE from car_crash WHERE report_id = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));

			$sql1 = "INSERT INTO car_status(crash_id, status) VALUES (?,?)";
			$stmt1= $this -> db_conn -> prepare($sql1);
			$stmt1->execute([$id, "Granted"]);
			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function denyStatusCrash($id){
			$sql = "DELETE from car_crash WHERE report_id = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));

			$sql1 = "INSERT INTO car_status(crash_id, status) VALUES (?,?)";
			$stmt1= $this -> db_conn -> prepare($sql1);
			$stmt1->execute([$id, "Denied"]);
			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function getStollenVehicles(){
			$sql = "SELECT report_id FROM car_crash";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>'.$row['report_id'].'</td><td><a href="crashReports.php?id='.urlencode($row['report_id']).'">View</a></td></tr>';
					}
				}

			}
			return;

		}

		public function grantStatusFire($id){
			$sql = "DELETE from fire_acc WHERE fire_id = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));

			$sql1 = "INSERT INTO fire_status(fire_id, status) VALUES (?,?)";
			$stmt1= $this -> db_conn -> prepare($sql1);
			$stmt1->execute([$id, "Granted"]);
			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function denyStatusFire($id){
			$sql = "DELETE from fire_acc WHERE fire_id = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($id));

			$sql1 = "INSERT INTO fire_status(fire_id, status) VALUES (?,?)";
			$stmt1= $this -> db_conn -> prepare($sql1);
			$stmt1->execute([$id, "Denied"]);
			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function getCrashStatus(){
			$sql = "SELECT crash_id, status FROM car_status";

			$stmt = $this -> db_conn -> prepare($sql);

			$results = $stmt -> execute();

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

				if(count($rows) > 0){
					echo '<tr style="border-bottom:2px solid #000;">';
					echo '<td><b>Crash ID</b></td>';
					echo '<td><b>Status</b></td>';
					echo '</tr>';
					foreach($rows as $row){
						echo '<tr class="border-bottom:1px solid #6f716d;"><td>'.ucfirst($row['crash_id']).'</td><td>'.ucfirst($row['status']).'</td></tr>'	;
					}
				}
				else{
					echo "No applications";
				}
			}
		}
		public function getDetailedInfoVehicle($id){
			$sql = "SELECT fullName, description, phoneNumber, Address FROM car_crash WHERE report_id = ?";

			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$id"));

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Name:</b></td><td>'.$rows[0]['fullName'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>'.$rows[0]['phoneNumber'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Location:</b></td><td><a target="iframe_crash" href="https://maps.google.com/maps?q='.$rows[0]['Address'].'&output=embed">'.$rows[0]['Address'].'</a></td></tr>';

			}

			}
			return;
		}

		public function getDetailedInfoPerson($id){
			$sql = "SELECT fullName, Address, description, phoneNumber, Date FROM fire_acc WHERE fire_id = ?";

			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array($id));

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Full Name:</b></td><td>'.$rows[0]['fullName'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Date:</b></td><td>'.$rows[0]['Date'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>0'.$rows[0]['phoneNumber'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Location:</b></td><td><a target="iframe_fire" href="https://maps.google.com/maps?q='.$rows[0]['Address'].'&output=embed">'.$rows[0]['Address'].'</a></td></tr>';
			}

			}
			return;
		}

		public function getDetailedInfoPersonFound($name){
			$sql = "SELECT Address,image,description,phoneNumber FROM missing_persons WHERE fullName = '$name'";

			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array("$name"));

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Full Names:</b></td><td>'.$name.'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Address:</b></td><td>'.$rows[0]['Address'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px solid #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>0'.$rows[0]['phoneNumber'].'</td></tr>';
			}

			}
			return;
		}

			public function getDetailedInfoVehicleFound($id){
			$sql = "SELECT Model,location_seen,image,description,phoneNumber FROM missing_vehicles_found WHERE Number_plate = ?";


			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute(array($id));

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Model:</b></td><td>'.$rows[0]['Model'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Number Plate:</b></td><td>'.$id.'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Location seen:</b></td><td>'.$rows[0]['location_seen'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Image:</b></td><td><img src="../Uploads/missing_vehicles/'.$rows[0]['image'].'"/></td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Description:</b></td><td>'.$rows[0]['description'].'</td></tr>';
					echo '<tr style="border-bottom:1px dotted #000;"><td style="padding:10px 8px;"><b>Phone Number:</b></td><td>'.$rows[0]['phoneNumber'].'</td></tr>';

			}

			}
			return;
		}

		public function updateAlert($number){
			$sql = "UPDATE missing_vehicles SET reviewed = 'post' WHERE Number_plate = ?";

			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($number));

			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function updateAlertFound($number){
			$sql = "UPDATE missing_vehicles SET reviewed = 'post' WHERE Number_plate = ?";

			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($number));

			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}

		}

		public function removeAlert($plate){
			$sql = "UPDATE missing_vehicles SET reviewed = 'Found' WHERE Number_plate = ?";

			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($plate));

			if($results){
				$sql = "UPDATE missing_vehicles_found SET status = 'reviewed' WHERE Number_plate = '$plate'";

				$stmt = $this -> db_conn -> prepare($sql);
				$results = $stmt -> execute(array($plate));

			    $rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}

		public function removeAlert2($person){
			$sql = "UPDATE missing_persons SET alert = 'post' WHERE fullName = ?";

			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($person));

			if($results){
			    $rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}

		public function getMissingPersons(){
			$sql = "SELECT fire_id, Address FROM fire_acc";

			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute();

			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
					foreach($rows as $row){
						echo '<tr><td>'.$row['fire_id'].'</td><td>'.$row['Address'].'</td><td><a href="fireReports.php?n='.urlencode($row['fire_id']).'">View</a></td></tr>';
					}
				}
				else{
					echo "No Records to display";
				}
			}

		}

		public function postAlert($name){
			$sql = "UPDATE missing_persons SET alert = 'post' WHERE fullName = ?";
			$stmt = $this -> db_conn -> prepare($sql);
			$results = $stmt -> execute(array($name));

			if($results){
					$rows_affected = $stmt ->rowCount();

					if($rows_affected > 0){
						return true;
					}
					else {
						return false;
					}
				}
		}


	}

	$db_conn = new pdo_database();

?>
