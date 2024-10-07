<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM about;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block admin-about">

    <div class="container">

        <div id="confirmation-about-delete">
            <div class="content">
                <h2>Er du sikker på, at du gerne vil slette info om denne person?</h2>
                <div class="buttons">
                    <button class="confirm_about_delete">
                        <img src="../../../../Images/References/grønpotebtn.png" alt="">
                        <h4>Ja</h4>
                    </button>
                    <button class="cancel_about_delete">
                        <img src="../../../../Images/References/rødpotebtn.png" alt="">
                        <h4>Nej</h4>
                    </button>
                </div>
            </div>
        </div>

        <div id="confirmation-about-update">
                <div class="content">
                    <h2>Er du sikker på, at du gerne vil opdatere denne ydelse?</h2>
                    <div class="buttons">
                        <button class="confirm_about_update">
                            <img src="../../../../Images/References/grønpotebtn.png" alt="">
                            <h4>Ja</h4>
                        </button>
                        <button class="cancel_about_update">
                            <img src="../../../../Images/References/rødpotebtn.png" alt="">
                            <h4>Nej</h4>
                        </button>
                    </div>
                </div>
            </div>

        <?php
            include("php-partials/admin-blocks/block-upload-about/block-upload-about.php");
        ?>

        <hr>

        <div class="about-blocks">

            <p class="update-about-info">Vil du opdatere info i en af boksene?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>


            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <section attr-about_id="<?php echo $row['id']; ?>">
                    <div class="me">
                        <?php if (!empty($row['id'])) { ?>
                            <div class="about_id">
                                <h4>ID: <?php echo $row['id']?></h4>
                            </div>
                        <?php } ?>

                        <?php if (!empty($row['about_image_link'])) { ?>
                            <div class="image">
                                <img src="includes/about-uploads/<?php echo $row['about_image_link']?>" alt="<?php echo $row['about_image_alt']?>">
                            </div>
                        <?php } ?>

                        <div class="intro">
                            <?php if (!empty($row['about_name'])) { ?>
                                <div class="about_name">
                                    <input type="text" name="about_name" id="about_name" value="<?php echo $row['about_name']?>">
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['about_text_one'])) { ?>
                                <div class="about_text_one">
                                    <textarea name="about_text_one" id="about_text_one"><?php echo $row['about_text_one']?></textarea>
                                </div>
                                
                            <?php } ?>
                            <?php if (!empty($row['about_text_two'])) { ?>
                                <div class="about_text_two">
                                    <textarea name="about_text_two" id="about_text_two"><?php echo $row['about_text_two']?></textarea>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['about_text_three'])) { ?>
                                <div class="about_text_three">
                                    <textarea name="about_text_three" id="about_text_three"><?php echo $row['about_text_three']?></textarea>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['about_text_four'])) { ?>
                                <div class="about_text_four">
                                    <textarea name="about_text_four" id="about_text_four"><?php echo $row['about_text_four']?></textarea>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['about_text_five'])) { ?>
                                <div class="about_text_five">
                                    <textarea name="about_text_five" id="about_text_five"><?php echo $row['about_text_five']?></textarea>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['about_text_six'])) { ?>
                                <div class="about_text_six">
                                    <textarea name="about_text_six" id="about_text_six"><?php echo $row['about_text_six']?></textarea>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['about_text_seven'])) { ?>
                                <div class="about_text_seven">
                                    <textarea name="about_text_seven" id="about_text_seven"><?php echo $row['about_text_seven']?></textarea>
                                </div>
                            <?php } ?>
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
            <?php } ?>

        </div> <!-- .about-blocks end -->
    
    </div> <!-- .container end -->

</div> <!-- .block .admin-about end -->