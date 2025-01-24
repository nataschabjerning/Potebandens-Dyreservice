<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM gallery LIMIT 10;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block gallery-slider-block">

    <div class="pawprints-left">
        <div class="paw paw-print-1"></div>
        <div class="paw paw-print-2"></div>
        <div class="paw paw-print-3"></div>
        <div class="paw paw-print-4"></div>
        <div class="paw paw-print-5"></div>
        <div class="paw paw-print-6"></div>
        <div class="paw paw-print-7"></div>
        <div class="paw paw-print-8"></div>
        <div class="paw paw-print-9"></div>
        <div class="paw paw-print-10"></div>
        <div class="paw paw-print-11"></div>
        <div class="paw paw-print-12"></div>
        <div class="paw paw-print-13"></div>
        <div class="paw paw-print-14"></div>
        <div class="paw paw-print-15"></div>
    </div>
    <div class="pawprints-right">
        <div class="paw paw-print-16"></div>
        <div class="paw paw-print-17"></div>
        <div class="paw paw-print-18"></div>
        <div class="paw paw-print-19"></div>
        <div class="paw paw-print-20"></div>
        <div class="paw paw-print-21"></div>
        <div class="paw paw-print-22"></div>
        <div class="paw paw-print-23"></div>
        <div class="paw paw-print-24"></div>
        <div class="paw paw-print-25"></div>
        <div class="paw paw-print-26"></div>
        <div class="paw paw-print-27"></div>
        <div class="paw paw-print-28"></div>
        <div class="paw paw-print-29"></div>
        <div class="paw paw-print-30"></div>
        <div class="paw paw-print-31"></div>
    </div>



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
                            <div class="image">
                                <?php if (!empty($row['image_link'])) { ?>
                                    <img src="includes/gallery-uploads/<?php echo $row['image_link'] ?>" alt="potebandensdyreservice_<?php echo $row['image_alt'] ?>">
                                <?php } ?>
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