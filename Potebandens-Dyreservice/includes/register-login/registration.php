<?php
    if (isset($_POST["register"])) {
        $fullName = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();
        
        // if (empty($fullName) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        //     array_push($errors,"All fields are required");
        // }
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // array_push($errors, "Email is not valid");
        // }
        // if (strlen($password)<8) {
        //     array_push($errors,"Password must be at least 8 charactes long");
        // }
        // if ($password!==$passwordRepeat) {
        //     array_push($errors,"Password does not match");
        // }

        require_once "includes/connect.inc.php";
        // $sql = "SELECT * FROM users WHERE username = '$username'";
        // $result = mysqli_query($conn, $sql);
        // $rowCount = mysqli_num_rows($result);
        // if ($rowCount>0) {
        //     array_push($errors,"Email already exists!");
        // }
        // if (count($errors)>0) {
        //     foreach ($errors as  $error) {
        //         echo "<div class='alert alert-danger'>$error</div>";
        //     }
        // }
        // else {
        //     $sql = "INSERT INTO users (name, username, email, password) VALUES ( ?, ?, ?, ? )";
        //     $stmt = mysqli_stmt_init($conn);
        //     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        //     if ($prepareStmt) {
        //         mysqli_stmt_bind_param($stmt,"ssss",$fullName, $userName, $email, $passwordHash);
        //         mysqli_stmt_execute($stmt);
        //         echo "<div class='alert alert-success'>You are registered successfully.</div>";
        //     }
        //     else {
        //         die("Something went wrong");
        //     }
        // }

        $sql = "INSERT INTO users (name, username, email, password) VALUES ( ?, ?, ?, ? )";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"ssss",$fullName, $userName, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        }
        else {
            die("Something went wrong");
        }
    }
?>

<!-- registration.php url is not found - WHY?!?! -->
<form action="registration.php" method="post">
    <div class="form-group">
        <input type="text" name="fullname" placeholder="Full Name:">
    </div>
    <div class="form-group">
        <input type="text" name="username" placeholder="user name:">
    </div>
    <div class="form-group">
        <input type="emamil" name="email" placeholder="Email:">
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password:">
    </div>
    <div class="form-group">
        <input type="password" name="repeat_password" placeholder="Repeat Password:">
    </div>
    <div class="form-btn">
        <input type="submit" value="Register" name="register">
    </div>
</form>