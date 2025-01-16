<?php
    if (isset($_POST["login"])) {

        // connect to database and functions
        require_once "../connect.inc.php";
        require_once "../functions.inc.php";

        // get input values from form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // call to emptyInputLogin() in includes/functions.inc.php (line 123)
        // check if inputs are em
        if (emptyInputLogin($username, $password) !== false) {
            // send user back to the login page with an error message that says they forgot to write something in an input field
            header("location: ../../login.php?error=emptylogininput");
            exit();
        }

        // call to loginUser() function in includes/functions.inc.php (line 136)
        loginUser($conn, $username, $password);
    } 
?>

<div class="login-user">
    <form action="./includes/user/login.inc.php" method="post">

        <h2>Log Ind</h2>

        <?php
            if (isset($_GET["error"])) {
                // errors for loggin in
                if ($_GET["error"] == "emptylogininput") {
                    echo "<div class='error'>";
                    echo "<h4>- Udfyld alle felter</h4>";
                    echo "</div>";
                }
                if ($_GET["error"] == "wrongusername") {
                    echo "<div class='error'>";
                    echo "<h4>- Brugernavn findes ikke</h4>";
                    echo "</div>";
                }
                if ($_GET["error"] == "wrongpassword") {
                    echo "<div class='error'>";
                    echo "<h4>- Kodeordet er forkert</h4>";
                    echo "</div>";
                }
            }
        ?>

        <div class="loginform">
            <label for="username">Brugernavn</label>
            <div class="input">
                <input type="text" name="username">
            </div>
            <label for="password">Kodeord</label>
            <div class="input">
                <input type="password" name="password">
            </div>
            <button type="submit" name="login">Log Ind</button>
        </div>
    </form>
</div>