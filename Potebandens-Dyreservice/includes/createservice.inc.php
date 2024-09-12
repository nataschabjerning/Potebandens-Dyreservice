<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    // set to false and go though all checks below
    $response = false;

    $service_name           = $_POST['service_name'];
    $service_length         = $_POST['service_length'];
    $service_description    = $_POST['service_description'];
    $service_price          = $_POST['service_price'];

    // if not filled out
    if(!$service_name || !$service_description || !$service_price) {
        exit;
    }
    // if there is numbers in service_name
    if(preg_match("/\d/", $service_name)) {
        exit;
    }
    // if service_price is not a number
    if(!is_numeric($service_price)) {
        exit;
    }
    
    $sql = "INSERT INTO services (service_name, service_length, service_description, service_price) 
    VALUES ('$service_name', '$service_length', '$service_description', '$service_price')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    ob_start(); ?>
        <table></table>
    <?php $sHTML = ob_get_clean();

    // Close the connection after using it
    $conn->close();
    