<div class="block admin-extra-add">
    <div class="container">
        <h2 class="admin-titles">Oversigt over alle ekstra blokke på forsiden</h2>
        <div class="upload-extra-messages">
            <?php
                if (isset($_GET["error"])) {
                    // no file was selected to upload
                    if ($_GET["error"] == "whitealtempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockwhite'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Der er ikke skrevet en 'alt' tekst til det valgte billede.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "bluealtempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockblue'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Der er ikke skrevet en 'alt' tekst til det valgte billede.</p>";
                        echo "</div>";
                    }
                    // no title input
                    if ($_GET["error"] == "whitetitleempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockwhite'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Husk at skrive en titel.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "bluetitleempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockblue'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Husk at skrive en titel.</p>";
                        echo "</div>";
                    }
                    // no title input
                    if ($_GET["error"] == "whiteselectempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockwhite'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Husk at vælge om blokken skal være synlig på forsiden eller ej.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "blueselectempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockblue'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Husk at vælge om blokken skal være synlig på forsiden eller ej.</p>";
                        echo "</div>";
                    }
                    // not matching the allowed file types
                    if ($_GET["error"] == "whitewrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='blockwhite'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "bluewrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='blockblue'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    // failed to move file to 'uploads' folder
                    if ($_GET["error"] == "whitemovingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockwhite'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "bluemovingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockblue'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</p>";
                        echo "</div>";
                    }
                    // failed to insert into database
                    if ($_GET["error"] == "whiteinsertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockwhite'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "blueinsertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockblue'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                }
                // if values was inserted successfully
                if (isset($_GET["whiteuploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to admin index when 'ok' is clicked
                    echo "alert('Hvid blok er tilføjet!');window.location.href = 'admin-index.php';";
                    echo "</script>";
                }
                if (isset($_GET["blueuploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to admin index when 'ok' is clicked
                    echo "alert('Blå blok er tilføjet!');window.location.href = 'admin-index.php';";
                    echo "</script>";
                }
            ?>
        </div>

        <div class="buttons">
            <div class="admin-white-add">
                <div class="add_white">
                    <div id="show_add_white">Tilføj Hvid Blok</div>
                    <div id="hide_add_white">Skjul formular</div>
                </div>
                <?php
                    include("includes/uploadwhite.inc.php");
                ?>
            </div> <!-- .white end -->

            <div class="admin-blue-add">
                <div class="add_blue">
                    <div id="show_add_blue">Tilføj Blå Blok</div>
                    <div id="hide_add_blue">Skjul formular</div>
                </div>
                <?php
                    include("includes/uploadblue.inc.php");
                ?>
            </div> <!-- .blue end -->
        </div>

    </div> <!-- .container end -->
</div> <!-- .admin--add end -->