<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    $message_name       = $_POST['message_name'];
    $message_subject    = $_POST['message_subject'];
    $message_msg        = $_POST['message_msg'];
    $message_phone        = $_POST['phone_input'];
    $message_email        = $_POST['email_input'];

    // if not filled out
    if(empty($message_name) || empty($message_subject) || empty($message_msg)) {
        exit;
    }
    // if there is numbers in service_name
    if(preg_match("/\d/", $message_name)) {
        exit;
    }
    
    $sql = "INSERT INTO inbox (message_name, message_subject, message_msg, message_phone, message_email) 
    VALUES ('$message_name', '$message_subject', '$message_msg', '$message_phone', '$message_email')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // ob_start(); ?>
        <!-- <table></table> -->
    <!-- <?php // $sHTML = ob_get_clean(); -->

    // Close the connection after using it
    $conn->close();