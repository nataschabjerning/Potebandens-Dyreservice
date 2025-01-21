<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("../connect.inc.php");

    // get the input values from update openinghours in script.js
    $id             = $_REQUEST['openinghours_id'];
    $vacation       = $_REQUEST['vacation'];
    $mondayfrom     = $_REQUEST['mondayfrom'];
    $mondayto       = $_REQUEST['mondayto'];
    $tuesdayfrom    = $_REQUEST['tuesdayfrom'];
    $tuesdayto      = $_REQUEST['tuesdayto'];
    $wednesdayfrom  = $_REQUEST['wednesdayfrom'];
    $wednesdayto    = $_REQUEST['wednesdayto'];
    $thursdayfrom   = $_REQUEST['thursdayfrom'];
    $thursdayto     = $_REQUEST['thursdayto'];
    $fridayfrom     = $_REQUEST['fridayfrom'];
    $fridayto       = $_REQUEST['fridayto'];
    $saturdayfrom   = $_REQUEST['saturdayfrom'];
    $saturdayto     = $_REQUEST['saturdayto'];
    $sundayfrom     = $_REQUEST['sundayfrom'];
    $sundayto       = $_REQUEST['sundayto'];

    // if not filled out
    if(empty($mondayfrom) || empty($tuesdayfrom) || empty($wednesdayfrom) || empty($thursdayfrom) || empty($fridayfrom) ||  empty($saturdayfrom) || empty($sundayfrom)) {
        exit;
    }
    // if (weekday)from is not "closed" and (weekday)to is empty
    if($mondayfrom !== "Lukket" && $mondayto == "") {
        exit;
    }
    if($tuesdayfrom !== "Lukket" && $tuesdayto == "") {
        exit;
    }
    if($wednesdayfrom !== "Lukket" && $wednesdayto == "") {
        exit;
    }
    if($thursdayfrom !== "Lukket" && $thursdayto == "") {
        exit;
    }
    if($fridayfrom !== "Lukket" && $fridayto == "") {
        exit;
    }
    if($saturdayfrom !== "Lukket" && $saturdayto == "") {
        exit;
    }
    if($sundayfrom !== "Lukket" && $sundayto == "") {
        exit;
    }

    $sql = "UPDATE openinghours 
	SET
    vacation='$vacation', 
    mondayfrom='$mondayfrom',
    mondayto='$mondayto',
    tuesdayfrom='$tuesdayfrom',
    tuesdayto='$tuesdayto',
    wednesdayfrom='$wednesdayfrom',
    wednesdayto='$wednesdayto',
    thursdayfrom='$thursdayfrom',
    thursdayto='$thursdayto',
    fridayfrom='$fridayfrom',
    fridayto='$fridayto',
    saturdayfrom='$saturdayfrom',
    saturdayto='$saturdayto',
    sundayfrom='$sundayfrom',
    sundayto='$sundayto'
    WHERE id='$id'";

    // Process the query so row is updated in table and db
	if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
	}

	// Close the connection after using it
	$conn->close();