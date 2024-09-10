<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    // get the service_id from del() function in script.js
    $id = $_REQUEST['service_id'];

    // Set the DELETE SQL data
	$sql = "DELETE FROM services WHERE id='".$id."'";

	// Process the query so that we will save the date of birth
	if ($conn->query($sql)) {
	    echo "Ydelse slettet!";
	}
    else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();