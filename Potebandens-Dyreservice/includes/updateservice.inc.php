<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    // get the input values from updateService() function in script.js
    $id                         = $_REQUEST['service_id'];
    $service_name               = $_REQUEST['service_name'];
    $service_short_description  = $_REQUEST['service_short_description'];
    $service_description_one    = $_REQUEST['service_description_one'];
    $service_description_two    = $_REQUEST['service_description_two'];
    $service_description_three  = $_REQUEST['service_description_three'];
    $service_description_four   = $_REQUEST['service_description_four'];
    $important_note             = $_REQUEST['important_note'];

    // if not filled out
    if(!$service_name || !$service_description_one) {
        exit;
    }
    // if there is numbers in service_name
    if(preg_match("/\d/", $service_name)) {
        exit;
    }

    $sql = "UPDATE services 
	SET 
    service_name='$service_name',
    service_short_description='$service_short_description',
    service_description_one='$service_description_one',
    service_description_two='$service_description_two',
    service_description_three='$service_description_three',
    service_description_four='$service_description_four',
    important_note='$important_note'
    WHERE id='$id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();