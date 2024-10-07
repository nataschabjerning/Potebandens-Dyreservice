<div class="block upload-about">
    <div class="container">

        <div class="upload-about-messages">
            <?php
                if (isset($_GET["error"])) {
                    // no file was selected to upload
                    if ($_GET["error"] == "nofilewasselected") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Ingen fil er valgt. Vælg en fil og prøv igen</p>";
                        echo "</div>";
                    }
                    // no file was selected to upload
                    if ($_GET["error"] == "aboutemptyinput") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Et eller flere påkrævede felter er ikke udfyldt. Udfyld alle felter og prøv igen.</p>";
                        echo "</div>";
                    }
                    // not matching the allowed file types
                    if ($_GET["error"] == "aboutwrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    // failed to move file to 'uploads' folder
                    if ($_GET["error"] == "aboutmovingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</p>";
                        echo "</div>";
                    }
                    // failed to insert into database
                    if ($_GET["error"] == "aboutinsertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                }
                // if image was uploaded successfully
                if (isset($_GET["aboutimageuploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to gallery when 'ok' is clicked
                    echo "alert('Bruger sektion er tilføjet!');window.location.href = 'admin-about.php';";
                    echo "</script>";
                }
            ?>
        </div>

        <hr>

        <div class="new_about">
            <div class="add_about">
                <div id="show_add_about">Tilføj 'Om mig' Blok</div>
                <div id="hide_add_about">Skjul Formular</div>
            </div>

            <?php
                include("includes/uploadabout.inc.php");
            ?>
        </div>

    </div>
</div>