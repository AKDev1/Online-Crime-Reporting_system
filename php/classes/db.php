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

		public function report_crime($data){
			$sql = "INSERT INTO crimes(Category,Description,Crime_Scene) VALUES(?,?,?)";
			$this -> stmt = $this->db_conn->prepare($sql);


			extract($data);

			$location = $street.", ".$sub_county.", ".$county."." ;

			$this->stmt->execute(
				array(
					"$crime_type",
					"$crime_description",
					"$location"

				));
			return $this->db_conn-> lastInsertId();

		}

		public function apply($data){
			$sql = "INSERT INTO applications(ID_Number,Type)VALUES(?,?)";
			$stmt = $this->db_conn->prepare($sql);

			extract($data);


			$stmt -> execute(
				array($national_id,$type
				)
			);

			return $this->db_conn->lastInsertId();
		}

		public function set_missing_person($data){
			$sql = "INSERT INTO fire_acc(fullName, Address, phoneNumber, Description, Date) VALUES(?,?,?,?,?)";

			$this -> stmt = $this->db_conn->prepare($sql);
			extract($data);

		   $this->stmt->execute(
				array(
					"$fullName",
					"$Address",
					"$phoneNumber",
					"$Description",
					"$Date"
				));
			return $this->db_conn->lastInsertId();
		}

		public function set_missing_vehicle($data){
			extract($data);

			$sql = "INSERT INTO car_crash(fullName, phoneNumber, description, Address) VALUES(?,?,?,?)";

			$this -> stmt = $this->db_conn -> prepare($sql);

			 $result = $this->stmt->execute( array(
					"$fullName",
					"$phoneNumber",
					"$description",
					"$Address"
					)
				);

				return $this->db_conn->lastInsertId();
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
			$sql = "SELECT firstName,lastName,middleName,ID_Number,County,location FROM persons WHERE ID_Number = :id_number";
			$stmt = $this->db_conn->prepare($sql);
			$stmt->execute(
				array(
				':id_number' => $id
				));

			$info = $stmt->fetch(PDO::FETCH_ASSOC);
			return info;
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

		public function getFireStatus(){
			$sql = "SELECT fire_id, status FROM fire_status";
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td class="carry-up">'.$row['fire_id'].'</td>';
					echo '<td class="carry-up">'.$row['status'].'</td>';
			}
		 }
			}
			return;
		}

		public function getCrimeStatus(){
			$sql = "SELECT crime_id, status FROM crime_status";
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td class="carry-up">'.$row['crime_id'].'</td>';
					echo '<td class="carry-up">'.$row['status'].'</td>';
			}
		 }
			}
			return;
		}


		public function getCrashStatus(){
			$sql = "SELECT crash_id, status FROM car_status";
			$stmt = $this -> db_conn ->prepare($sql);
			$results = $stmt -> execute();
			if($results){
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if(count($rows) > 0){
				foreach($rows as $row){
					echo '<tr>';
					echo '<td class="carry-up">'.$row['crash_id'].'</td>';
					echo '<td class="carry-up">'.$row['status'].'</td>';
			}
		 }
			}
			return;
		}

	}
	$db_conn = new pdo_database();

 ?>
