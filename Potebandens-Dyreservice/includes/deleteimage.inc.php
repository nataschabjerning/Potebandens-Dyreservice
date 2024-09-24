<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    // get the service_id from del() function in script.js
    $id = $_REQUEST['image_id'];

    $filename = $_POST['delete-image'];
    if (file_exists($filename)) {
        unlink($filename);
        echo 'File '.$filename.' has been deleted';
    } else {
        echo 'Could not delete '.$filename.', file does not exist';
    }

    // Set the DELETE SQL data
	$sql = "DELETE FROM gallery WHERE id='".$id."'";

	// Process the query so row is deleted from table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();