<?php

    /* MARK: CREATE USER
    */
    



    /* MARK: empty input
    ---- Empty inputs when creating new user ---- */
    function emptyInputSignup($name, $username, $email, $password, $passwordrepeat) {

        if (empty($name) || empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    /* MARK: username numb
    ---- Check if username contains other characters than letters and numbers ---- */
    function invalidUid($username) {

        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    /* MARK: email invalid
    ---- Check if email form is valid ---- */
    function invalidEmail($email) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    /* MARK: password match
    ---- Check if passwords matches when creating new user ---- */
    function passwordMatch($password, $passwordrepeat) {

        if ($password !== $passwordrepeat) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    /* MARK: name/email taken
    ---- Check if username or email is already attached to a user in the database ---- */
    function uidExists($conn, $username, $email) {

        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../../admin-profile.php?error=stmtfailed");
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

    /* MARK: create user
    ---- Create user and insert into database ---- */
    function createUser($conn, $name, $username, $email, $password) {

        $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../../admin-profile.php?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../../admin-profile.php?usercreated");
    }


    
    /*------------------------------------------------------------------------------*/
    
    
    
    /* MARK: LOGIN USER
    



    MARK: empty inputs
    ---- If inputs are empty when logging in ---- */
    function emptyInputLogin($username, $password) {

        if (empty($username) || empty($password)) {
            $result = true;
        } 
        else {
            $result = false;
        }
        return $result;
    }

    /* MARK: login user
    ---- Login user and start $_SESSION ---- */
    function loginUser($conn, $username, $password) {

        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header("location: ../../login.php?error=wrongusername");
            exit();
        }

        $passwordHashed = $uidExists["password"];
        $checkPassword = password_verify($password, $passwordHashed);

        if ($checkPassword === false) {
            header("location: ../../login.php?error=wrongpassword");
            exit();
        }
        else if ($checkPassword === true) {
            session_start();
            $_SESSION["id"] = $uidExists["id"];
            $_SESSION["username"] = $uidExists["username"];
            header("location: ../../admin.php");
            exit();
        }
    }