<div class="block upload-about">
    <div class="container">

        <div class="upload-about-messages">
            <?php
                if (isset($_GET["error"])) {
                    // no file was selected to upload
                    if ($_GET["error"] == "aboutnofilewasselected") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Ingen billedfil er valgt. Vælg en fil og prøv igen</p>";
                        echo "</div>";
                    }
                    // name input field is empty
                    if ($_GET["error"] == "aboutemptyname") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Det ser ud som om du har glemt at indtaste et navn. Udfyld feltet 'Navn' og prøv igen..</p>";
                        echo "</div>";
                    }
                    // text field one is empty
                    if ($_GET["error"] == "aboutemptytextfield") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Det ser ud som om du har glemt at udfylde det første tekstfelt. Udfyld feltet og prøv igen..</p>";
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
                if (isset($_GET["aboutuploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to gallery when 'ok' is clicked
                    echo "alert('Bruger blok er tilføjet!');window.location.href = 'admin-about.php';";
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