<?php 
    $serverName = "local.potebandens-dyreservice.dk";
    $dbName = "potebandens_dyreservice_db";
    $dbusername = "root";
    $dbpassword = "root";

    $conn = new mysqli($serverName, $dbusername, $dbpassword, $dbName);

	if ($conn->connect_errno) {
	  echo "Failed to connect to MySQL: " . $conn->connect_error;
	  exit();
	}