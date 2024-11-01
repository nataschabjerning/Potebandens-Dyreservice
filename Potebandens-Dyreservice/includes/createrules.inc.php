<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    $rules          = $_POST['rules'];
    $point_one      = $_POST['point_one'];
    $point_two      = $_POST['point_two'];
    $point_three    = $_POST['point_three'];
    $point_four     = $_POST['point_four'];
    $point_five     = $_POST['point_five'];
    $point_six      = $_POST['point_six'];
    $point_seven    = $_POST['point_seven'];
    $point_eight    = $_POST['point_eight'];
    $point_nine     = $_POST['point_nine'];
    $point_ten      = $_POST['point_ten'];

    // if not filled out
    if(empty($rules) || empty($point_one)) {
        exit;
    }
    
    $sql = "INSERT INTO rules (rules, rules_point_one, rules_point_two, rules_point_three, rules_point_four, rules_point_five, rules_point_six, rules_point_seven, rules_point_eight, rules_point_nine, rules_point_ten) 
    VALUES ('$rules', '$point_one', '$point_two', '$point_three', '$point_four', '$point_five', '$point_six', '$point_seven', '$point_eight', '$point_nine', '$point_ten')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection after using it
    $conn->close();
    