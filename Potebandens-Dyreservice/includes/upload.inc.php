<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "uploads/";
    
    if (isset($_POST["upload"])) {
        
        $sql = "SELECT * FROM gallery;";
        $res = mysqli_query($conn,$sql);
        $res=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);



        if (!empty($_FILES["file"]["name"])) {
            $image_link = basename($_FILES["file"]["name"]);
            $image_alt = $_POST["image_alt"];
            $image_text = $_POST["image_text"];
            $targetFilePath = $targetDir . $image_link;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if($image_link == $row["image_link"]) {
                header("location: ../gallery.php?error=imagealreadyuploaded");
                exit();
            }
        
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $conn->query("INSERT INTO gallery (image_link, image_alt, image_text) VALUES ('".$image_link."', '".$image_alt."', '".$image_text."')");
                    if ($insert) {
                        header("Location: ../gallery.php?success=imageuploaded");
                        exit();
                    }
                    else {
                        header("Location: ../gallery.php?error=insertfailed");
                        exit();
                    }
                }
                else {
                    header("Location: ../gallery.php?error=movingfilefailed");
                    exit();
                }
            }
            else {
                header("Location: ../gallery.php?error=wrongfiletype");
                exit();
            }
        }
        else {
            header("Location: ../gallery.php?error=nofilewasselected");
            exit();
        }
    }
?>

<div id="insert-image">
    <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
        <h2>Tilføj Billede</h2>
        <p><span>*</span> SKAL udfyldes</p>
        <div class="addimageform">
            <div class="image_link">
                <label for="link">Vælg Fil <span>*</span></label>
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