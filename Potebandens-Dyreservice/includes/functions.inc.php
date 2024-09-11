<?php

    /* ---------- Create User ---------- */
    function emptyInputSignup($name, $username, $email, $pw, $pwrepeat) {

        if (empty($name) || empty($username) || empty($email) || empty($pw) || empty($pwrepeat)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function invalidUid($username) {

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function pwMatch($pw, $pwrepeat) {
        
        if ($pw !== $pwrepeat) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function uidExists($conn, $username, $email) {
        
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);
        
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

    }

    function createUser($conn, $name, $username, $email, $pw) {
        
        $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        $hashedPw = password_hash($pw, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashedPw);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../login.php?usercreated");
    }


    /* ---------- Login User ---------- */
    function emptyInputLogin($username, $pw) {

        if (empty($username) || empty($pw)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pw) {

        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $pwHashed = $uidExists["password"];
        $checkPw = password_verify($pw, $pwHashed);

        if ($checkPw === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if ($checkPw === true) {
            session_start();
            $_SESSION["id"] = $uidExists["id"];
            $_SESSION["username"] = $uidExists["username"];
            header("location: ../admin.php");
            exit();
        }

    }