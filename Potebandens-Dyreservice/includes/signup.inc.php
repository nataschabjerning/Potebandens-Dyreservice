<div class="create-user">
    <form action="./includes/signup.inc.php" method="post">
        
        <h2>Opret Bruger</h2>

        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptysignupinput") {
                    echo "<div class='error'>";
                    echo "<h4>- Udfyld alle felter!</h4>";
                    echo "</div>";
                }
                else if ($_GET["error"] == "invalidusername") {
                    echo "<div class='error'>";
                    echo "<h4>- Brugernavnet er ikke gyldigt. Vælg et gyldigt brugernavn!</h4>";
                    echo "</div>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<div class='error'>";
                    echo "<h4>- Denne email adresse ser ikke ud til at eksisterer. Indtast en gyldig email adresse!</h4>";
                    echo "</div>";
                }
                else if ($_GET["error"] == "passwordsdoesntmatch") {
                    echo "<div class='error'>";
                    echo "<h4>- Kodeordene matcher ikke!</h4>";
                    echo "</div>";
                }
                else if ($_GET["error"] == "usernameoremailtaken") {
                    echo "<div class='error'>";
                    echo "<h4>- Der er allerede oprettet en bruger med dette brugernavn eller email!</h4>";
                    echo "</div>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<div class='error'>";
                    echo "<h4>- Noget gik galt. Prøv igen senere!</h4>";
                    echo "</div>";
                }
            }
            else if (isset($_GET["usercreated"])) {
                echo "<div class='success'>";
                echo "<h4>Bruger oprettet!</h4>";
                echo "</div>";
            }
        ?>

        <div class="newuserform">
            <div class="name">
                <label for="name">Fulde navn</label>
                <div class="input">
                    <input type="text" name="name" placeholder="Jens Jensen">
                </div>
                <label for="username">Brugernavn</label>
                <div class="input">
                    <input type="text" name="username" placeholder="Jens94">
                </div>
                <label for="email">Email</label>
                <div class="input">
                    <input type="text" name="email" placeholder="jens@email.dk">
                </div>
            </div>
            <div class="password">
                <label for="pw">Kodeord</label>
                <div class="input">
                    <input type="password" name="password">
                </div>
                <label for="pwrepeat">Gentag kodeord</label>
                <div class="input">
                    <input type="password" name="repeat_password">
                </div>  
            </div>              
        </div>
        <button type="submit" name="create">Opret Bruger</button>
    </form>
</div>

<?php
    // if 'Opret Bruger' button is clicked
    if (isset($_POST["create"])) {

        // connect to database and functions
        require_once "connect.inc.php";
        require_once "functions.inc.php";

        // get input values from form
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];

        // Go through all checks ->
        // call to emptyInputSignup() in includes/functions.inc.php (line 6)
        if (emptyInputSignup($name, $username, $email, $password, $repeat_password) !== false) {
            header("Location: ../login.php?error=emptysignupinput");
            exit();
        }
        // call to invalidUid() in includes/functions.inc.php (line 18)
        if (invalidUid($username) !== false) {
            header("Location: ../login.php?error=invalidusername");
            exit();
        }
        // call to invalidEmail in includes/functions.inc.php (line 30)
        if (invalidEmail($email) !== false) {
            header("Location: ../login.php?error=invalidemail");
            exit();
        }
        // call to passwordMatch() in includes/functions.inc.php (line 42)
        if (passwordMatch($password, $repeat_password) !== false) {
            header("Location: ../login.php?error=passwordsdoesntmatch");
            exit();
        }
        // call to uidExists() in includes/functions.inc.php (line 54)
        if (uidExists($conn, $username, $email) !== false) {
            header("Location: ../login.php?error=usernameoremailtaken");
            exit();
        }

        // call to createUser() function in includes/functions.inc.php (line 81)
        createUser($conn, $name, $username, $email, $password);
    }
?>