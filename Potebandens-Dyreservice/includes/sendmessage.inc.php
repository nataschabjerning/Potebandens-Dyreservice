<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    $message_name       = $_POST['message_name'];
    $message_subject    = $_POST['message_subject'];
    $message_msg        = $_POST['message_msg'];
    $message_contact    = $_POST['message_contact'];
    $message_phone      = $_POST['message_phone'];
    $message_email      = $_POST['message_email'];

    // if not filled out
    if(empty($message_name) || empty($message_subject) || empty($message_msg) || empty($message_contact)) {
        exit;
    }
    // if there is numbers in message_name
    if(preg_match("/\d/", $message_name)) {
        exit;
    }
    // if call or sms is selected but no phone number is given
    if ($message_contact == "call" && empty($message_phone) || $message_contact == "sms" && empty($message_phone)) {
        exit;
    }
    // if there is letters in message_phone
    if($message_contact == "call" && !is_numeric( $message_phone) || $message_contact == "sms" && !is_numeric( $message_phone)) {
        exit;
    }
    // if email is selected but no email is given
    if ($message_contact == "email" && empty($message_email)) {
        exit;
    }
    
    $sql = "INSERT INTO inbox (message_name, message_subject, message_msg, message_contact, message_phone, message_email) 
    VALUES ('$message_name', '$message_subject', '$message_msg', '$message_contact', '$message_phone', '$message_email')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection after using it
    $conn->close();