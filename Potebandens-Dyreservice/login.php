<head>
    <title>Potebandens Dyreservice | Ydelser og priser</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-services">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Log ind</h1>
        </div>
    </div>

    <div class="page-content">

        <div class="container">

            <div class="block admin">

                <form action="includes/signup.inc.php" method="post">

                    <h1>Create New User</h1>

                    <div class="newuserform">
                        <div class="name">
                            <div class="lbl">
                                <label for="name">Enter full name</label>
                                <div class="input">
                                    <input type="text" name="name" placeholder="Full name...">
                                </div>
                            </div>
                            <div class="lbl">
                                <label for="username">Enter user name</label>
                                <div class="input">
                                    <input type="text" name="username" placeholder="Example: Natascha">
                                </div>
                            </div>
                            <div class="lbl">
                                <label for="email">Enter e-mail</label>
                                <div class="input">
                                    <input type="text" name="email" placeholder="example@hotmail.com">
                                </div>
                            </div>
                        </div>
                        <div class="password">
                            <div class="lbl">
                                <label for="pw">Enter desired password</label>
                                <div class="input">
                                    <input type="password" name="pw" placeholder="Password">
                                </div>
                            </div>

                            <div class="lbl">
                                <label for="pwrepeat">Enter password again</label>
                                <div class="input">
                                    <input type="password" name="pwrepeat" placeholder="Reapeat password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="create">Create User</button>
                    </div>

                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Please fill in all input fields!</p>";
                            }
                            else if ($_GET["error"] == "invaliduid") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- This username is invalid. Please choose another username!</p>";
                            }
                            else if ($_GET["error"] == "invalidemail") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- This email does not exist. Please use a valid email!</p>";
                            }
                            else if ($_GET["error"] == "passwordsdoesntmatch") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- The passwords does not match. Please type in passwords again!</p>";
                            }
                            else if ($_GET["error"] == "usernameoremailtaken") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- This username or email is already in use</p>";
                            }
                            else if ($_GET["error"] == "stmtfailed") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Something went wrong. Please try again!</p>";
                            }
                            else if ($_GET["error"] == "none") {
                                echo "<p style=\"text-align:center;font-size:2rem;font-weight:bold;\">Succes!</p>";
                                echo "<p style=\"text-align:center;font-size:2rem;font-weight:bold;\">You have signed up!</p>";
                            }
                        }
                    ?>
                </form>

                <form action="./includes/login.inc.php" method="post">
                
                    <h1>Log In</h1>

                    <div class="loginform">
                        <div class="lbl">
                            <label for="username">Username or email</label>
                            <div class="input">
                                <input type="text" name="uid">
                            </div>
                        </div>
                        <div class="lbl">
                            <label for="password">Password</label>
                            <div class="input">
                                <input type="password" name="pw" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="login">Log In</button>
                    </div>
            
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Error!</p>";
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Please fill in all input fields!</p>";
                            }
                            else if ($_GET["error"] == "wrongname") {
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- An error ocurred. User does not exist.</p>";
                            }
                            else if ($_GET["error"] == "wrongpassword") {
                                echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- An error ocurred. Password is wrong.</p>";
                            }
                        }
                    ?>
                </form>

            </div>

        </div>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>