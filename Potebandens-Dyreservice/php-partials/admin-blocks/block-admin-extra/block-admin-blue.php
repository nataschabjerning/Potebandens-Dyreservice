<?php
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    include("includes/connect.inc.php");

    $sql = "SELECT * FROM blue;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block block-admin-blue">
    <div class="container">

        <div class="two">
            <div class="two-button">
                <h2 class="admin-titles">Blå Blokke</h2>
                <div class="admin_blue">
                    <div id="show_admin_blue">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div id="hide_admin_blue">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
            </div>
            <p class="blue-p"></p>

            <div class="admin-blue">
                <?php while($row = mysqli_fetch_assoc($resultData)) {

                    // set names of visibility options for easy read
                    $blue_visibility;
                    if ($row["visibility"] == "yes") {
                        $blue_visibility = "Ja";
                    }
                    else if ($row["visibility"] == "no") {
                        $blue_visibility = "Nej";
                    }
                    else {
                        // default
                        $blue_visibility = "Ja";
                    }

                    // set names of links for easy read
                    $blue_name;
                    if ($row["link_url"] == "index.php") {
                        $blue_name = "Forside";
                    } 
                    else if($row["link_url"] == "services.php") {
                        $blue_name = "Ydelser";
                    } 
                    else if($row["link_url"] == "gallery.php") {
                        $blue_name = "Galleri";
                    } 
                    else if($row["link_url"] == "about.php") {
                        $blue_name = "Om Os";
                    } 
                    else if ($row["link_url"] == "contact.php") {
                        $blue_name = "Kontakt";
                    } 
                    else {
                        $blue_name = "Intet URL valgt";
                    } ?>

                    <section attr-blue_id="<?php echo $row['id']; ?>">
                        <!-- hidden input to get image name (for deleting image from folder) -->
                        <input type="hidden" name="image_name" id="image_name" value="<?php echo $row['image']?>">
                        <div class="extra_id">
                            <h4>ID:</h4>
                            <h4><?php echo $row['id']?></h4>
                        </div> <!-- .id end -->
                        <div class="admin-blue-content">
                            <div class="extra-visibility">
                                <label>Skal blokken vises på forsiden?</label>
                                <div class="input">
                                    <select class="visibility">
                                        <option value="<?php echo $row["visibility"]; ?>" selected>--- <?php echo $blue_visibility; ?> ---</option>
                                        <option value="yes">Ja</option>
                                        <option value="no">Nej</option>
                                    </select>
                                </div>
                            </div> <!-- .extra-visibility end -->
                            <div class="blue-top">
                                <div class="blue-left">
                                    <div class="extra-image">
                                        <!-- if no image is set * -->
                                        <?php if (empty($row['image'])) { ?>
                                            <!-- * show label and display img -->
                                            <label class="label-noimg">Intet Billede</label>
                                            <img src="../../../../images/backgrounds/noimg.jpg" alt="potebandensdyreservice_noimg">
                                        <?php }
                                        // <!-- if image is set * -->
                                        else { ?>
                                            <!-- * show no label and display img -->
                                            <img src="includes/extra-images/<?php echo $row['image'] ?>" alt="potebandensdyreservice_<?php echo $row['image_alt'] ?>">
                                        <?php } ?>
                                    </div> <!-- .extra-image end -->
                                    <div class="extra-title">
                                        <label>Titel</label>
                                        <div class="input">
                                            <input type="text" value="<?php echo $row['title']?>" class="title">
                                        </div>
                                    </div> <!-- .extra-title end -->
                                    <div class="extra-subtitle">
                                        <label>Undertitel</label>
                                        <div class="input">
                                            <input type="text" value="<?php echo $row['subtitle']?>" class="subtitle">
                                        </div>
                                    </div> <!-- .extra-subtitle end -->
                                </div> <!-- .blue-left end -->
                                <div class="blue-right">
                                    <div class="extra-text_one">
                                        <label>Tekst 1</label>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="text_one" placeholder="Tekst 1"><?php echo $row['text_one']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_one end -->
                                    <div class="extra-text_two">
                                        <label>Tekst 2</label>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="text_two" placeholder="Tekst 2"><?php echo $row['text_two']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_two end -->
                                    <div class="extra-text_three">
                                        <label>Teskt 3</label>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="text_three" placeholder="Tekst 3"><?php echo $row['text_three']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_three end -->
                                </div> <!-- .blue-right end -->
                            </div> <!-- .blue-top end -->
                            <div class="blue-bottom">
                                <div class="extra-text_link">
                                    <label>Tekst der bliver til link</label>
                                    <div class="input">
                                        <input type="text" value="<?php echo $row['text_link']?>" class="text_link">
                                    </div>
                                </div> <!-- .extra-text_link end -->
                                <div class="extra-link_url">
                                    <label>Hvilken side skal linket føre hen til?</label>
                                    <div class="input">
                                        <select class="blue_link_url">
                                            <option value="<?php echo $row['link_url']?>" selected>--- <?php echo $blue_name; ?> ---</option>
                                            <option value="index.php">Forside</option>
                                            <option value="services.php">Ydelser</option>
                                            <option value="gallery.php">Galleri</option>
                                            <option value="about.php">Om Os</option>
                                            <option value="contact.php">Kontakt</option>
                                        </select>
                                    </div>
                                </div> <!-- .extra-link_url end -->
                            </div> <!-- .blue-bottom end -->
                            <div class="update-delete-buttons">
                                <div class="update-blue">
                                    <button id="update-blue">Opdatér</button>
                                </div>
                                <div class="delete-blue">
                                    <button id="delete-blue">Slet</button>
                                </div>
                            </div> <!-- .update-delete-buttons end -->
                        </div> <!-- .admin-blue-content end -->
                    </section>
                <?php } ?>
            </div> <!-- .admin-blue end -->
        </div> <!-- .two end -->
    </div> <!-- .container end -->
</div> <!-- .block .block-admin-blue end -->