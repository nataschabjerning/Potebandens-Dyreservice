<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    // get the input values from updateService() function in script.js
    $id                     = $_REQUEST['service_id'];
    $service_name           = $_REQUEST['service_name'];
    $service_length         = $_REQUEST['service_length'];
    $service_description    = $_REQUEST['service_description'];
    $service_price          = $_REQUEST['service_price'];

    $sql = "UPDATE services 
	SET 
    service_name='$service_name',
    service_length='$service_length',
    service_description='$service_description',
    service_price='$service_price' 
    WHERE id='$id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();