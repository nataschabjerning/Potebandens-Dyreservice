<?php
    // Include the database configuration file
    include_once 'connect.inc.php';

    // File upload directory
    $targetDir = "about-uploads/";
    
    if (isset($_POST["upload-about"])) {

        $about_image_link = basename($_FILES["about_file"]["name"]);
        $about_name = $_POST["about_name"];
        $about_text_one = $_POST["about_text_one"];
        $about_text_two = $_POST["about_text_two"];
        $about_text_three = $_POST["about_text_three"];
        $about_text_four = $_POST["about_text_four"];
        $about_text_five = $_POST["about_text_five"];
        $about_text_six = $_POST["about_text_six"];
        $about_text_seven = $_POST["about_text_seven"];
        
        // If name text field is empty
        if (empty($about_name)) {
            header("location: ../admin-about.php?error=aboutemptyname");
            exit();
        }
        // If text field one is empty
        if (empty($about_text_one)) {
            header("location: ../admin-about.php?error=aboutemptytextfield");
            exit();
        }

        // if image file is selected
        if (!empty($_FILES["about_file"]["name"])) {
            
            $targetFilePath = $targetDir . $about_image_link;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');

            // if allowed file formats is selected
            if (in_array($fileType, $allowTypes)) {
                // Upload file to folder
                if (move_uploaded_file($_FILES["about_file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $conn->query("INSERT INTO about (about_image_link, about_name, about_text_one, about_text_two, about_text_three, about_text_four, about_text_five, about_text_six, about_text_seven) VALUES ('".$about_image_link."', '".$about_name."', '".$about_text_one."', '".$about_text_two."', '".$about_text_three."', '".$about_text_four."', '".$about_text_five."', '".$about_text_six."', '".$about_text_seven."')");
                    // IF ALL CHECKS CLEAR
                    if ($insert) {
                        header("Location: ../admin-about.php?aboutuploaded");
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
            header("Location: ../admin-about.php?error=aboutnofilewasselected");
            exit();
        }
    }
?>

<div id="insert-about">
    <form action="includes/uploadabout.inc.php" method="post" enctype="multipart/form-data">
        <h2>Tilføj 'Om Mig' Boks</h2>
        <p><span>*</span> SKAL udfyldes</p>
        <div class="addaboutform">
                <div class="about_image_link">
                    <label for="link">Vælg Fil <span>*</span></label>
                    <div class="input">
                        <input type="file" name="about_file">
                    </div>
                </div>
            
            <div class="about_name">
                <label for="about_name">Navn <span>*</span></label>
                <div class="about_name">
                    <input type="text" name="about_name" placeholder="Natascha Bjerning">
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
        <button name="upload-about">Tilføj Boks</button>
    </form>
</div>