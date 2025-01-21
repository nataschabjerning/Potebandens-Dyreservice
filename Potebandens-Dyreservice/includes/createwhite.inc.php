<?php
    // Include the database configuration file
    include "connect.inc.php";

    // File upload directory
    $targetDir = "extra-images/";
    
    if (isset($_POST["add-white"])) {

        $image = basename($_FILES['white_image_file_form']['name']);
        $image_alt = $_POST['white_image_alt_form'];
        $visibility = $_POST['white_visibility_form'];
        $title = $_POST['white_title_form'];
        $subtitle = $_POST['white_subtitle_form'];
        $text_one = $_POST['white_text_one_form'];
        $text_two = $_POST['white_text_two_form'];
        $text_three = $_POST['white_text_three_form'];
        $text_link = $_POST['white_text_link_form'];
        $link_url = $_POST['white_link_url_form'];

        $targetFilePath = $targetDir . $image;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        
        // if string in textareas are too long
        if (strlen($title) > 100) {
            header("location: ../admin-index.php?error=whitetitle");
            exit();
        }
        if (strlen($subtitle) > 100) {
            header("location: ../admin-index.php?error=whitesubtitle");
            exit();
        }
        if (strlen($text_one) > 255) {
            header("location: ../admin-index.php?error=whitetextone");
            exit();
        }
        if (strlen($text_two) > 255) {
            header("location: ../admin-index.php?error=whitetexttwo");
            exit();
        }
        if (strlen($text_three) > 255) {
            header("location: ../admin-index.php?error=whitetextthree");
            exit();
        }
        if (strlen($text_link) > 100) {
            header("location: ../admin-index.php?error=whitelinktext");
            exit();
        }
        // If 'alt' text field is empty
        if (!empty($image) && empty($image_alt)) {
            header("location: ../admin-index.php?error=whitealtempty");
            exit();
        }
        // If 'title' text field is empty
        if (empty($title)) {
            header("location: ../admin-index.php?error=whitetitleempty");
            exit();
        }
        // If select is empty
        if (empty($visibility)) {
            header("location: ../admin-index.php?error=whiteselectempty");
            exit();
        }
        // if image is chosen and allowed file formats is selected
        if (!empty($image) && !in_array($fileType, $allowTypes)) {
            header("Location: ../admin-index.php?error=whitewrongfiletype");
            exit();
        }
        // if image is chosen but moving file to folder failed
        if (!empty($image) && !move_uploaded_file($_FILES["white_image_file_form"]["tmp_name"], $targetFilePath)) {
            
            header("Location: ../admin-index.php?error=whitemovingfilefailed");
            exit();
        }

        // Insert all values into database (even if null)
        $insert = $conn->query("INSERT INTO white (image, image_alt, visibility, title, subtitle, text_one, text_two, text_three, text_link, link_url) VALUES ('".$image."', '".$image_alt."', '".$visibility."', '".$title."', '".$subtitle."', '".$text_one."', '".$text_two."', '".$text_three."', '".$text_link."', '".$link_url."')");

        // IF ALL CHECKS CLEAR
        if ($insert) {
            header("Location: ../admin-index.php?whiteuploaded");
            exit();
        }
        // if insert into database failed
        else {
            header("Location: ../admin-index.php?error=whiteinsertfailed");
            exit();
        }
    }
?>

<div id="new_white">
    <div class="new_white">

        <h2>Tilføj Hvid Blok</h2>
        <p class="span"><span>*</span> SKAL udfyldes</p>
        <p class="position">(<u>Over</u> slideshow af ydelser)</p>

        <form action="includes/createwhite.inc.php" method="post" enctype="multipart/form-data">
            <div class="line extra-image_file">
                <label>Billede</label>
                <div class="input">
                    <input type="file" class="white_image_file" name="white_image_file_form">
                </div>
            </div> <!-- .extra-image_file end -->
            <div class="line extra-image_alt">
                <label>Alt Tekst ( <span>*</span> påkrævet hvis billedfil er valgt)</label>
                <div class="input">
                    <input type="text" name="white_image_alt_form" placeholder="Tekst hvis billede ikke kan vises">
                </div>
            </div> <!-- .extra-image_alt end -->
            <div class="line extra-visibility">
                <label>Skal blokken vises på forsiden? <span>*</span></label>
                <div class="input">
                    <select name="white_visibility_form">
                        <option value="choose" selected disabled>--- Vælg ---</option>
                        <option value="yes">Ja</option>
                        <option value="no">Nej</option>
                    </select>
                </div>
            </div> <!-- .extra-visibility end -->
            <div class="flex-titles">
                <div class="extra-title">
                    <label>Titel <span>*</span></label>
                    <div class="input">
                        <input type="text" class="white_title" name="white_title_form">
                    </div>
                </div> <!-- .extra-title end -->
                <div class="extra-subtitle">
                    <label>Undertitel</label>
                    <div class="input">
                        <input type="text" class="white_subtitle" name="white_subtitle_form">
                    </div>
                </div> <!-- .extra-subtitle end -->
            </div> <!-- .flex-titles end -->
            <div class="extra-text_one">
                <div class="input">
                    <div class="pull-tab"></div>
                    <textarea name="white_text_one_form" placeholder="Tekst 1"></textarea>
                </div>
            </div> <!-- .extra-text_one end -->
            <div class="extra-text_two">
                <div class="input">
                    <div class="pull-tab"></div>
                    <textarea name="white_text_two_form" placeholder="Tekst 2"></textarea>
                </div>
            </div> <!-- .extra-text_two end -->
            <div class="extra-text_three">
                <div class="input">
                    <div class="pull-tab"></div>
                    <textarea name="white_text_three_form" placeholder="Tekst 3"></textarea>
                </div>
            </div> <!-- .extra-text_three end -->
            <div class="flex-link">
                <div class="extra-text_link">
                    <label>Tekst der bliver til link</label>
                    <div class="input">
                        <input type="text" class="white_text_link" name="white_text_link_form">
                    </div>
                </div> <!-- .extra-text_link end -->
                <div class="extra-link_url">
                    <label>Hvor skal linket føre hen?</label>
                    <div class="input">
                        <select name="white_link_url_form">
                            <option value="Vælg" selected disabled>--- Vælg ---</option>
                            <option value="index.php">Forside</option>
                            <option value="services.php">Ydelser</option>
                            <option value="gallery.php">Galleri</option>
                            <option value="about.php">Om Os</option>
                            <option value="contact.php">Kontakt</option>
                        </select>
                    </div>
                </div> <!-- .extra-link_url end -->
            </div> <!-- .flex-link end -->
            <div class="button">
                <button name="add-white">Tilføj Blok</button>
            </div>
        </form>
    </div> <!-- .new_white end -->
</div> <!-- #new_white end -->