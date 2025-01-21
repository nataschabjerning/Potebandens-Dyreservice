<?php
    // if 'Opret Bruger' button is clicked
    if (isset($_POST["create"])) {

        // connect to database and functions
        require_once "../connect.inc.php";
        require_once "../functions.inc.php";

        // get input values from form
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];

        // Go through all checks ->
        // call to emptyInputSignup() in includes/functions.inc.php (line 11)
        if (emptyInputSignup($name, $username, $email, $password, $repeat_password) !== false) {
            header("Location: ../../admin-profile.php?error=emptysignupinput");
            exit();
        }
        // call to invalidUid() in includes/functions.inc.php (line 24)
        if (invalidUid($username) !== false) {
            header("Location: ../../admin-profile.php?error=invalidusername");
            exit();
        }
        // call to invalidEmail in includes/functions.inc.php (line 37)
        if (invalidEmail($email) !== false) {
            header("Location: ../../admin-profile.php?error=invalidemail");
            exit();
        }
        // call to passwordMatch() in includes/functions.inc.php (line 50)
        if (passwordMatch($password, $repeat_password) !== false) {
            header("Location: ../../admin-profile.php?error=passwordsdoesntmatch");
            exit();
        }
        // call to uidExists() in includes/functions.inc.php (line 63)
        if (uidExists($conn, $username, $username) !== false) {
            header("Location: ../../admin-profile.php?error=usernametaken");
            exit();
        }
        // call to uidExists() in includes/functions.inc.php (line 63)
        if (uidExists($conn, $email, $email) !== false) {
            header("Location: ../../admin-profile.php?error=emailtaken");
            exit();
        }

        // call to createUser() function in includes/functions.inc.php (line 81)
        createUser($conn, $name, $username, $email, $password);
    }
?>

<div id="create-user">
    <form action="./includes/user/signup.inc.php" method="post">
        
        <p class="span"><span>*</span> SKAL udfyldes</p>
        <h2>Opret Bruger</h2>

        <div class="newuserform">
            <div class="email">
                <label for="email">Email <span>*</span></label>
                <div class="input">
                    <input type="email" name="email" placeholder="natascha@email.dk">
                </div>
            </div>
            <div class="bottom-fields">
                <div class="name">
                    <label for="name">Fulde navn  <span>*</span></label>
                    <div class="input">
                        <input type="text" name="name" placeholder="Natascha Bjerning">
                    </div>
                    <label for="username">Brugernavn  <span>*</span></label>
                    <div class="input">
                        <input type="text" name="username" placeholder="Natascha1234">
                    </div>
                </div>
                <div class="password">
                    <label for="pw">Kodeord  <span>*</span></label>
                    <div class="input">
                        <input type="password" name="password">
                    </div>
                    <label for="pwrepeat">Gentag kodeord  <span>*</span></label>
                    <div class="input">
                        <input type="password" name="repeat_password">
                    </div>  
                </div> 
            </div>      
        </div>
        <button type="submit" name="create">Opret Bruger</button>
    </form>
</div>