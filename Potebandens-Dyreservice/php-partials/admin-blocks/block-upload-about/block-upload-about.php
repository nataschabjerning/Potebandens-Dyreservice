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

            <div id="insert-about">
                <form action="includes/createabout.inc.php" method="post" enctype="multipart/form-data">
                    <h2>Tilføj 'Om Mig' Boks</h2>
                    <p class="span"><span>*</span> SKAL udfyldes</p>
                    
                    <div class="addaboutform">
                        
                        <div class="about_image_link">
                            <label for="link">Vælg Fil <span>*</span></label>
                            <div class="input">
                                <input type="file" name="about_file" id="about_image_link">
                            </div>
                        </div>
                        
                        <div class="about-top">
                            <div class="about_name">
                                <label for="about_name">Navn <span>*</span></label>
                                <div class="about_name">
                                    <input type="text" name="about_name" placeholder="Natascha Bjerning">
                                </div>
                            </div>
                            <div class="about_work_title">
                                <label for="about_work_title">Arbejdstitel</label>
                                <div class="about_work_title">
                                    <input type="text" name="about_work_title" placeholder="Udvikler">
                                </div>
                            </div>
                        </div>
                        
                        <div class="about_text_one">
                            <div class="about_text_one">
                                <p class="star">*</p>
                                <textarea name="about_text_one" id="about_text_one" placeholder="Tekstfelt 1"></textarea>
                            </div>
                        </div>

                        <div class="about-middle">
                            <div class="about_text_two">
                                <div class="about_text_two">
                                    <textarea name="about_text_two" id="about_text_two" placeholder="Tekstfelt 2"></textarea>
                                </div>
                            </div>
                            <div class="about_text_three">
                                <div class="about_text_three">
                                    <textarea name="about_text_three" id="about_text_three" placeholder="Tekstfelt 3"></textarea>
                                </div>
                            </div>
                            <div class="about_text_four">
                                <div class="about_text_four">
                                    <textarea name="about_text_four" id="about_text_four" placeholder="Tekstfelt 4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="about-bottom">
                            <div class="about_text_five">
                                <div class="about_text_five">
                                    <textarea name="about_text_five" id="about_text_five" placeholder="Tekstfelt 5"></textarea>
                                </div>
                            </div>
                            <div class="about_text_six">
                                <div class="about_text_six">
                                    <textarea name="about_text_six" id="about_text_six" placeholder="Tekstfelt 6"></textarea>
                                </div>
                            </div>
                            <div class="about_text_seven">
                                <div class="about_text_seven">
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