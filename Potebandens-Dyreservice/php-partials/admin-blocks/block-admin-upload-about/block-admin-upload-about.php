<div class="block upload-about">
    <div class="container">

        <div class="upload-about-messages">
            <?php
                if (isset($_GET["error"])) {
                    // required input fields are empty
                    if ($_GET["error"] == "aboutemptyinputs") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Det ser ud som om du har glemt at udfylde ét eller flere påkrævede felter. Udfyld alle felter med <b>*</b> og prøv igen.</p>";
                        echo "</div>";
                    }
                    // not matching the allowed file types
                    if ($_GET["error"] == "aboutwrongfiletype") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Du kan kun vælge .jpg, .jpeg, .png eller .gif filer.</p>";
                        echo "</div>";
                    }
                    // failed to insert into database
                    if ($_GET["error"] == "aboutinsertfailed") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der skete en fejl da dataen skulle indsættes i databasen. Prøv igen</p>";
                        echo "</div>";
                    }
                    if ($_GET["error"] == "aboutmovingfilefailed") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Der skete en fejl da filen skulle flyttes til mappen. Prøv igen</p>";
                        echo "</div>";
                    }
                    // if name has too many characters
                    if ($_GET["error"] == "aboutname") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i 'Navn' er for lang. Der kan maks skrives 100 tegn.</p>";
                        echo "</div>";
                    }
                    // if work title has too many characters
                    if ($_GET["error"] == "aboutworktitle") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i 'Arbejdstitel' er for lang. Der kan maks skrives 100 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 1 has too many characters
                    if ($_GET["error"] == "abouttext1") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 1 er for lang. Der kan maks skrives 250 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 2 has too many characters
                    if ($_GET["error"] == "abouttext2") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 2 er for lang. Der kan maks skrives 250 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 3 has too many characters
                    if ($_GET["error"] == "abouttext3") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 3 er for lang. Der kan maks skrives 250 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 4 has too many characters
                    if ($_GET["error"] == "abouttext4") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 4 er for lang. Der kan maks skrives 250 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 5 has too many characters
                    if ($_GET["error"] == "abouttext5") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 5 er for lang. Der kan maks skrives 250 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 6 has too many characters
                    if ($_GET["error"] == "abouttext6") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 6 er for lang. Der kan maks skrives 250 tegn.</p>";
                        echo "</div>";
                    }
                    // if textarea 7 has too many characters
                    if ($_GET["error"] == "abouttext7") {
                        echo "<div class='error'>";
                        echo "<p class='caption'>- Teksten i tekstfelt 7 er for lang. Der kan maks skrives 250 tegn.</p>";
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

        <div class="new_about">
            <div class="add_about">
                <div id="show_add_about">Tilføj 'Om mig' Blok</div>
                <div id="hide_add_about">Skjul Formular</div>
            </div>

            <div id="insert-about">
                <form action="includes/create/createabout.inc.php" method="post" enctype="multipart/form-data">
                    <h2>Tilføj 'Om Mig' Boks</h2>
                    <p class="span"><span>*</span> SKAL udfyldes</p>
                    
                    <div class="addaboutform">
                        
                        <div class="about_image_link">
                            <label>Vælg Fil</label>
                            <div class="input">
                                <input type="file" name="about_file" id="about_image_link">
                            </div>
                        </div>
                        
                        <div class="about-top">
                            <div class="about_name">
                                <label>Navn <span>*</span></label>
                                <div class="input about_name">
                                    <input type="text" name="about_name" placeholder="Natascha Bjerning">
                                </div>
                            </div>
                            <div class="about_work_title">
                                <label>Arbejdstitel</label>
                                <div class="input about_work_title">
                                    <input type="text" name="about_work_title" placeholder="Udvikler">
                                </div>
                            </div>
                        </div>
                        
                        <div class="about_text_one">
                            <label>Tekstfelter</label>
                            <p>Vil du dele tekst op i sektioner, kan du gøre det ved at skrive det i hvert sit tekstfelt. Som minimum skal første tekstfelt udfyldes.</p>
                            <div class="input about_text_one">
                                <div class="pull-tab"></div>
                                <p class="star">*</p>
                                <textarea name="about_text_one" id="about_text_one" placeholder="Tekstfelt 1"></textarea>
                            </div>
                        </div>

                        <div class="about-bottom">
                            <div class="about_text_two">
                                <div class="input about_text_two">
                                    <div class="pull-tab"></div>
                                    <textarea name="about_text_two" id="about_text_two" placeholder="Tekstfelt 2"></textarea>
                                </div>
                            </div>
                            <div class="about_text_three">
                                <div class="input about_text_three">
                                    <div class="pull-tab"></div>
                                    <textarea name="about_text_three" id="about_text_three" placeholder="Tekstfelt 3"></textarea>
                                </div>
                            </div>
                            <div class="about_text_four">
                                <div class="input about_text_four">
                                    <div class="pull-tab"></div>
                                    <textarea name="about_text_four" id="about_text_four" placeholder="Tekstfelt 4"></textarea>
                                </div>
                            </div>
                            <div class="about_text_five">
                                <div class="input about_text_five">
                                    <div class="pull-tab"></div>
                                    <textarea name="about_text_five" id="about_text_five" placeholder="Tekstfelt 5"></textarea>
                                </div>
                            </div>
                            <div class="about_text_six">
                                <div class="input about_text_six">
                                    <div class="pull-tab"></div>
                                    <textarea name="about_text_six" id="about_text_six" placeholder="Tekstfelt 6"></textarea>
                                </div>
                            </div>
                            <div class="about_text_seven">
                                <div class="input about_text_seven">
                                    <div class="pull-tab"></div>
                                    <textarea name="about_text_seven" id="about_text_seven" placeholder="Tekstfelt 7"></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="button">
                        <button id="upload-about">Tilføj Boks</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>