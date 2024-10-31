<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM gallery LIMIT 6;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block gallery-slider-block">
    <div class="container">
        
        <h2 class="admin-titles">Galleri</h2>

        <div class="top">
            <div class="title">
                <a href="gallery.php">Se alle billeder</a>
            </div>
            <div class="arrows">
                <button class="gallery-prev">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="gallery-next">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div> <!-- .top end -->

        <!-- if there is images in db table -->
        <?php if (mysqli_num_rows($result) > 0) { ?>

            <div class="gallery-slider">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="slide">
                        <div class="gallery-content">
                            <div class="image" style="<?php if (!empty($row['image_link'])) { ?> background-image: url('includes/gallery-uploads/<?php echo $row['image_link']?>'); <?php } ?>">
                            </div>
                        </div>
                    </div>
                <?php } ?> <!--  while() end -->
            </div> <!-- .gallery-slider end -->

        <?php } 
        else { ?>
            <!-- if no images in db table -->
            <div class="empty">
                <h2>Der ser ikke ud til at være nogle billeder i galleriet i øjeblikket</h2>
            </div>
        <?php } ?>
        
    </div> <!-- .container end -->
</div> <!-- .block .gallery-slider end -->