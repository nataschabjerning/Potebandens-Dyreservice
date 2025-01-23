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
                        <!-- hidden input to get image name (for deleting image from folder) -->
                        <input type="hidden" name="image_name" id="image_name" value="<?php echo $row['about_image_link']?>">
                        <div class="about_id">
                            <h4>ID: <?php echo $row['id']?></h4>
                        </div>
                        <div class="me">
                            <div class="me-left">
                                <div class="image">
                                    <!-- if no image is set * -->
                                    <?php if (empty($row['about_image_link'])) { ?>
                                        <!-- * show label and display img -->
                                        <label class="label-noimg">Intet Billede</label>
                                        <img src="../../../../images/backgrounds/noimg.jpg" alt="potebandensdyreservice_profilepic">
                                    <?php }
                                    // <!-- if image is set * -->
                                    else { ?>
                                        <!-- * show no label and display img -->
                                        <img src="includes/about-images/<?php echo $row['about_image_link'] ?>" alt="potebandensdyreservice_<?php echo $row['about_name'] ?>">
                                    <?php } ?>
                                </div>
                                <div class="about-name">
                                    <label>Navn</label>
                                    <input type="text" name="about_name" class="about_name" value="<?php echo $row['about_name']?>">
                                </div>
                                <div class="about-work_title">
                                    <label>Arbejdstitel</label>
                                    <input type="text" name="about_work_title" class="about_work_title" value="<?php echo $row['about_work_title']?>" placeholder="Arbejdstitel">
                                </div>
                                <div class="about-text_one">
                                    <label>Tekst 1</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_one" class="about_text_one" placeholder="Tekst 1"><?php echo $row['about_text_one']?></textarea>
                                    </div>
                                </div>
                                <div class="about-text_two">
                                    <label>Tekst 2</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_two" class="about_text_two" placeholder="Tekst 2"><?php echo $row['about_text_two']?></textarea>
                                    </div>
                                </div>
                            </div> <!-- .me-left end -->
                            <div class="me-right">
                                <div class="about-text_three">
                                    <label>Tekst 3</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_three" class="about_text_three" placeholder="Tekst 3"><?php echo $row['about_text_three']?></textarea>
                                    </div>
                                </div>
                                <div class="about-text_four">
                                    <label>Tekst 4</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_four" class="about_text_four" placeholder="Tekst 4"><?php echo $row['about_text_four']?></textarea>
                                    </div>
                                </div>
                                <div class="about-text_five">
                                    <label>Tekst 5</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_five" class="about_text_five" placeholder="Tekst 5"><?php echo $row['about_text_five']?></textarea>
                                    </div>
                                </div>
                                <div class="about-text_six">
                                    <label>Tekst 6</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_six" class="about_text_six" placeholder="Tekst 6"><?php echo $row['about_text_six']?></textarea>
                                    </div>
                                </div>
                                <div class="about-text_seven">
                                    <label>Tekst 7</label>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea name="about_text_seven" class="about_text_seven" placeholder="Tekst 7"><?php echo $row['about_text_seven']?></textarea>
                                    </div>
                                </div>
                            </div> <!-- .me-right end -->
                        </div> <!-- .me end -->
                        <div class="buttons">
                            <div class="update-about">
                                <button id="update-about">Opdatér</button>
                            </div>

                            <div class="delete-about">
                                <button id="delete-about">Slet</button>
                            </div>
                        </div>
                    </section>
                <?php }
            } ?>
        </div> <!-- .about-blocks end -->
    </div> <!-- .container end -->
</div> <!-- .block .admin-about end -->