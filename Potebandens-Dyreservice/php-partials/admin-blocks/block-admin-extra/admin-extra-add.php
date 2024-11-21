<div class="block admin-extra-add">
    <div class="container">
        <h2 class="admin-titles">Oversigt over alle blokke på forsiden</h2>
        <div class="upload-extra-messages">
            <?php
                if (isset($_GET["error"])) {
                    // no file was selected to upload
                    if ($_GET["error"] == "onealtempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockextraone'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Der er ikke skrevet en 'alt' tekst til det valgte billede.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "twoaltempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockextratwo'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Der er ikke skrevet en 'alt' tekst til det valgte billede.</p>";
                        echo "</div>";
                    }
                    // no title input
                    if ($_GET["error"] == "onetitleempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockextraone'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Husk at skrive en titel.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "twotitleempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockextratwo'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Husk at skrive en titel.</p>";
                        echo "</div>";
                    }
                    // no title input
                    if ($_GET["error"] == "oneselectempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockextraone'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Husk at vælge om blokken skal være synlig på forsiden eller ej.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "twoselectempty") {
                        echo "<div class='error'>";
                        echo "<p class='blockextratwo'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Husk at vælge om blokken skal være synlig på forsiden eller ej.</p>";
                        echo "</div>";
                    }
                    // not matching the allowed file types
                    if ($_GET["error"] == "onewrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='blockextraone'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "twowrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='blockextratwo'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    // failed to move file to 'uploads' folder
                    if ($_GET["error"] == "onemovingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockextraone'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "twomovingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockextratwo'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til den valgte mappe. Prøv igen</p>";
                        echo "</div>";
                    }
                    // failed to insert into database
                    if ($_GET["error"] == "oneinsertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockextraone'>* Blok 1 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "twoinsertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='blockextratwo'>* Blok 2 *</p>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                }
                // if values was inserted successfully
                if (isset($_GET["extraoneuploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to admin index when 'ok' is clicked
                    echo "alert('Blok 1 er tilføjet!');window.location.href = 'admin-index.php';";
                    echo "</script>";
                }
                if (isset($_GET["extratwouploaded"])) {
                    echo "<script type='text/javascript'>";
                    // show alert box and redirect user to admin index when 'ok' is clicked
                    echo "alert('Blok 2 er tilføjet!');window.location.href = 'admin-index.php';";
                    echo "</script>";
                }
            ?>
        </div>

        <div class="buttons">
            <div class="one">
                <div class="add_extraone">
                    <div id="show_add_extraone">Tilføj Ekstra Blok 1</div>
                    <div id="hide_add_extraone">Skjul formular</div>
                </div>
                <?php
                    include("includes/uploadextraone.inc.php");
                ?>
            </div> <!-- .one end -->

            <div class="two">
                <div class="add_extratwo">
                    <div id="show_add_extratwo">Tilføj Ekstra Blok 2</div>
                    <div id="hide_add_extratwo">Skjul formular</div>
                </div>
                <?php
                    include("includes/uploadextratwo.inc.php");
                ?>
            </div> <!-- .two end -->
        </div>

    </div> <!-- .container end -->
</div> <!-- .admin-extra-add end -->