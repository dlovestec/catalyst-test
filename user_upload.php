<?php

	/*
		Author	: 	Dharmesh Chaudhary
		E-mail	: 	chaudharydharmesh32@gmail.com
		File	:	user_upload.php
		Purpose	:	Script Task
	*/
	
	include "dlovescatalystclass.php";
	
	$shortopts = "h:u:p:f:";
	$longopts = ["help","create_table","dry_run"];
	$opts = getopt($shortopts, $longopts);
	$argc = $_SERVER['argc']; 
	$argv = $_SERVER['argv'];
	
	if($argc > 1) {
		switch($argv[1]) {
			case '--file':
				$file = isset($opts["f"]) ? $opts["f"] : "";
				$host = isset($opts["h"]) ? $opts["h"] : "";
				$username = isset($opts["u"]) ? $opts["u"] : "";
				$password = isset($opts["p"]) ? $opts["p"] : "";
				
				if (empty($file)) {
					fprintf(STDERR, "Please enter csv file with full path");
					exit;
				}
				if (empty($host)) {
					fprintf(STDERR, "Please enter MySQL host name");
					exit;
				}
				if (empty($username)) {
					fprintf(STDERR, "Please enter MySQL user name");
					exit;
				}
				/* If your MySQL Password is blank then comment out this condition */
				if (empty($password)) {
					fprintf(STDERR, "Please enter MySQL password");
					exit;
				}
				
				$configuration = array(
					"host" => $host,
					"username" => $username,
					"password" => $password
				);
				$object = new DlovesCatalyst($configuration);
				$object->parseCSV($file);
				break;
			case '--dry_run':
				$file = isset($opts["f"]) ? $opts["f"] : "";
				$host = isset($opts["h"]) ? $opts["h"] : "";
				$username = isset($opts["u"]) ? $opts["u"] : "";
				$password = isset($opts["p"]) ? $opts["p"] : "";
				
				if (empty($file)) {
					fprintf(STDERR, "Please enter csv file with full path");
					exit;
				}
				if (empty($host)) {
					fprintf(STDERR, "Please enter MySQL host name");
					exit;
				}
				if (empty($username)) {
					fprintf(STDERR, "Please enter MySQL user name");
					exit;
				}
				/* If your MySQL Password is blank then comment out this condition */
				if (empty($password)) {
					fprintf(STDERR, "Please enter MySQL password");
					exit;
				}
				
				$configuration = array(
					"host" => $host,
					"username" => $username,
					"password" => $password
				);
				$object = new DlovesCatalyst($configuration);
				$object->dryRun($file);
				break;
			case '--create_table':
				$host = isset($opts["h"]) ? $opts["h"] : "";
				$username = isset($opts["u"]) ? $opts["u"] : "";
				$password = isset($opts["p"]) ? $opts["p"] : "";
				
				if (empty($host)) {
					fprintf(STDERR, "Please enter MySQL host name");
					exit;
				}
				if (empty($username)) {
					fprintf(STDERR, "Please enter MySQL user name");
					exit;
				}
				/* If your MySQL Password is blank then comment out this condition */
				if (empty($password)) {
					fprintf(STDERR, "Please enter MySQL password");
					exit;
				}
				
				$configuration = array(
					"host" => $host,
					"username" => $username,
					"password" => $password
				);
				$object = new DlovesCatalyst($configuration);
				$object->createTable();
				break;
			case '--help':
				printf("\nOptions: \n");
				printf("\n -f\t\t Name of the CSV file to be parsed with full path");
				printf("\n -h\t\t MySQL Host");
				printf("\n -u\t\t MySQL User");
				printf("\n -p\t\t MySQL Password");
				printf("\n --create_table\t Create MySQL users table");
				printf("\n --dry_run\t Run script without inserting into database");
				printf("\n --file\t Parse the CSV and inserts data into database");
				printf("\n --help\t\t Help\n");
				printf("\nExample: php user_upload.php --file -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password");
				printf("\nExample: php user_upload.php --dry_run -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password");
				printf("\nExample: php user_upload.php --create_table -h MySQL Host -u MySQL User -p MySQL Password");
				printf("\nExample: php user_upload.php --help");
				break;
			default:
				printf("\nPHP CSV Parsing v1.0 by Dharmesh Chaudhary - for Catalyst code challenge purpose only \n");
				printf("\nSyntax: php user_upload.php --help \n");
				printf("\nOptions: \n");
				printf("\n -f\t\t Name of the CSV file to be parsed with full path");
				printf("\n -h\t\t MySQL Host");
				printf("\n -u\t\t MySQL User");
				printf("\n -p\t\t MySQL Password");
				printf("\n --create_table\t Create MySQL users table");
				printf("\n --dry_run\t Run script without inserting into database");
				printf("\n --file\t Parse the CSV and inserts data into database");
				printf("\n --help\t\t Help\n");
				printf("\nExample: php user_upload.php --file -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password");
				printf("\nExample: php user_upload.php --dry_run -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password");
				printf("\nExample: php user_upload.php --create_table -h MySQL Host -u MySQL User -p MySQL Password");
				printf("\nExample: php user_upload.php --help");
				break;
		}
	} else {
		printf("\nPHP CSV Parsing v1.0 by Dharmesh Chaudhary - for Catalyst code challenge purpose only \n");
		printf("\nSyntax: php user_upload.php --help \n");
		printf("\nOptions: \n");
		printf("\n -f\t\t Name of the CSV file to be parsed with full path");
		printf("\n -h\t\t MySQL Host");
		printf("\n -u\t\t MySQL User");
		printf("\n -p\t\t MySQL Password");
		printf("\n --create_table\t Create MySQL users table");
		printf("\n --dry_run\t Run script without inserting into database");
		printf("\n --file\t Parse the CSV and inserts data into database");
		printf("\n --help\t\t Help\n");
		printf("\nExample: php user_upload.php --file -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password");
		printf("\nExample: php user_upload.php --dry_run -f CSVFilePath -h MySQL Host -u MySQL User -p MySQL Password");
		printf("\nExample: php user_upload.php --create_table -h MySQL Host -u MySQL User -p MySQL Password");
		printf("\nExample: php user_upload.php --help");
	}
?>