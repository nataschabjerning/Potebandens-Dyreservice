<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM gallery LIMIT 6;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block gallery-slider-block">

    <div class="container">

        <div class="top">
            <div class="title">
                <h3>Galleri</h3>
                <a href="gallery.php">Se alle</a>
            </div>
            <div class="arrows">
                <button class="gallery-prev"><i class="fa fa-chevron-left"></i></button>
                <button class="gallery-next"><i class="fa fa-chevron-right"></i></button>
            </div>
        </div> <!-- .top end -->

        <div class="gallery-slider">
            
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <div class="slide">
                    <div class="gallery-content">
                        <div class="image" style="<?php if (!empty($row['image_link'])) { ?> background-image: url('includes/gallery-uploads/<?php echo $row['image_link']?>'); <?php } ?>">
                        </div>
                    </div>
                </div>
            <?php } ?> <!--  while() end -->
            
        </div> <!-- .slider end -->

    </div> <!-- .container end -->

</div> <!-- .block .gallery-slider end -->