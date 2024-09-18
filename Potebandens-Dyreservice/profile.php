<head>
    <title>Potebandens Dyreservice | Profil</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-profile">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Profil</h1>
            <?php 
                if (isset($_SESSION["id"])  || isset($_SESSION["username"])) {
                    echo "<h3>" . $_SESSION["username"] . "</h3>";
                }
                else {
                    echo "<h3>Administrator</h3>";
                }
            ?>
        </div>
    </div>
    
    <div class="page-content">
        <div class="container">
            <div class="block profile">

                <!-- if logged in show page content -->
                <?php if (isset($_SESSION["id"])  || isset($_SESSION["username"])) { ?>

                    <div class="logged-in">
                        <h3>Du er logget ind som</h3>
                        <h2><?php echo $_SESSION["username"]; ?></h2>
                    </div>

                    <div class="messages">
                        <?php
                            if (isset($_GET["error"])) {
                                // errors for changing password
                                if ($_GET["error"] == "currentpassworddoesnotmatch") {
                                    echo "<div class='error'>";
                                    echo "<h3>Skift Kodeord</h3>";
                                    echo "<h4>- Det nuværende kodeord er forkert</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "newpasswordsdoesntmatch") {
                                    echo "<div class='error'>";
                                    echo "<h3>Skift Kodeord</h3>";
                                    echo "<h4>- De to nye kodeord matcher ikke</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "repeatnewpassword") {
                                    echo "<div class='error'>";
                                    echo "<h3>Skift Kodeord</h3>";
                                    echo "<h4>- Gentag det nye kodeord</h4>";
                                    echo "</div>";
                                }
                                // errors for creating new user
                                if ($_GET["error"] == "emptysignupinput") {
                                    echo "<div class='error'>";
                                    echo "<h3>Opret Bruger</h3>";
                                    echo "<h4>- Udfyld alle felter!</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "invalidusername") {
                                    echo "<div class='error'>";
                                    echo "<h3>Opret Bruger</h3>";
                                    echo "<h4>- Brugernavnet er ikke gyldigt. Vælg et gyldigt brugernavn!</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "invalidemail") {
                                    echo "<div class='error'>";
                                    echo "<h3>Opret Bruger</h3>";
                                    echo "<h4>- Denne email adresse ser ikke ud til at eksisterer. Indtast en gyldig email adresse!</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "passwordsdoesntmatch") {
                                    echo "<div class='error'>";
                                    echo "<h3>Opret Bruger</h3>";
                                    echo "<h4>- Kodeordene matcher ikke!</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "usernameoremailtaken") {
                                    echo "<div class='error'>";
                                    echo "<h3>Opret Bruger</h3>";
                                    echo "<h4>- Der er allerede oprettet en bruger med dette brugernavn eller email!</h4>";
                                    echo "</div>";
                                }
                                if ($_GET["error"] == "stmtfailed") {
                                    echo "<div class='error'>";
                                    echo "<h3>Opret Bruger</h3>";
                                    echo "<h4>- Noget gik galt. Prøv igen senere!</h4>";
                                    echo "</div>";
                                }
                            }
                            // if password was changed successfully
                            if (isset($_GET["passwordupdated"])) {
                                echo "<div class='success'>";
                                echo "<h3>Kodeord opdateret!</h3>";
                                echo "</div>";
                            }
                            // if user was created successfully
                            if (isset($_GET["usercreated"])) {
                                echo "<div class='success'>";
                                echo "<h3>Bruger oprettet!</h3>";
                                echo "</div>";
                            }
                        ?>
                    </div>

                    <div class="update">
                        <div class="buttons">
                            <div class="change_password">
                                <div id="show_password">Skift Kodeord</div>
                                <div id="hide_password">Luk 'Skift Kodeord'</div>
                            </div>
                            <?php
                                // open this form when clicking .change_password button
                                include("includes/changepassword.inc.php");
                            ?>
                            <div class="new_user">
                                <div id="show_new_user">Opret Bruger</div>
                                <div id="hide_new_user">Luk 'Opret Bruger'</div>
                            </div>
                            <?php
                                // open this form when clicking .new_user button
                                include("includes/signup.inc.php");
                            ?>
                        </div>
                    
                        <?php  
                            include("php-partials/blocks/update-users/users.php");                      
                        ?>
                    </div>
                <?php } // if (isset($_SESSION["id"])) end

                // if not logged in
                else { ?>
                    <div class="no_session">
                        <h1>Beklager!</h1>
                        <h2>Du skal være logget ind for at se denne side.</h2>
                    </div>
                <?php } ?>

            </div>
        </div>
        
    </div>
</div>

<?php
    include_once("php-partials/blocks/footer/footer.php");
?>