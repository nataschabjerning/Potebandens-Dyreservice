<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("connect.inc.php");

    // get the input values from update blue in script.js
    $blue_id        = $_REQUEST['blue_id'];
    $extra_visibility   = $_REQUEST['extra_visibility'];
    $extra_title        = $_REQUEST['extra_title'];
    $extra_subtitle     = $_REQUEST['extra_subtitle'];
    $extra_text_one     = $_REQUEST['extra_text_one'];
    $extra_text_two     = $_REQUEST['extra_text_two'];
    $extra_text_three   = $_REQUEST['extra_text_three'];
    $extra_text_link    = $_REQUEST['extra_text_link'];
    $extra_link_url     = $_REQUEST['extra_link_url'];

    // if not filled out
    if(empty($extra_title)) {
        exit;
    }
    // if string has too many characters
    if(strlen($extra_title) > 100) {
        exit;
    }
    if(strlen($extra_subtitle) > 100) {
        exit;
    }
    if(strlen($extra_text_one) > 250) {
        exit;
    }
    if(strlen($extra_text_two) > 250) {
        exit;
    }
    if(strlen($extra_text_three) > 250) {
        exit;
    }
    if(strlen($extra_text_link) > 100) {
        exit;
    }

    $sql = "UPDATE blue 
	SET 
    extra_visibility='$extra_visibility',
    extra_title='$extra_title',
    extra_subtitle='$extra_subtitle',
    extra_text_one='$extra_text_one',
    extra_text_two='$extra_text_two',
    extra_text_three='$extra_text_three',
    extra_text_link='$extra_text_link',
    extra_link_url='$extra_link_url'
    WHERE id='$blue_id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();