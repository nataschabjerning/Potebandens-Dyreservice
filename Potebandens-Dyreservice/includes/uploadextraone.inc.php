<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "extraone-images/";
    
    if (isset($_POST["add-extraone"])) {

        $extra_image = basename($_FILES['extraone_image_file_form']['name']);
        $extra_image_alt = $_POST['extraone_image_alt_form'];
        $extra_title = $_POST['extraone_title_form'];
        $extra_subtitle = $_POST['extraone_subtitle_form'];
        $extra_text_one = $_POST['extraone_text_one_form'];
        $extra_text_two = $_POST['extraone_text_two_form'];
        $extra_text_three = $_POST['extraone_text_three_form'];
        $extra_text_link = $_POST['extraone_text_link_form'];
        $extra_link_text = $_POST['extraone_link_text_form'];
        $extra_link_url = $_POST['extraone_link_url_form'];
        
        // If 'alt' text field is empty
        if (!empty($extra_image) && empty($extra_image_alt)) {
            header("location: ../admin-index.php?error=altempty");
            exit();
        }
        // If 'alt' text field is empty
        if (empty($extra_title)) {
            header("location: ../admin-index.php?error=titleempty");
            exit();
        }
        // if image file is selected
        if (!empty($_FILES["extraone_image_file_form"]["name"])) {
            $targetFilePath = $targetDir . $extra_image;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            // if allowed file formats is selected
            if (in_array($fileType, $allowTypes)) {
                // Upload file to folder
                if (move_uploaded_file($_FILES["extraone_image_file_form"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $conn->query("INSERT INTO extraone (extra_image, extra_image_alt, extra_title, extra_subtitle, extra_text_one, extra_text_two, extra_text_three, extra_text_link, extra_link_text, extra_link_url) VALUES ('".$extra_image."', '".$extra_image_alt."', '".$extra_title."', '".$extra_subtitle."', '".$extra_text_one."', '".$extra_text_two."', '".$extra_text_three."', '".$extra_text_link."', '".$extra_link_text."', '".$extra_link_url."')");
                    // IF ALL CHECKS CLEAR
                    if ($insert) {
                        header("Location: ../admin-index.php?extraoneuploaded");
                        exit();
                    }
                    // if insert into database failed
                    else {
                        header("Location: ../admin-index.php?error=insertfailed");
                        exit();
                    }
                }
                // if uploading to folder failer
                else {
                    header("Location: ../admin-index.php?error=movingfilefailed");
                    exit();
                }
            }
            // if there is selected a not allowed file format
            else {
                header("Location: ../admin-index.php?error=wrongfiletype");
                exit();
            }
        }
    }
?>

<div id="new_extraone">
    <div class="new_extraone">

        <h2>Tilføj Ekstra Blok 1</h2>
        <p class="span"><span>*</span> SKAL udfyldes</p>

        <form action="includes/uploadextraone.inc.php" method="post" enctype="multipart/form-data">
            <div class="extra-image_file">
                <label>Billede</label>
                <div class="input">
                    <input type="file" class="extraone_image_file" name="extraone_image_file_form">
                </div>
            </div>
            <div class="extraone_image_alt">
                <label>Alt Tekst (påkrævet hvis billedefil er valgt)</label>
                <div class="input">
                    <input type="text" name="extraone_image_alt_form" placeholder="Tekst hvis fil ikke kan vises">
                </div>
            </div>
            <div class="extraone-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extraone_title" name="extraone_title_form">
                </div>
            </div>
            <div class="extraone-subtitle">
                <label>Undertitel</label>
                <div class="input">
                    <input type="text" class="extraone_subtitle" name="extraone_subtitle_form">
                </div>
            </div>
            <div class="extraone-text_one">
                <div class="input">
                    <input type="text" class="extraone_text_one" name="extraone_text_one_form" placeholder="Tekst 1">
                </div>
            </div>
            <div class="extraone-text_two">
                <div class="input">
                    <input type="text" class="extraone_text_two" name="extraone_text_two_form" placeholder="Tekst 2">
                </div>
            </div>
            <div class="extraone-text_three">
                <div class="input">
                    <input type="text" class="extraone_text_three" name="extraone_text_three_form" placeholder="Tekst 3">
                </div>
            </div>
            <div class="extraone-text_link">
                <label>Tekst sammen med link</label>
                <div class="input">
                    <input type="text" class="extraone_text_link" name="extraone_text_link_form">
                </div>
            </div>
            <div class="extraone-link_text">
                <label>Tekst der bliver til link</label>
                <div class="input">
                    <input type="text" name="extraone_link_text_form" placeholder="1-2 ord">
                </div>
            </div>
            <div class="extraone-link_url">
                <label>Titel</label>
                <div class="input">
                    <select name="extraone_link_url_form">
                        <option value="Vælg" disabled>--- Vælg ---</option>
                        <option value="index.php">Forside</option>
                        <option value="services.php">Ydelser</option>
                        <option value="gallery.php">Galleri</option>
                        <option value="about.php">Om Os</option>
                        <option value="contact.php">Kontakt</option>
                    </select>
                </div>
            </div>
            <div class="button">
            <button name="add-extraone">Tilføj Ekstra Blok 1</button>
        </div>
        </form>

        

    </div> <!-- .new_extraone end -->
</div> <!-- #new_extraone end -->