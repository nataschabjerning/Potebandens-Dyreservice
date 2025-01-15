<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the input values from updateService() function in script.js
    $id = $_REQUEST['message_id'];
    $message_read = $_REQUEST['message_read'];

    $sql = "UPDATE inbox 
	SET 
    message_read='$message_read'
    WHERE id='$id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();