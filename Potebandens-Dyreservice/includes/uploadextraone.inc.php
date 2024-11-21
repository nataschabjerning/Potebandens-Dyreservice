<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "extra-images/";
    
    if (isset($_POST["add-extraone"])) {

        $extra_image = basename($_FILES['extraone_image_file_form']['name']);
        $extra_image_alt = $_POST['extraone_image_alt_form'];
        $extra_visibility = $_POST['extraone_visibility_form'];
        $extra_title = $_POST['extraone_title_form'];
        $extra_subtitle = $_POST['extraone_subtitle_form'];
        $extra_text_one = $_POST['extraone_text_one_form'];
        $extra_text_two = $_POST['extraone_text_two_form'];
        $extra_text_three = $_POST['extraone_text_three_form'];
        $extra_text_link = $_POST['extraone_text_link_form'];
        $extra_link_text = $_POST['extraone_link_text_form'];
        $extra_link_url = $_POST['extraone_link_url_form'];

        $targetFilePath = $targetDir . $extra_image;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        
        // If 'alt' text field is empty
        if (!empty($extra_image) && empty($extra_image_alt)) {
            header("location: ../admin-index.php?error=onealtempty");
            exit();
        }
        // If 'title' text field is empty
        if (empty($extra_title)) {
            header("location: ../admin-index.php?error=onetitleempty");
            exit();
        }
        // If select is empty
        if (empty($extra_visibility)) {
            header("location: ../admin-index.php?error=oneselectempty");
            exit();
        }
        // if image is chosen and allowed file formats is selected
        if (!empty($extra_image) && !in_array($fileType, $allowTypes)) {
            header("Location: ../admin-index.php?error=onewrongfiletype");
            exit();
        }
        // if image is chosen but moving file to folder failed
        if (!empty($extra_image) && !move_uploaded_file($_FILES["extraone_image_file_form"]["tmp_name"], $targetFilePath)) {
            
            header("Location: ../admin-index.php?error=onemovingfilefailed");
            exit();
        }

        // Insert all values into database (even if null)
        $insert = $conn->query("INSERT INTO extraone (extra_image, extra_image_alt, extra_visibility, extra_title, extra_subtitle, extra_text_one, extra_text_two, extra_text_three, extra_text_link, extra_link_text, extra_link_url) VALUES ('".$extra_image."', '".$extra_image_alt."', '".$extra_visibility."', '".$extra_title."', '".$extra_subtitle."', '".$extra_text_one."', '".$extra_text_two."', '".$extra_text_three."', '".$extra_text_link."', '".$extra_link_text."', '".$extra_link_url."')");

        // IF ALL CHECKS CLEAR
        if ($insert) {
            header("Location: ../admin-index.php?extraoneuploaded");
            exit();
        }
        // if insert into database failed
        else {
            header("Location: ../admin-index.php?error=oneinsertfailed");
            exit();
        }
    }
?>

<div id="new_extraone">
    <div class="new_extraone">

        <h2>Tilføj Ekstra Blok 1</h2>
        <p class="span"><span>*</span> SKAL udfyldes</p>
        <p class="position">(<u>Over</u> slideshow af ydelser)</p>

        <form action="includes/uploadextraone.inc.php" method="post" enctype="multipart/form-data">
            <div class="line extra-image_file">
                <label>Billede</label>
                <div class="input">
                    <input type="file" class="extraone_image_file" name="extraone_image_file_form">
                </div>
            </div> <!-- .extra-image_file end -->
            <div class="line extra-image_alt">
                <label>Alt Tekst (påkrævet hvis billedefil er valgt)</label>
                <div class="input">
                    <input type="text" name="extraone_image_alt_form" placeholder="Tekst hvis fil ikke kan vises">
                </div>
            </div> <!-- .extra-image_alt end -->
            <div class="line extra-visibility">
                <label>Skal blokken vises på forsiden? <span>*</span></label>
                <div class="input">
                    <select name="extraone_visibility_form">
                        <option value="choose" selected disabled>--- Vælg ---</option>
                        <option value="yes">Ja</option>
                        <option value="no">Nej</option>
                    </select>
                </div>
            </div> <!-- .extra-visibility end -->
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extraone_title" name="extraone_title_form">
                </div>
            </div> <!-- .extra-title end -->
            <div class="extra-subtitle">
                <label>Undertitel</label>
                <div class="input">
                    <input type="text" class="extraone_subtitle" name="extraone_subtitle_form">
                </div>
            </div> <!-- .extra-subtitle end -->
            <div class="extra-text_one">
                <div class="input">
                    <textarea name="extraone_text_one_form" placeholder="Tekst 1"></textarea>
                </div>
            </div> <!-- .extra-text_one end -->
            <div class="extra-text_two">
                <div class="input">
                    <textarea name="extraone_text_two_form" placeholder="Tekst 2"></textarea>
                </div>
            </div> <!-- .extra-text_two end -->
            <div class="extra-text_three">
                <div class="input">
                    <textarea name="extraone_text_three_form" placeholder="Tekst 3"></textarea>
                </div>
            </div> <!-- .extra-text_three end -->
            <div class="extra-text_link">
                <label>Tekst sammen med link</label>
                <div class="input">
                    <input type="text" class="extraone_text_link" name="extraone_text_link_form">
                </div>
            </div> <!-- .extra-text_link end -->
            <div class="extra-link_text">
                <label>Tekst der bliver til link</label>
                <div class="input">
                    <input type="text" name="extraone_link_text_form" placeholder="1-2 ord">
                </div>
            </div> <!-- .extra-link_text end -->
            <div class="extra-link_url">
                <label>Hvor skal linket føre hen?</label>
                <div class="input">
                    <select name="extraone_link_url_form">
                        <option value="Vælg" selected disabled>--- Vælg ---</option>
                        <option value="index.php">Forside</option>
                        <option value="services.php">Ydelser</option>
                        <option value="gallery.php">Galleri</option>
                        <option value="about.php">Om Os</option>
                        <option value="contact.php">Kontakt</option>
                    </select>
                </div>
            </div> <!-- .extra-link_url end -->
            <div class="button">
                <button name="add-extraone">Tilføj Ekstra Blok 1</button>
            </div>
        </form>
    </div> <!-- .new_extraone end -->
</div> <!-- #new_extraone end -->