<?php

    // show errors if any
    echo ini_set('display_errors', 1);
    echo ini_set('display_startup_errors', 1);
    echo error_reporting(E_ALL);

    include_once("connect.inc.php");

    // File upload directory
    $targetDir = "about-images/";

    $about_image_link = basename($_FILES["about_file"]["name"]);
    $about_name = $_POST["about_name"];
    $about_work_title = $_POST["about_work_title"];
    $about_text_one = $_POST["about_text_one"];
    $about_text_two = $_POST["about_text_two"];
    $about_text_three = $_POST["about_text_three"];
    $about_text_four = $_POST["about_text_four"];
    $about_text_five = $_POST["about_text_five"];
    $about_text_six = $_POST["about_text_six"];
    $about_text_seven = $_POST["about_text_seven"];

    $targetFilePath = $targetDir . $about_image_link;
    // get image extension store it in variable
    $fileType = pathinfo($about_image_link, PATHINFO_EXTENSION);
    // creating array that stores allowed file types
    $allowTypes = array('jpg','png','jpeg','gif');

    // if not filled out
    if(empty($about_name) || empty($about_text_one)) {
        header("Location: ../admin-about.php?error=aboutemptyinputs");
        exit;
    }
    // if image is chosen and allowed file formats is selected
    if (!empty($about_image_link) && !in_array($fileType, $allowTypes)) {
        header("Location: ../admin-index.php?error=aboutwrongfiletype");
        exit();
    }
    // if image is chosen but moving file to folder failed
    if (!empty($about_image_link) && !move_uploaded_file($_FILES["about_file"]["tmp_name"], $targetFilePath)) {
            
        header("Location: ../admin-index.php?error=aboutmovingfilefailed");
        exit();
    }

    // inserting into database
    $insert = $conn->query("INSERT INTO about (about_image_link, about_name, about_work_title, about_text_one, about_text_two, about_text_three, about_text_four, about_text_five, about_text_six, about_text_seven) VALUES ('".$about_image_link."', '".$about_name."', '".$about_work_title."', '".$about_text_one."', '".$about_text_two."', '".$about_text_three."', '".$about_text_four."', '".$about_text_five."', '".$about_text_six."', '".$about_text_seven."')");

    // IF ALL CHECKS CLEAR
    if ($insert) {
        header("Location: ../admin-about.php?aboutuploaded");
        exit();
    }
    // if insert into database failed
    else {
        header("Location: ../admin-index.php?error=aboutinsertfailed");
        exit();
    }