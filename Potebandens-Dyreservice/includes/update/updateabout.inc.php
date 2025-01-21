<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the input values from updateService() function in script.js
    $id                 = $_REQUEST['about_id'];
    $about_name         = $_REQUEST['about_name'];
    $about_work_title   = $_REQUEST['about_work_title'];
    $about_text_one     = $_REQUEST['about_text_one'];
    $about_text_two     = $_REQUEST['about_text_two'];
    $about_text_three   = $_REQUEST['about_text_three'];
    $about_text_four    = $_REQUEST['about_text_four'];
    $about_text_five    = $_REQUEST['about_text_five'];
    $about_text_six     = $_REQUEST['about_text_six'];
    $about_text_seven   = $_REQUEST['about_text_seven'];

    // if not filled out
    if(!$about_name) {
        exit;
    }
    // if there is numbers in name
    if(preg_match("/\d/", $about_name)) {
        exit;
    }
    // if text in name/work title are over 100 characters
    if (strlen($about_name) > 100) {
        exit();
    }
    if (strlen($about_work_title) > 100) {
        exit();
    }
    // if text in textareas are over 250 characters
    if (strlen($about_text_one) > 250) {
        exit();
    }
    if (strlen($about_text_two) > 250) {
        exit();
    }
    if (strlen($about_text_three) > 250) {
        exit();
    }
    if (strlen($about_text_four) > 250) {
        exit();
    }
    if (strlen($about_text_five) > 250) {
        exit();
    }
    if (strlen($about_text_six) > 250) {
        exit();
    }
    if (strlen($about_text_seven) > 250) {
        exit();
    }

    $sql = "UPDATE about 
	SET 
    about_name='$about_name',
    about_work_title='$about_work_title',
    about_text_one='$about_text_one',
    about_text_two='$about_text_two',
    about_text_three='$about_text_three',
    about_text_four='$about_text_four',
    about_text_five='$about_text_five',
    about_text_six='$about_text_six',
    about_text_seven='$about_text_seven'
    WHERE id='$id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();