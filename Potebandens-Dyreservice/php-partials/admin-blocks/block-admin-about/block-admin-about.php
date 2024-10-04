<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM about;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block admin-about">

    <div class="container">

        <h1>Måske lave det til et while() loop og gøre det muligt at rette i, ligesom ydelser og galleri</h1>

        <br>
        <br>
        <br>
    
        <div class="content">

            <div class="me">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                    <section class="about-me" attr-about_id="<?php echo $row['id']; ?>">
                        
                        <?php if (!empty($row['about_image_link'])) { ?>
                            <div class="image">
                                <img src="includes/about-uploads/<?php echo $row['about_image_link']?>" alt="<?php echo $row['about_image_alt']?>">
                            </div>
                        <?php } ?>

                        <div class="intro">
                            <?php if (!empty($row['about_name'])) { ?>
                                <h1><?php echo $row['about_name']?></h1>
                            <?php } ?>
                            <?php if (!empty($row['about_text_one'])) { ?>
                                <p class="one"><?php echo $row['about_text_one']?></p>
                            <?php } ?>
                            <?php if (!empty($row['about_text_two'])) { ?>
                                <p><?php echo $row['about_text_two']?></p>
                            <?php } ?>
                            <?php if (!empty($row['about_text_three'])) { ?>
                                <p><?php echo $row['about_text_three']?></p>
                            <?php } ?>
                            <?php if (!empty($row['about_text_four'])) { ?>
                                <p><?php echo $row['about_text_four']?></p>
                            <?php } ?>
                            <?php if (!empty($row['about_text_five'])) { ?>
                                <p><?php echo $row['about_text_five']?></p>
                            <?php } ?>
                            <?php if (!empty($row['about_text_six'])) { ?>
                                <p><?php echo $row['about_text_six']?></p>
                            <?php } ?>
                            <?php if (!empty($row['about_text_seven'])) { ?>
                                <p><?php echo $row['about_text_seven']?></p>
                            <?php } ?>
                        </div>

                        <div class="delete-about">
                            <button id="delete-about">Slet Billede</button>
                        </div>

                    </section>
                <?php } ?>
            </div>

        </div>
        

        <br>
        <br>
        <br>
        <hr>
        <br>
        <br>
        <br>

        <h1>Måske lave samme funktion her som i galleri, hvis billeder skal skiftes ud løbende</h1>
        
        <br>
        <br>
        <br>

        <div class="photos">
            <img src="" alt="">
        </div>

    </div> <!-- .container end -->

</div> <!-- .block .admin-about end -->