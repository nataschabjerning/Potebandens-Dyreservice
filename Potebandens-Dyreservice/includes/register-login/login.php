<?php
    if (isset($_POST["login"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once "includes/connect.inc.php";
        
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                header("Location: admin.php");
                die();
            }
            else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        }
        else {
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }
    }

    // function uidExists($conn, $username, $email) {
    
    //     $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email';";
    //     $stmt = mysqli_stmt_init($conn);
        
    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
    //         header("location: ../newuser.php?error=stmtfailed");
    //         exit();
    //     }

    //     mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    //     mysqli_stmt_execute($stmt);
    //     $resultData = mysqli_stmt_get_result($stmt);
    //     mysqli_stmt_close($stmt);

    //     if ($row = mysqli_fetch_assoc($resultData)) {
    //         return $row;
    //     }
    //     else {
    //         $result = false;
    //         return $result;
    //     }
    // }
?>

<form action="login.php" method="post">
    <div class="form-group">
        <input type="text" placeholder="Enter Email:" name="username">
    </div>
    <div class="form-group">
        <input type="password" placeholder="Enter Password:" name="password">
    </div>
    <div class="form-btn">
        <input type="submit" value="Login" name="login">
    </div>
</form>