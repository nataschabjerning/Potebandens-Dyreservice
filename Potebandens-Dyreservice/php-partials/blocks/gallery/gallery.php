<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM gallery;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block gallery">

    <div class="container">

        <div class="images">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <div class="image-card">
                    <div class="image">
                        <img src="includes/uploads/<?php echo $row['image_link']?>" alt="<?php echo $row['image_alt']?>">
                    </div>   
                    <?php if (!empty($row['image_text'])) { ?>
                        <div class="text">
                            <h3><?php echo $row['image_text']?></h3>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div> <!-- .container end -->

</div> <!-- .block .about end -->