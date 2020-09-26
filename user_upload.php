<?php
	
	include "dlovescatalystclass.php";
	
	$configuration = array(
		"host" => "localhost",
		"username" => "root",
		"password" => ""
	);
	
	$object = new DlovesCatalyst($configuration);

	//$object->createTable();
	//$object->parseCSV("E:\\xampp\htdocs\catalyst\users.csv");
	//$object->checkEmail("aa");
	$object->dryRun("E:\\xampp\htdocs\catalyst\users.csv");
?>