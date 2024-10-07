<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    // get the image_id from deleteImage() function in script.js
    $id = $_REQUEST['about_id'];

    // Set the DELETE SQL data
	$sql = "DELETE FROM about WHERE id='".$id."'";
    unset($id);

	// Process the query so section is deleted from table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();