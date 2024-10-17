<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM about;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block about">

    <div class="container">

        <h1>Hele Holdet</h1>

        <div class="about-blocks">

            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <section attr-about_id="<?php echo $row['id']; ?>">
                    <div class="me">
                        <?php if (!empty($row['about_image_link'])) { ?>
                            <div class="image" style="<?php if (!empty($row['about_image_link'])) { ?>background-image: url('includes/about-images/<?php echo $row['about_image_link']?>');<?php } ?>"></div>
                        <?php } ?>

                        <div class="intro">
                            <?php if (!empty($row['about_name'])) { ?>
                                <h1><?php echo $row['about_name']?></h1>
                            <?php } ?>
                            <?php if (!empty($row['about_work_title'])) { ?>
                                <h3><?php echo $row['about_work_title']?></h3>
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
                    </div>  <!-- .me end -->

                </section>
            <?php } ?>

        </div>  <!-- .about-blocks end -->

    </div> <!-- .container end -->

</div> <!-- .block .about end -->