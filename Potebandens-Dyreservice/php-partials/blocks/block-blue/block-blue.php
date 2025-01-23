<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM blue;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block blue">
    
    <div class="branchtop"></div>
    
    <div class="extra-border">

        <div class="container">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="extra-content <?php echo $row['visibility']; ?>
                <?php if($row["visibility"] == "yes" || $row["visibility"] == "choose") { ?>
                    displayblock
                <?php }
                else { ?>
                    displaynone
                <?php } ?>">
                    <!-- if image is selected - show div as grid -->
                    <div class="<?php if(!empty($row["image"])) { ?>
                            extra-image-grid
                        <?php }
                        else { ?>
                            extra-image-nogrid
                        <?php } ?>"
                    >

                        <div class="extra-image" style="<?php if (!empty($row['image'])) { ?>border: 2px solid #565a4d;<?php } ?>">
                            <?php if (!empty($row['image'])) { ?>
                                <img src="includes/extra-images/<?php echo $row['image'] ?>" alt="potebandensdyreservice_<?php echo $row['image_alt'] ?>">
                            <?php } ?>
                        </div> <!-- .extra-image end -->

                        <div class="extra-text">
                            <!-- title -->
                            <?php if (!empty($row['title'])) { ?>
                                <h2><?php echo $row['title']; ?></h2>
                            <?php } ?>
                            <!-- subtitle -->
                            <?php if (!empty($row['subtitle'])) { ?>
                                <h3><?php echo $row['subtitle']; ?></h3>
                            <?php } ?>
                            <!-- text one -->
                            <?php if (!empty($row['text_one'])) { ?>
                                <p><?php echo $row['text_one']; ?></p>
                            <?php } ?>
                            <!-- text two -->
                            <?php if (!empty($row['text_two'])) { ?>
                                <p><?php echo $row['text_two']; ?></p>
                            <?php } ?>
                            <!-- text three -->
                            <?php if (!empty($row['text_three'])) { ?>
                                <p><?php echo $row['text_three']; ?></p>
                            <?php } ?>
                            <!-- link url -->
                            <?php if (!empty($row['link_url'])) { ?>
                                <a href="<?php echo $row['link_url']; ?>">
                                    <!-- link text -->
                                    <?php if (!empty($row['text_link'])) { ?>
                                        <?php echo $row['text_link']; ?>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                        </div> <!-- .extra-text end -->

                    </div> <!-- .extra-image-grid/.extra-image-nogrid end -->
                </div> <!-- .extra-content .displayblock/.displaynone end -->
            <?php } ?>
        </div> <!-- .container end -->
    </div> <!-- .extra-border end -->
</div> <!-- .block .index-block .extratwo end -->