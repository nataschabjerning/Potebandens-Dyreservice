<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "about-uploads/";
    
    if (isset($_POST["upload-about"])) {

        $about_image_link = basename($_FILES["file"]["name"]);
        $about_image_alt = $_POST["about_image_alt"];
        $about_name = $_POST["about_name"];
        $about_text_one = $_POST["about_text_one"];
        $about_text_two = $_POST["about_text_two"];
        $about_text_three = $_POST["about_text_three"];
        $about_text_four = $_POST["about_text_four"];
        $about_text_five = $_POST["about_text_five"];
        $about_text_six = $_POST["about_text_six"];
        $about_text_seven = $_POST["about_text_seven"];
        
        // If 'alt' text field is empty
        if (empty($about_image_alt) || empty($about_name)) {
            header("location: ../admin-about.php?error=aboutaltempty");
            exit();
        }

        // if image file is selected
        if (!empty($_FILES["file"]["name"])) {
            $targetFilePath = $targetDir . $about_image_link;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            // if allowed file formats is selected
            if (in_array($fileType, $allowTypes)) {
                // Upload file to folder
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $conn->query("INSERT INTO about (about_image_link, about_image_alt, about_name, about_text_one, about_text_two, about_text_three, about_text_four, about_text_five, about_text_six, about_text_seven,) VALUES ('".$about_image_link."', '".$about_image_alt."', '".$about_name."', '".$about_text_one."', '".$about_text_two."', '".$about_text_three."', '".$about_text_four."', '".$about_text_five."', '".$about_text_six."', '".$about_text_seven."', )");
                    // IF ALL CHECKS CLEAR
                    if ($insert) {
                        header("Location: ../admin-about.php?aboutimageuploaded");
                        exit();
                    }
                    // if insert into database failed
                    else {
                        header("Location: ../admin-about.php?error=aboutinsertfailed");
                        exit();
                    }
                }
                // if uploading to folder failer
                else {
                    header("Location: ../admin-about.php?error=aboutmovingfilefailed");
                    exit();
                }
            }
            // if there is selected a not allowed file format
            else {
                header("Location: ../admin-about.php?error=aboutwrongfiletype");
                exit();
            }
        }
        // if no file was selected
        else {
            header("Location: ../admin-about_.php?error=about_nofilewasselected");
            exit();
        }
    }
?>

<div id="insert-image">
    <form action="includes/uploadabout.inc.php" method="post" enctype="multipart/form-data">
        <h2>Tilføj Billede</h2>
        <p><span>*</span> SKAL udfyldes</p>
        <div class="addimageform">
            <div class="image_link">
                <label for="link">Vælg Fil <span>*</span></label>
                <div class="input">
                    <input type="file" name="file">
                </div>
            </div>
            <div class="image_alt">
                <label for="alt">Alt Tekst <span>*</span></label>
                <div class="input">
                    <input type="text" name="image_alt" placeholder="Tekst hvis fil ikke kan vises">
                </div>
            </div>
            <div class="about_name">
                <label for="about_name">Navn</label>
                <div class="about_name">
                    <input type="text" name="about_name" placeholder="Natascha Bjerning">
                </div>
            </div>
            <div class="about_text_one">
                <label for="about_text_one">Navn</label>
                <div class="about_text_one">
                    <input type="text" name="about_text_one" placeholder="Tekstfelt 1">
                </div>
            </div>
            <div class="about_text_two">
                <label for="about_text_two">Navn</label>
                <div class="about_text_two">
                    <input type="text" name="about_text_two" placeholder="Tekstfelt 2">
                </div>
            </div>
            <div class="about_text_three">
                <label for="about_text_three">Navn</label>
                <div class="about_text_three">
                    <input type="text" name="about_text_three" placeholder="Tekstfelt 3">
                </div>
            </div>
            <div class="about_text_four">
                <label for="about_text_four">Navn</label>
                <div class="about_text_four">
                    <input type="text" name="about_text_four" placeholder="Tekstfelt 4">
                </div>
            </div>
            <div class="about_text_five">
                <label for="about_text_five">Navn</label>
                <div class="about_text_five">
                    <input type="text" name="about_text_five" placeholder="Tekstfelt 5">
                </div>
            </div>
            <div class="about_text_six">
                <label for="about_text_six">Navn</label>
                <div class="about_text_six">
                    <input type="text" name="about_text_six" placeholder="Tekstfelt 6">
                </div>
            </div>
            <div class="about_text_seven">
                <label for="about_text_seven">Navn</label>
                <div class="about_text_seven">
                    <input type="text" name="about_text_seven" placeholder="Tekstfelt 1">
                </div>
            </div>
        </div>
        <button name="upload-about">Tilføj</button>
    </form>
</div>