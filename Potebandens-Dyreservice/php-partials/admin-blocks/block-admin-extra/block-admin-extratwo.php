<?php
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    include("includes/connect.inc.php");

    $sql = "SELECT * FROM extratwo;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block block-admin-extratwo">
    <div class="container">

        <div class="two">
            <div class="two-button">
                <h2 class="admin-titles">Alle blokke <u>under</u> slideshow af ydelser</h2>
                <div class="admin_extratwo">
                    <div id="show_admin_extratwo">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div id="hide_admin_extratwo">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
            </div>

            <div class="admin-extratwo">
                <?php while($row = mysqli_fetch_assoc($resultData)) {

                    // set names of visibility options for easy read
                    $extratwo_visibility;
                    if ($row["extra_visibility"] == "yes") {
                        $extratwo_visibility = "Ja";
                    }
                    else if ($row["extra_visibility"] == "no") {
                        $extratwo_visibility = "Nej";
                    }
                    else {
                        // default
                        $extratwo_visibility = "Ja";
                    }

                    // set names of links for easy read
                    $extratwo_name;
                    if ($row["extra_link_url"] == "index.php") {
                        $extratwo_name = "Forside";
                    } 
                    else if($row["extra_link_url"] == "services.php") {
                        $extratwo_name = "Ydelser";
                    } 
                    else if($row["extra_link_url"] == "gallery.php") {
                        $extratwo_name = "Galleri";
                    } 
                    else if($row["extra_link_url"] == "about.php") {
                        $extratwo_name = "Om Os";
                    } 
                    else if ($row["extra_link_url"] == "contact.php") {
                        $extratwo_name = "Kontakt";
                    } 
                    else {
                        $extratwo_name = "Intet URL valgt";
                    } ?>

                    <section attr-extratwo_id="<?php echo $row['id']; ?>">
                        <div class="admin-extratwo-content">
                            <div class="extra_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div> <!-- .extra_id end -->
                            <div class="extra-visibility border-left border-right green-border-bottom">
                                <label>Skal blokken vises på forsiden?</label>
                                <div class="input border-left">
                                    <select class="extra_visibility">
                                        <option value="<?php echo $row["extra_visibility"]; ?>" selected>--- <?php echo $extratwo_visibility; ?> ---</option>
                                        <option value="yes">Ja</option>
                                        <option value="no">Nej</option>
                                    </select>
                                </div>
                            </div> <!-- .extra-visibility end -->
                            <div class="extratwo-top green-border-bottom">
                                <div class="extratwo-left border-left">
                                <div class="extra-image border-bottom padding-top" style="<?php if (!empty($row['extra_image'])) { ?>
                                        background-image: url('includes/extra-images/<?php echo $row['extra_image']?>');
                                    <?php }
                                    else { ?>
                                        background-image: url('../../../../Images/backgrounds/indexnoimg.jpg');
                                    <?php } ?>">
                                        <!-- if no image is set * -->
                                        <?php if (empty($row['extra_image'])) { ?>
                                            <!-- * show label -->
                                            <label class="label-noimg">Intet Billede</label>
                                        <?php }
                                        // <!-- if image is set * -->
                                        else { ?>
                                            <!-- * show no label -->
                                        <?php } ?>
                                    </div> <!-- .extra-image end -->
                                    <div class="extra-titles padding-top">
                                        <div class="extra-title border-bottom">
                                            <label>Titel</label>
                                            <div class="input">
                                                <input type="text" value="<?php echo $row['extra_title']?>" class="extra_title">
                                            </div>
                                        </div> <!-- .extra-title end -->
                                        <div class="extra-subtitle padding-top">
                                            <label>Undertitel</label>
                                            <div class="input">
                                                <input type="text" value="<?php echo $row['extra_subtitle']?>" class="extra_subtitle">
                                            </div>
                                        </div> <!-- .extra-subtitle end -->
                                    </div> <!-- .extra-titles end -->
                                </div> <!-- .extratwo-left end -->
                                <div class="extratwo-right border-black-left border-right">
                                    <div class="extra-text_one border-bottom padding-top">
                                        <label>Tekst 1</label>
                                        <div class="input">
                                            <textarea class="extra_text_one" placeholder="Tekst 1"><?php echo $row['extra_text_one']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_one end -->
                                    <div class="extra-text_two border-bottom padding-top">
                                        <label>Tekst 2</label>
                                        <div class="input">
                                            <textarea class="extra_text_two" placeholder="Tekst 2"><?php echo $row['extra_text_two']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_two end -->
                                    <div class="extra-text_three padding-top">
                                        <label>Teskt 3</label>
                                        <div class="input">
                                            <textarea class="extra_text_three" placeholder="Tekst 3"><?php echo $row['extra_text_three']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_three end -->
                                </div> <!-- .extratwo-right end -->
                            </div> <!-- .extratwo-top end -->
                            <div class="extratwo-bottom border-left border-right">
                                <div class="extra-text_link border-bottom">
                                    <label>Tekst der bliver til link</label>
                                    <div class="input border-left">
                                        <input type="text" value="<?php echo $row['extra_text_link']?>" class="extra_text_link">
                                    </div>
                                </div> <!-- .extra-text_link end -->
                                <div class="extra-link_url green-border-bottom">
                                    <label>Hvilken side skal linket føre hen til?</label>
                                    <div class="input border-left">
                                        <select class="extratwo_link_url">
                                            <option value="<?php echo $row['extra_link_url']?>" selected>--- <?php echo $extratwo_name; ?> ---</option>
                                            <option value="index.php">Forside</option>
                                            <option value="services.php">Ydelser</option>
                                            <option value="gallery.php">Galleri</option>
                                            <option value="about.php">Om Os</option>
                                            <option value="contact.php">Kontakt</option>
                                        </select>
                                    </div>
                                </div> <!-- .extra-link_url end -->
                            </div> <!-- .extratwo-bottom end -->
                            <div class="update-delete-buttons">
                                <div class="update-extratwo">
                                    <button id="update-extratwo">Opdatér</button>
                                </div>                                    
                                <div class="delete-extratwo">
                                    <button id="delete-extratwo">Slet</button>
                                </div>
                            </div> <!-- .update-delete-buttons end -->
                        </div> <!-- .admin-extratwo-content end -->
                    </section>
                <?php } ?>
            </div> <!-- .admin-extratwo end -->
        </div> <!-- .two end -->
    </div> <!-- .container end -->
</div> <!-- .block .block-admin-extratwo end -->