<?php
    include("includes/connect.inc.php");
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    $sql = "SELECT * FROM gallery;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block admin-gallery">
    <div class="container">

        <?php
            // add button and form to upload new photos to gallery
            include("php-partials/admin-blocks/block-admin-upload-image/block-admin-upload-image.php");
        ?>

        <h2 class="admin-titles">Alle billeder</h2>

        <div class="images">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>

                <section class="image-card" attr-image_id="<?php echo $row['id']; ?>">
                    <?php if (!empty($row['image_link'])) { ?>    
                        <div class="image">
                            <img src="includes/gallery-uploads/<?php echo $row['image_link']?>" alt="<?php echo $row['image_alt']?>">
                        </div>
                    <?php } ?>
                    <?php if (!empty($row['image_text'])) { ?>
                        <div class="text">
                            <h3><?php echo $row['image_text']?></h3>
                        </div>
                    <?php } ?>
                    <div class="delete-image">
                        <button id="delete-image">Slet Billede</button>
                    </div>
                </section>
                
            <?php } ?>
        </div> <!-- .images end -->

    </div> <!-- .container end -->
</div> <!-- .block .admin-gallery end -->