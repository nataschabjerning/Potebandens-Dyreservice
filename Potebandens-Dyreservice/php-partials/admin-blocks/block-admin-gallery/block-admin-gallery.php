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

        <div class="images">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>

                <section class="image-card" attr-image_id="<?php echo $row['id']; ?>">
                    <!-- hidden input to get image name (for deleting image from folder) -->
                    <input type="hidden" name="image_name" id="image_name" value="<?php echo $row['image_link']?>">
                    <?php if (!empty($row['image_link'])) { ?>    
                        <!-- IMAGE -->
                        <img src="includes/gallery-uploads/<?php echo $row['image_link'] ?>" alt="potebandensdyreservice_<?php echo $row['image_alt'] ?>">
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