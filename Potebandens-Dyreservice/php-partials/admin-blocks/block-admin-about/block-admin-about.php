<?php
    include("includes/connect.inc.php");
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    $sql = "SELECT * FROM about;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block admin-about">
    <div class="container">

        <h2 class="admin-titles">'Om Mig' Blokke</h2>

        <?php
            // add button and form to upload new 'about' block
            include("php-partials/admin-blocks/block-admin-upload-about/block-admin-upload-about.php");
        ?>

        <div class="about-blocks">

            <p class="update-info">Vil du opdatere info i en af boksene?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>

            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <?php if (!empty($row['id'])) { ?>

                    <section attr-about_id="<?php echo $row['id']; ?>">
                        <div class="me">
                            <div class="about_id">
                                <h4>ID: <?php echo $row['id']?></h4>
                            </div>

                            <div class="image" style="<?php if (isset($row['about_image_link'])) { ?>background-image: url('includes/about-images/<?php echo $row['about_image_link']?>');<?php } ?>"></div>
                            
                            <div class="intro">
                                <div class="about_name">
                                    <input type="text" name="about_name" id="about_name" value="<?php echo $row['about_name']?>">
                                </div>
                                <div class="about_work_title">
                                    <input type="text" name="about_work_title" id="about_work_title" value="<?php echo $row['about_work_title']?>" placeholder="Arbejdstitel">
                                </div>
                                <div class="about_text_one">
                                    <textarea name="about_text_one" id="about_text_one" placeholder="Tekst 1"><?php echo $row['about_text_one']?></textarea>
                                </div>
                                
                                <div class="about_text_two">
                                    <textarea name="about_text_two" id="about_text_two" placeholder="Tekst 2"><?php echo $row['about_text_two']?></textarea>
                                </div>
                                <div class="about_text_three">
                                    <textarea name="about_text_three" id="about_text_three" placeholder="Tekst 3"><?php echo $row['about_text_three']?></textarea>
                                </div>
                                <div class="about_text_four">
                                    <textarea name="about_text_four" id="about_text_four" placeholder="Tekst 4"><?php echo $row['about_text_four']?></textarea>
                                </div>
                                <div class="about_text_five">
                                    <textarea name="about_text_five" id="about_text_five" placeholder="Tekst 5"><?php echo $row['about_text_five']?></textarea>
                                </div>
                                <div class="about_text_six">
                                    <textarea name="about_text_six" id="about_text_six" placeholder="Tekst 6"><?php echo $row['about_text_six']?></textarea>
                                </div>
                                <div class="about_text_seven">
                                    <textarea name="about_text_seven" id="about_text_seven" placeholder="Tekst 7"><?php echo $row['about_text_seven']?></textarea>
                                </div>
                            </div>

                            <div class="buttons">
                                <div class="update-about">
                                    <button id="update-about">Opdatér</button>
                                </div>

                                <div class="delete-about">
                                    <button id="delete-about">Slet</button>
                                </div>
                            </div>
                        </div> <!-- .me end -->
                    </section>

                <?php }
            } ?>
        </div> <!-- .about-blocks end -->
    </div> <!-- .container end -->
</div> <!-- .block .admin-about end -->