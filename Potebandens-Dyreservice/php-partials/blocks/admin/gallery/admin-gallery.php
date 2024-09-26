<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM gallery;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block gallery">

    <div class="container">

        <div id="confirmation-image-delete">
            <div class="content">
                <h2>Er du sikker på, at du gerne vil slette dette billede?</h2>
                <div class="buttons">
                    <button class="confirm_image_delete">
                        <img src="../../../../Images/References/grønpotebtn.png" alt="">
                        <h4>Ja</h4>
                    </button>
                    <button class="cancel_image_delete">
                        <img src="../../../../Images/References/rødpotebtn.png" alt="">
                        <h4>Nej</h4>
                    </button>
                </div>
            </div>
        </div>

        <?php
            include("php-partials/blocks/admin/upload/upload.php");
        ?>

        <div class="images">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <section class="image-card" attr-image_id="<?php echo $row['id']; ?>">
                    <div class="image">
                        <img src="includes/gallery-uploads/<?php echo $row['image_link']?>" alt="<?php echo $row['image_alt']?>">
                    </div>
                    <?php if (!empty($row['image_text'])) { ?>
                        <div class="text">
                            <h3><?php echo $row['image_text']?></h3>
                        </div>
                    <?php } ?>
                    <div class="delete">
                        <button class="delete-image" name="delete-image">Slet Billede</button>
                    </div>
                </section>
            <?php } ?>
        </div>

    </div> <!-- .container end -->

</div> <!-- .block .about end -->