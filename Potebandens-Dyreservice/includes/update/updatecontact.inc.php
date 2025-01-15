<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the input values from update contact in script.js
    $contact_id         = $_REQUEST['contact_id'];
    $contact_name       = $_REQUEST['contact_name'];
    $contact_work_title = $_REQUEST['contact_work_title'];
    $contact_phone      = $_REQUEST['contact_phone'];
    $contact_email      = $_REQUEST['contact_email'];

    // if not filled out
    if(empty($contact_name) || empty($contact_work_title) || empty($contact_phone) || empty($contact_email)) {
        exit;
    }
    // if there is letters in contact_phone
    if(!is_numeric( $contact_phone)) {
        exit;
    }
    // if there is numbers in contact_name
    if(preg_match("/\d/", $contact_name)) {
        exit;
    }
    // if string has too many characters
    if(strlen($contact_name) > 100) {
        exit;
    }
    if(strlen($contact_work_title) > 100) {
        exit;
    }

    $sql = "UPDATE contact 
	SET 
    name='$contact_name',
    work_title='$contact_work_title',
    phone='$contact_phone',
    email='$contact_email'
    WHERE id='$contact_id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();