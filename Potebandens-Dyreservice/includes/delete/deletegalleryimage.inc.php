<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the image_id from deleteImage() function in script.js
    $id = $_REQUEST['image_id'];
    $name = $_REQUEST['image_name'];
    unlink("../gallery-uploads/" . $name);


    // Set the DELETE SQL data
	$sql = "DELETE FROM gallery WHERE id='".$id."'";

	// Process the query so section is deleted from table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();