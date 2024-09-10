<?php

    if (isset($_POST["create"])) {
        
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pw = $_POST["pw"];
        $pwrepeat = $_POST["pwrepeat"];

        require_once "connect.inc.php";
        require_once "functions.inc.php";

        if (emptyInputSignup($name, $username, $email, $pw, $pwrepeat) !== false) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        }

        if (invalidUid($username) !== false) {
            header("Location: ../login.php?error=invaliduid");
            exit();
        }

        if (invalidEmail($email) !== false) {
            header("Location: ../login.php?error=invalidemail");
            exit();
        }

        if (pwMatch($pw, $pwrepeat) !== false) {
            header("Location: ../login.php?error=passwordsdoesntmatch");
            exit();
        }

        if (uidExists($conn, $username, $email) !== false) {
            header("Location: ../login.php?error=usernameoremailtaken");
            exit();
        }

        createUser($conn, $name, $username, $email, $pw);

    }