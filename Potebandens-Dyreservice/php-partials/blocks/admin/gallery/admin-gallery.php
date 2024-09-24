<?php
    include("includes/connect.inc.php");

    // if delete is confirmed, delete from uploads folder too
    // if (isset($_POST['delete-image'])) {
    //     $image_link = $_POST['image_link'];
    //     if (!unlink($image_link)) {
    //         echo ("Error deleting $image_link");
    //     }
    //     else {
    //         echo ("Deleted $image_link");
    //     }
    // }

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
                    <button class="confirm_image_delete">Yes</button>
                    <button class="cancel_image_delete">No</button>
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
                        <img src="includes/uploads/<?php echo $row['image_link']?>" alt="<?php echo $row['image_alt']?>">
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