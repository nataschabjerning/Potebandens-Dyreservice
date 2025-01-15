<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    $contact_name       = $_POST['contact_name'];
    $contact_work_title = $_POST['contact_work_title'];
    $contact_phone      = $_POST['contact_phone'];
    $contact_email      = $_POST['contact_email'];

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
    
    $sql = "INSERT INTO contact (name, work_title, phone, email) 
    VALUES ('$contact_name', '$contact_work_title', '$contact_phone', '$contact_email')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // ob_start(); ?>
        <!-- <table></table> -->
    <!-- <?php // $sHTML = ob_get_clean(); -->

    // Close the connection after using it
    $conn->close();
    