<?php

    // show errors if any
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("connect.inc.php");

    $service_name               = $_POST['service_name'];
    $service_short_description  = $_POST['service_short_description'];
    $service_description_one    = $_POST['service_description_one'];
    $service_description_two    = $_POST['service_description_two'];
    $service_description_three  = $_POST['service_description_three'];
    $service_description_four   = $_POST['service_description_four'];
    $important_note             = $_POST['important_note'];

    // if not filled out
    if(!$service_name || !$service_short_description || !$service_description_one) {
        exit;
    }
    // if there is numbers in service_name
    if(preg_match("/\d/", $service_name)) {
        exit;
    }
    
    $sql = "INSERT INTO services (service_name, service_short_description, service_description_one, service_description_two, service_description_three, service_description_four, important_note) 
    VALUES ('$service_name', '$service_short_description', '$service_description_one', '$service_description_two', '$service_description_three', '$service_description_four', '$important_note')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // ob_start(); ?>
        <!-- <table></table> -->
    <!-- <?php // $sHTML = ob_get_clean(); -->

    // Close the connection after using it
    $conn->close();
    