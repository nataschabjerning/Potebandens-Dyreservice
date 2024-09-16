<form action="./includes/changepassword.inc.php" method="post">
    <h2>Log Ind</h2>

    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "oldpassworddoesntmatch") {
                echo "<div class='error'>";
                echo "<h4>- Det gamle kodeord er forkert</h4>";
                echo "</div>";
            }
            if ($_GET["error"] == "passwordsdoesntmatch") {
                echo "<div class='error'>";
                echo "<h4>- De nye kodeord matcher ikke</h4>";
                echo "</div>";
            }
        }
        else if (isset($_GET["passwordupdated"])) {
            echo "<div class='success'>";
            echo "<h4>Bruger oprettet!</h4>";
            echo "</div>";
        }
    ?>
    <div class="changepassword">
        <label for="username">Gammelt kodeord</label>
        <div class="input">
            <input type="password" name="oldPassword">
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
    <button type="submit" name="change">Skrift kodeord</button>
</form>

<?php
    // connect to database and functions
    require_once "connect.inc.php";
    require_once "functions.inc.php";

    if(isset($_POST['change']))
    {
        session_start();
        $username = $_SESSION['username'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $repeatNewPassword = $_POST['repeatNewPassword'];

        // call to passwordMatch() in includes/functions.inc.php (line 42)
        if (passwordMatch($newPassword, $repeatNewPassword) !== false) {
            header("Location: ../login.php?error=passwordsdoesntmatch");
            exit();
        }

        changePassword($conn, $username, $oldPassword, $newPassword);
    }
?>