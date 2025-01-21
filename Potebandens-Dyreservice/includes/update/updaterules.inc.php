<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the input values from update rules in script.js
    $id             = $_REQUEST['rules_id'];
    $rules      = $_REQUEST['rules'];
    $point_one      = $_REQUEST['point_one'];
    $point_two      = $_REQUEST['point_two'];
    $point_three    = $_REQUEST['point_three'];
    $point_four     = $_REQUEST['point_four'];
    $point_five     = $_REQUEST['point_five'];
    $point_six      = $_REQUEST['point_six'];
    $point_seven    = $_REQUEST['point_seven'];
    $point_eight    = $_REQUEST['point_eight'];
    $point_nine     = $_REQUEST['point_nine'];
    $point_ten      = $_REQUEST['point_ten'];

    // if not filled out
    if(empty($rules) || empty($point_one)) {
        exit;
    }
    // if string length is too long
    if(strlen($rules) > 100) {
        exit();
    }
    if(strlen($point_one) > 250) {
        exit();
    }
    if(strlen($point_two) > 250) {
        exit();
    }
    if(strlen($point_three) > 250) {
        exit();
    }
    if(strlen($point_four) > 250) {
        exit();
    }
    if(strlen($point_five) > 250) {
        exit();
    }
    if(strlen($point_six) > 250) {
        exit();
    }
    if(strlen($point_seven) > 250) {
        exit();
    }
    if(strlen($point_eight) > 250) {
        exit();
    }
    if(strlen($point_nine) > 250) {
        exit();
    }
    if(strlen($point_ten) > 250) {
        exit();
    }

    $sql = "UPDATE rules 
	SET
    rules='$rules', 
    rules_point_one='$point_one',
    rules_point_two='$point_two',
    rules_point_three='$point_three',
    rules_point_four='$point_four',
    rules_point_five='$point_five',
    rules_point_six='$point_six',
    rules_point_seven='$point_seven',
    rules_point_eight='$point_eight',
    rules_point_nine='$point_nine',
    rules_point_ten='$point_ten'
    WHERE id='$id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();