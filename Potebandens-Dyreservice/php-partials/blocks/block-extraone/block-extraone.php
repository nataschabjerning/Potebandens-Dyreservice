<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM extraone;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block index-block extraone">
    
    <div class="extra-border">
        <div class="extra-border-inner">

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="container <?php echo $row['extra_visibility']; ?>
                    <?php if($row["extra_visibility"] == "yes" || $row["extra_visibility"] == "choose") { ?>
                        displayblock
                    <?php }
                    else { ?>
                        displaynone
                    <?php } ?>">

                    <div class="flowerleft"></div>
                    <div class="flowerright"></div>

                    <div class="extra-content">

                        <div class="<?php if(!empty($row["extra_image"])) { ?>
                                extra-image-grid
                            <?php }
                            else { ?>
                                extra-image-nogrid
                            <?php } ?>"
                        >
                            <div class="extra-text">
                                <?php if (!empty($row['extra_title'])) { ?>
                                    <h2><?php echo $row['extra_title']; ?></h2>
                                <?php } ?>
                                <?php if (!empty($row['extra_subtitle'])) { ?>
                                    <h3><?php echo $row['extra_subtitle']; ?></h3>
                                <?php } ?>
                                <?php if (!empty($row['extra_text_one'])) { ?>
                                    <p><?php echo $row['extra_text_one']; ?></p>
                                <?php } ?>
                                <?php if (!empty($row['extra_text_two'])) { ?>
                                    <p><?php echo $row['extra_text_two']; ?></p>
                                <?php } ?>
                                <?php if (!empty($row['extra_text_three'])) { ?>
                                    <p><?php echo $row['extra_text_three']; ?></p>
                                <?php } ?>
                                <?php if (!empty($row['extra_link_url'])) { ?>
                                    <a href="<?php echo $row['extra_link_url']; ?>">
                                        <?php if (!empty($row['extra_text_link'])) { ?>
                                            <?php echo $row['extra_text_link']; ?>
                                        <?php } ?>
                                    </a>
                                <?php } ?>
                            </div> <!-- .extra-text end -->

                            <div class="extra-image" style="<?php if (!empty($row['extra_image'])) { ?>background-image: url('includes/extra-images/<?php echo $row['extra_image']?>'); border: 2px solid #565a4d;<?php } ?>"></div> <!-- .extra-image end -->
                        </div> <!-- .extra-image-grid/.extra-image-nogrid end -->
                    </div> <!-- .extra-content end -->
                </div> <!-- .container .displayblock/.displaynone end -->
            <?php } ?>
        </div> <!-- .block .extra-border-inner end -->
    </div>  <!-- .block .extra-border end -->
</div> <!-- .block .index-block .extraone end -->