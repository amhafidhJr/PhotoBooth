<?php

	$server = "localhost";
	$user = "root";
	$password = "";
	$dbName = "photo_booth";



	try {

			$conn = new PDO("mysql:host=$server;dbname=$dbName", $user, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOEXEPTION $e) {
		echo "Error" . $e->getMessage();
	}


?>
