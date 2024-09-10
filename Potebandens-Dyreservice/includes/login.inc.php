<?php

    if (isset($_POST["login"])) {
        
        $username = $_POST["uid"];
        $pw = $_POST["pw"];

        include_once("connect.inc.php");
        include_once("functions.inc.php");

        if (emptyInputLogin($username, $pw) !== false) {
            // send user back to the login page with an error message that says they forgot to write something in an input field
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $username, $pw);

    }
    else {
        header('location: ../login.php');
        exit();
    }