<?php

    if(isset($_POST['change'])) {

        session_start();
        $userId = $_SESSION["id"];

        // connect to database and functions
        require_once "../connect.inc.php";
        require_once "../functions.inc.php";
        
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $repeatNewPassword = $_POST['repeatNewPassword'];

        // get info from db where id = the chosen user id when clicked
        $sql="SELECT password from users where id='$userId'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        
        // if current password match password in database
        if (password_verify($currentPassword,$row['password'])) {
            // if repeat password is empty
            if($repeatNewPassword =='') {
                header("location: ../../admin-profile.php?error=repeatnewpassword");
                exit();
            }
            // if new password does not match repeat password
            if($newPassword != $repeatNewPassword) {
                header("location: ../../admin-profile.php?error=newpasswordsdoesntmatch");
                exit();
            }
            // if no errors
            if(!isset($errors)) {
                $options = array("cost"=>4);
                $newPassword = password_hash($newPassword,PASSWORD_BCRYPT,$options);

                $result = mysqli_query($conn,"UPDATE users SET password='$newPassword' WHERE id='$userId'");

                if($result) {
                    header("location: ../../admin-profile.php?passwordupdated");
                }
                else {
                    header("location: ../../admin-profile.php?error=stmtfailed");
                    exit();
                }
            }
        }
        // if current password does not match password in database
        else {
            header("location: ../../admin-profile.php?error=currentpassworddoesnotmatch");
            exit();
        }
    }
?>

<div id="change-password">
    <form action="./includes/user/changepassword.inc.php" method="post">

        <p class="span"><span>*</span> SKAL udfyldes</p>
        <h2>Skift Kodeord</h2>

        <div class="passwordform">
            <label for="username">Nuværende kodeord <span>*</span></label>
            <div class="input">
                <input type="password" name="currentPassword">
            </div>
            <label for="password">Nyt kodeord <span>*</span></label>
            <div class="input">
                <input type="password" name="newPassword">
            </div>
            <label for="password">Gentag nyt kodeord <span>*</span></label>
            <div class="input">
                <input type="password" name="repeatNewPassword">
            </div>
        </div>
        <button type="submit" name="change">Skift kodeord</button>
    </form>
</div>