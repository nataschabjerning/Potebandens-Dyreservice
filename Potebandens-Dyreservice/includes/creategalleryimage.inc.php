<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "gallery-uploads/";
    
    if (isset($_POST["upload"])) {

        $image_link = basename($_FILES["file"]["name"]);
        $image_alt = $_POST["image_alt"];
        $image_text = $_POST["image_text"];
        
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
        // If text field has over 40 characters
        $maxAltLength = 250;
        if (strlen($image_alt) > $maxAltLength) {
            header("location: ../admin-gallery.php?error=alttoolong");
            exit();
        }
        // If text field has over 40 characters
        $maxTextLength = 40;
        if (strlen($image_text) > $maxTextLength) {
            header("location: ../admin-gallery.php?error=titletoolong");
            exit();
        }
        // if image file is selected
        if (!empty($_FILES["file"]["name"])) {
            $targetFilePath = $targetDir . $image_link;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            // if allowed file formats is selected
            if (in_array($fileType, $allowTypes)) {
                // Upload file to folder
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
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

<div id="insert-image">
    <form action="includes/creategalleryimage.inc.php" method="post" enctype="multipart/form-data">
        <h2>Tilføj Billede</h2>
        <p class="span"><span>*</span> SKAL udfyldes</p>
        <div class="addimageform">
            <div class="image_link">
                <label for="image-link">Vælg Fil <span>*</span></label>
                <div class="input">
                    <input type="file" name="file">
                </div>
            </div>
            <div class="bottom-fields">
                <div class="image_alt">
                    <label for="alt">Alt Tekst <span>*</span></label>
                    <div class="input">
                        <input type="text" name="image_alt" placeholder="Tekst hvis fil ikke kan vises">
                    </div>
                </div>
                <div class="image_text">
                    <label for="text">Titel</label>
                    <div class="image_text">
                        <input type="text" name="image_text" placeholder="Titel under fil">
                    </div>
                </div>
            </div>
        </div>
        <button name="upload">Tilføj Billede</button>
    </form>
</div>