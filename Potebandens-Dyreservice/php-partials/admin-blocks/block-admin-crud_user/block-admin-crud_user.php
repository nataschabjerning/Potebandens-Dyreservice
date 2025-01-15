<div class="block create-update_user">
    <div class="container">

        <h2 class="admin-titles">Oversigt over alle brugere</h2>

        <div class="create-update_user-messages">
            <?php
                if (isset($_GET["error"])) {
                    // errors for changing password
                    if ($_GET["error"] == "currentpassworddoesnotmatch") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Skift Kodeord *</p>";
                        echo "<p class='caption'>- Det nuværende kodeord er forkert</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "newpasswordsdoesntmatch") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Skift Kodeord *</p>";
                        echo "<p class='caption'>- De to nye kodeord matcher ikke</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "repeatnewpassword") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Skift Kodeord *</p>";
                        echo "<p class='caption'>- Gentag det nye kodeord</p>";
                        echo "</div>";
                    }
                    // errors for creating new user
                    if ($_GET["error"] == "emptysignupinput") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Udfyld alle felter!</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "invalidusername") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Brugernavnet er ikke gyldigt. Vælg et gyldigt brugernavn!</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "invalidemail") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Denne email adresse ser ikke ud til at eksisterer. Indtast en gyldig email adresse!</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "passwordsdoesntmatch") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Kodeordene matcher ikke!</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "usernametaken") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Der er allerede oprettet en bruger med dette brugernavn!</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "emailtaken") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Der er allerede oprettet en bruger med denne email!</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "stmtfailed") {
                        echo "<div class='error'>";
                        echo "<p class='title'>* Opret Bruger *</p>";
                        echo "<p class='caption'>- Noget gik galt. Prøv igen senere!</p>";
                        echo "</div>";
                    }
                }
                // if password was changed successfully
                if (isset($_GET["passwordupdated"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to profile when 'ok' is clicked
                    echo "alert('Kodeord opdateret!');window.location.href = 'admin-profile.php';";
                    echo "</script>";
                }
                // if user was created successfully
                if (isset($_GET["usercreated"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to profile when 'ok' is clicked
                    echo "alert('Bruger oprettet!');window.location.href = 'admin-profile.php';";
                    echo "</script>";
                }
            ?>
        </div> <!-- .create-update_user-messages end -->
        
        <div class="buttons">
            <div>
                <div class="change_password">
                    <div id="show_password">Skift Kodeord</div>
                    <div id="hide_password">Skjul Formular</div>
                </div>
                <?php
                    // open this form when clicking .change_password button
                    include("includes/user/changepassword.inc.php");
                ?>
            </div>
            <div>
                <div class="new_user">
                    <div id="show_new_user">Opret Bruger</div>
                    <div id="hide_new_user">Skjul Formular</div>
                </div>
                <?php
                    // open this form when clicking .new_user button
                    include("includes/user/signup.inc.php");
                ?>
            </div>
        </div> <!-- .buttons end -->
    </div> <!-- .container end -->
</div> <!-- .create-update_user end -->