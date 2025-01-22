<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM gallery;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block gallery">
    <div class="container">
        <!-- if there is images in db table -->
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="images">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="image-card">
                        <?php if (!empty($row['image_link'])) { ?>    
                            <!-- IMAGE -->
                            <div class="image">
                                <img src="includes/gallery-uploads/<?php echo $row['image_link'] ?>" alt="potebandensdyreservice_<?php echo $row['image_alt'] ?>">
                            </div>
                        <?php } ?>
                        <?php if (!empty($row['image_text'])) { ?>
                            <!-- TEXT -->
                            <div class="text">
                                <h3><?php echo $row['image_text']?></h3>
                            </div> <!-- .text end -->
                        <?php } ?>
                    </div> <!-- .image-card end -->
                <?php } ?>
            </div> <!-- .images end -->
        <?php } 
        else { ?>
            <!-- if no images in db table -->
            <div class="empty">
                <h2>Der ser ikke ud til at være nogle billeder i galleriet i øjeblikket</h2>
            </div>
        <?php } ?>
    </div> <!-- .container end -->
</div> <!-- .block .about end -->