<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the input values from update white in script.js
    $white_id        = $_REQUEST['white_id'];
    $visibility   = $_REQUEST['visibility'];
    $title        = $_REQUEST['title'];
    $subtitle     = $_REQUEST['subtitle'];
    $text_one     = $_REQUEST['text_one'];
    $text_two     = $_REQUEST['text_two'];
    $text_three   = $_REQUEST['text_three'];
    $text_link    = $_REQUEST['text_link'];
    $link_url     = $_REQUEST['link_url'];

    // if not filled out
    if(empty($title)) {
        exit;
    }
    // if string has too many characters
    if(strlen($title) > 100) {
        exit;
    }
    if(strlen($subtitle) > 100) {
        exit;
    }
    if(strlen($text_one) > 250) {
        exit;
    }
    if(strlen($text_two) > 250) {
        exit;
    }
    if(strlen($text_three) > 250) {
        exit;
    }
    if(strlen($text_link) > 100) {
        exit;
    }

    $sql = "UPDATE white 
	SET 
    visibility='$visibility',
    title='$title',
    subtitle='$subtitle',
    text_one='$text_one',
    text_two='$text_two',
    text_three='$text_three',
    text_link='$text_link',
    link_url='$link_url'
    WHERE id='$white_id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();