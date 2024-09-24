<div class="messages">
    <?php
        if (isset($_GET["error"])) {
            // no file was selected to upload
            if ($_GET["error"] == "nofilewasselected") {
                echo "<div class='error'>";
                echo "<h3>Tilføj Billede</h3>";
                echo "<h4>- Ingen fil er valgt. Vælg en fil og prøv igen</h4>";
                echo "</div>";
            }
            // not matching the allowed file types
            if ($_GET["error"] == "wrongfiletype") {
                echo "<div class='error'>";
                echo "<h3>Tilføj Billede</h3>";
                echo "<h4>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</h4>";
                echo "</div>";
            }
            // failed to move file to 'uploads' folder
            if ($_GET["error"] == "movingfilefailed") {
                echo "<div class='error'>";
                echo "<h3>Tilføj Billede</h3>";
                echo "<h4>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</h4>";
                echo "</div>";
            }
            // failed to insert into database
            if ($_GET["error"] == "insertfailed") {
                echo "<div class='error'>";
                echo "<h3>Tilføj Billede</h3>";
                echo "<h4>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</h4>";
                echo "</div>";
            }
        }
        // if image was uploaded successfully
        if (isset($_GET["success"])) {
            echo "<div class='success'>";
            echo "<h3>Billede er tilføjet!</h3>";
            echo "</div>";
        }
    ?>
</div>

<div class="new_images">
    <div class="add_image">
        <div id="show_add_image">Tilføj Billede</div>
        <div id="hide_add_image">Skjul Formular</div>
    </div>

    <?php
        include("includes/upload.inc.php");
    ?>
</div>