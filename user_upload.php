<?php
	
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
					fprintf(STDERR, "We wanted a file!" . PHP_EOL);
					exit;
				}
				if (empty($host)) {
					fprintf(STDERR, "Please enter MySQL host name!" . PHP_EOL);
					exit;
				}
				if (empty($username)) {
					fprintf(STDERR, "Please enter MySQL user name!" . PHP_EOL);
					exit;
				}
				/*if (empty($password)) {
					fprintf(STDERR, "Please enter MySQL password!" . PHP_EOL);
					exit;
				}*/
				
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
					fprintf(STDERR, "We wanted a file!" . PHP_EOL);
					exit;
				}
				if (empty($host)) {
					fprintf(STDERR, "Please enter MySQL host name!" . PHP_EOL);
					exit;
				}
				if (empty($username)) {
					fprintf(STDERR, "Please enter MySQL user name!" . PHP_EOL);
					exit;
				}
				/*if (empty($password)) {
					fprintf(STDERR, "Please enter MySQL password!" . PHP_EOL);
					exit;
				}*/
				
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
					fprintf(STDERR, "Please enter MySQL host name!" . PHP_EOL);
					exit;
				}
				if (empty($username)) {
					fprintf(STDERR, "Please enter MySQL user name!" . PHP_EOL);
					exit;
				}
				/*if (empty($password)) {
					fprintf(STDERR, "Please enter MySQL password!" . PHP_EOL);
					exit;
				}*/
				
				$configuration = array(
					"host" => $host,
					"username" => $username,
					"password" => $password
				);
				$object = new DlovesCatalyst($configuration);
				$object->createTable();
				break;
			case '--help':
				
				break;
			default:
				
				break;
		}
	} else {
		
	}
?>