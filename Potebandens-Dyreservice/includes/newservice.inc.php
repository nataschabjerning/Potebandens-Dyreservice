<?php

    if (isset($_POST["add-service"])) {

        include_once("connect.inc.php");
        include_once("functions.inc.php");
        
        $service_name = $_POST['service_name'];
        $service_length = $_POST['service_length'];
        $service_description = $_POST['service_description'];
        $service_price = $_POST['service_price'];

        if (emptyInputService($service_name, $service_length, $service_description, $service_price) !== false) {
            header("location: ../admin-services.php?error=emptyinput");
            exit();
        }

        createService($conn, $service_name, $service_length, $service_description, $service_price);

        header("location: ../admin-services.php");

    }