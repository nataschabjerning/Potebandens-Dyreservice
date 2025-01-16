<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    $vacationform   = $_POST['vacationform'];
    $mondayfromform     = $_POST['mondayfromform'];
    $mondaytoform     = $_POST['mondaytoform'];
    $tuesdayfromform     = $_POST['tuesdayfromform'];
    $tuesdaytoform     = $_POST['tuesdaytoform'];
    $wednesdayfromform     = $_POST['wednesdayfromform'];
    $wednesdaytoform     = $_POST['wednesdaytoform'];
    $thursdayfromform     = $_POST['thursdayfromform'];
    $thursdaytoform     = $_POST['thursdaytoform'];
    $fridayfromform     = $_POST['fridayfromform'];
    $fridaytoform     = $_POST['fridaytoform'];
    $saturdayfromform     = $_POST['saturdayfromform'];
    $saturdaytoform     = $_POST['saturdaytoform'];
    $sundayfromform     = $_POST['sundayfromform'];
    $sundaytoform     = $_POST['sundaytoform'];

    // if not filled out
    if(empty($mondayfromform) || empty($tuesdayfromform) || empty($wednesdayfromform) || empty($thursdayfromform) || empty($fridayfromform) ||  empty($saturdayfromform) || empty($sundayfromform)) {
        exit;
    }
    // if (weekday)from is not "closed" and (weekday)to is empty
    if($mondayfromform !== "Lukket" && empty($mondaytoform)) {
        exit;
    }
    if($tuesdayfromform !== "Lukket" && empty($tuesdaytoform)) {
        exit;
    }
    if($wednesdayfromform !== "Lukket" && empty($wednesdaytoform)) {
        exit;
    }
    if($thursdayfromform !== "Lukket" && empty($thursdaytoform)) {
        exit;
    }
    if($fridayfromform !== "Lukket" && empty($fridaytoform)) {
        exit;
    }
    if($saturdayfromform !== "Lukket" && empty($saturdaytoform)) {
        exit;
    }
    if($sundayfromform !== "Lukket" && empty($sundaytoform)) {
        exit;
    }

    $sql = "INSERT INTO openinghours (vacation, mondayfrom, mondayto, tuesdayfrom, tuesdayto, wednesdayfrom, wednesdayto, thursdayfrom, thursdayto, fridayfrom, fridayto, saturdayfrom, saturdayto, sundayfrom, sundayto) 
    VALUES ('$vacationform', '$mondayfromform', '$mondaytoform', '$tuesdayfromform', '$tuesdaytoform', '$wednesdayfromform', '$wednesdaytoform', '$thursdayfromform', '$thursdaytoform', '$fridayfromform', '$fridaytoform', '$saturdayfromform', '$saturdaytoform', '$sundayfromform', '$sundaytoform')";

    // Process the query so row is created in table and db
    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection after using it
    $conn->close();
    