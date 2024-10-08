<div class="block upload-image">
    <div class="container">

        <div class="upload-image-messages">
            <?php
                if (isset($_GET["error"])) {
                    // no file was selected to upload
                    if ($_GET["error"] == "nofilewasselected") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Ingen fil er valgt. Vælg en fil og prøv igen</p>";
                        echo "</div>";
                    }
                    // no file was selected to upload
                    if ($_GET["error"] == "altempty") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der er ikke skrevet en 'alt' tekst. Husk at udfylde dette felt og prøv igen</p>";
                        echo "</div>";
                    }
                    // not matching the allowed file types
                    if ($_GET["error"] == "wrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    // failed to move file to 'uploads' folder
                    if ($_GET["error"] == "movingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</p>";
                        echo "</div>";
                    }
                    // failed to insert into database
                    if ($_GET["error"] == "insertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                    // failed to insert into database
                    if ($_GET["error"] == "imagealreadyuploaded") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Det ser ud til at billedet deler filnavn med et billede der allerede er uploaded</p>";
                        echo "<p class='caption'>- Omdøb billedfilen, eller tjek om billedet allerede er i galleriet</p>";
                        echo "</div>";
                    }
                }
                // if image was uploaded successfully
                if (isset($_GET["imageuploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to gallery when 'ok' is clicked
                    echo "alert('Billede er tilføjet!');window.location.href = 'admin-gallery.php';";
                    echo "</script>";
                }
            ?>
        </div>

        <hr>

        <div class="new_images">
            <div class="add_image">
                <div id="show_add_image">Tilføj Billede</div>
                <div id="hide_add_image">Skjul Formular</div>
            </div>

            <?php
                include("includes/uploadimage.inc.php");
            ?>
        </div>

    </div>
</div>