<?php

	/*
		Author	: 	Dharmesh Chaudhary
		E-mail	: 	chaudharydharmesh32@gmail.com
		File	:	dlovescatalystclass.php
	*/

	class DlovesCatalyst
	{
		private $host;
		private $username;
		private $password;
		private $database = "catalyst_test";
		public $connection;
		
		public function __construct()
		{
			$args = func_get_args();
		
			$this->host = $args[0]['host'];
			$this->username = $args[0]['username'];
			$this->password = $args[0]['password'];
			
			$this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
			
			if (mysqli_connect_errno())
			{
				fprintf(STDERR, "Failed to connect to MySQL: ".mysqli_connect_error());
				exit;
			}

			return $this->connection;
		}
		
		public function checkEmail($email) {
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return false;
			} else {
				return true;
			}
		}
		
		public function dropTable()
		{
			$droptable = "DROP TABLE IF EXISTS `users`";
			$this->connection->query($droptable);
		}
		
		public function createTable()
		{
			$this->dropTable();
			
			$createtable = " CREATE TABLE `users`(`name` VARCHAR(255) NOT NULL,`surname` VARCHAR(255) NOT NULL, `email` VARCHAR(255) NOT NULL) ENGINE = MyISAM AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8;";
				
			if ($this->connection->query($createtable) === TRUE) {
				fprintf(STDOUT, "Table Users created successfully");
			} else {
				fprintf(STDERR, "Error creating table: ".$this->connection->error);
			}
		}
		
		public function dryRun($filepath)
		{
			$file = fopen($filepath, "r");
			$row = 1;
			$validrecords = array();
			$invalidrecords = array();
			
			while (($column = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				if($row == 1) {
					$row++;
					continue;
				}
				
				$name = "";
				if (isset($column[0])) {
					$name = $column[0];
				}
				
				$surname = "";
				if (isset($column[1])) {
					$surname = $column[1];
				}
				
				$email = "";
				if (isset($column[2])) {
					$email = $column[2];
				}
			
				if($this->checkEmail($email) !== FALSE) {
					$validrecords[$row]['name'] = $column[0];
					$validrecords[$row]['surname'] = $column[1];
					$validrecords[$row]['email'] = $column[2];
				} else {
					$invalidrecords[$row]['name'] = $column[0];
					$invalidrecords[$row]['surname'] = $column[1];
					$invalidrecords[$row]['email'] = $column[2];
				}
				$row++;
			}
			
			if(empty($validrecords)) {
				fprintf(STDOUT, "No valid records found!\n\n");
			} else {
				
				fprintf(STDOUT, "Valid Records!\n\n");
				$mask = "|%5.5s |%-5.5s | %-30.30s | x |\n";
				printf($mask, 'Name', 'Surname','E-mail');
				
				foreach($validrecords as $validrecords) {
					printf($mask, $validrecords['name'], $validrecords['surname'], $validrecords['email']);
				}
			}
			
			fprintf(STDOUT, "\n\n");
			
			if(empty($invalidrecords)) {
				fprintf(STDOUT, "No invalid records found!\n\n");
			} else {
				
				fprintf(STDOUT, "Invalid Records!\n\n");
				$mask = "|%5.5s |%-5.5s | %-30.30s | x |\n";
				printf($mask, 'Name', 'Surname','E-mail');
				
				foreach($invalidrecords as $invalidrecords) {
					printf($mask, $invalidrecords['name'], $invalidrecords['surname'], $invalidrecords['email']);
				}
			}
		}
		
		public function parseCSV($path)
		{
			$file = fopen($path, "r");
			$row = 1;
			$insert = "";
			
			while (($column = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				if($row == 1) {
					$row++;
					continue;
				}
				
				$name = isset($column[0]) ? mysqli_real_escape_string($this->connection, $column[0]) : "";
				$surname = isset($column[1]) ? mysqli_real_escape_string($this->connection, $column[1]) : "";
				$email = isset($column[2]) ? mysqli_real_escape_string($this->connection, $column[2]) : "";

				if($this->checkEmail($email) !== FALSE) {
					$insert.="insert into users (`name`,`surname`,`email`) values ('".ucfirst(strtolower($name))."','".ucfirst(strtolower($surname))."','".strtolower($email)."');";
				}
			}
			
			if (mysqli_multi_query($this->connection, $insert)) {
				fprintf(STDOUT, "New records created successfully");
			} else {
				fprintf(STDERR, "Error: ".$insert."\n".$this->connection->error);
			}
		}
	}
?>