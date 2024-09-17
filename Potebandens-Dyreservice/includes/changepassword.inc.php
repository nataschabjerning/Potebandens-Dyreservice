<?php
    session_start();
    $userId = $_SESSION["id"];
?>

<div class="change-password">
    <form action="./includes/changepassword.inc.php" method="post">
        <h2>Skift Kodeord</h2>

        <div class="passwordform">
            <label for="username">Nuværende kodeord</label>
            <div class="input">
                <input type="password" name="currentPassword">
            </div>
            <label for="password">Nyt kodeord</label>
            <div class="input">
                <input type="password" name="newPassword">
            </div>
            <label for="password">Gentag nyt kodeord</label>
            <div class="input">
                <input type="password" name="repeatNewPassword">
            </div>
        </div>
        <button type="submit" name="change">Skift kodeord</button>
    </form>
</div>

<?php

    if(isset($_POST['change'])) {

        // connect to database and functions
        require_once "connect.inc.php";
        require_once "functions.inc.php";
        
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $repeatNewPassword = $_POST['repeatNewPassword'];

        $sql="SELECT password from users where id='$userId'";
        $res = mysqli_query($conn,$sql);
        $res=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        
        if (password_verify($currentPassword,$row['password'])) {
            if($repeatNewPassword =='') {
                header("location: ../login.php?error=repeatnewpassword");
                exit();
            }
            if($newPassword != $repeatNewPassword) {
                header("location: ../login.php?error=newpasswordsdoesntmatch");
                exit();
            }
            if(!isset($errors)) {
                $options = array("cost"=>4);
                $newPassword = password_hash($newPassword,PASSWORD_BCRYPT,$options);

                $result = mysqli_query($conn,"UPDATE users SET password='$newPassword' WHERE id='$userId'");

                if($result) {
                    header("location: ../login.php?passwordupdated");
                }
                else {
                    header("location: ../login.php?error=stmtfailed");
                    exit();
                }
            }
        }
        else {
            header("location: ../login.php?error=currentpassworddoesnotmatch");
            exit();
        }
    }
?>