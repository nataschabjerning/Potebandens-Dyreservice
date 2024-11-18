<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "extratwo-images/";
    
    if (isset($_POST["add-extratwo"])) {

        $extra_image = basename($_FILES["extra_image"]["name"]);
        $image_alt = $_POST["image_alt"];
        
        $sql = mysqli_query($conn, "SELECT image_link FROM gallery WHERE image_link='$image_link'");

        // If file name already exists in database
        if (mysqli_num_rows($sql) > 0) {
            header("location: ../admin-gallery.php?error=imagealreadyuploaded");
            exit();
        }
        // If 'alt' text field is empty
        if (empty($image_alt)) {
            header("location: ../admin-gallery.php?error=altempty");
            exit();
        }
        // if image file is selected
        if (!empty($_FILES["extra_image"]["name"])) {
            $targetFilePath = $targetDir . $image_link;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            // if allowed file formats is selected
            if (in_array($fileType, $allowTypes)) {
                // Upload file to folder
                if (move_uploaded_file($_FILES["extra_image"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $conn->query("INSERT INTO gallery (image_link, image_alt, image_text) VALUES ('".$image_link."', '".$image_alt."', '".$image_text."')");
                    // IF ALL CHECKS CLEAR
                    if ($insert) {
                        header("Location: ../admin-gallery.php?imageuploaded");
                        exit();
                    }
                    // if insert into database failed
                    else {
                        header("Location: ../admin-gallery.php?error=insertfailed");
                        exit();
                    }
                }
                // if uploading to folder failer
                else {
                    header("Location: ../admin-gallery.php?error=movingfilefailed");
                    exit();
                }
            }
            // if there is selected a not allowed file format
            else {
                header("Location: ../admin-gallery.php?error=wrongfiletype");
                exit();
            }
        }
        // if no file was selected
        else {
            header("Location: ../admin-gallery.php?error=nofilewasselected");
            exit();
        }
    }
?>

<div id="new_extratwo">
    <div class="new_extratwo">

        <h2>Tilføj Ekstra Blok 2</h2>
        <p class="span"><span>*</span> SKAL udfyldes</p>

        <form action="includes/uploadextratwo.inc.php" method="post" enctype="multipart/form-data">
            <div class="extra-image">
                <label>Billede</label>
                <div class="input">
                    <input type="file" class="extra_image" name="extra_image">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
            <div class="extra-title">
                <label>Titel <span>*</span></label>
                <div class="input">
                    <input type="text" class="extra_title" name="extra_title">
                </div>
            </div>
        </form>

        <div class="button">
            <button name="add-extratwo">Tilføj Ekstra Blok 2</button>
        </div>

    </div> <!-- .new_extraone end -->
</div> <!-- #new_extraone end -->