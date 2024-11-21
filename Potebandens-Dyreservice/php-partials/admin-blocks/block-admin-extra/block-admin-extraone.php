<?php
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    include("includes/connect.inc.php");

    $sql = "SELECT * FROM extraone;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block block-admin-extraone">
    <div class="container">
        <p class="update-info">Vil du opdatere en blok?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>
        <div class="one">
            <div class="one-button">
                <h4 class="position">Alle blokke <u>over</u> slideshow af ydelser</h4>
                <div class="admin_extraone">
                    <div id="show_admin_extraone">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div id="hide_admin_extraone">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
            </div>

            <div class="admin-extraone">
                <?php while($row = mysqli_fetch_assoc($resultData)) {

                    // set names of visibility options for easy read
                    $extraone_visibility;
                    if ($row["extra_visibility"] == "yes") {
                        $extraone_visibility = "Ja";
                    }
                    else if ($row["extra_visibility"] == "no") {
                        $extraone_visibility = "Nej";
                    }
                    else {
                        // default
                        $extraone_visibility = "Ja";
                    }

                    // set names of links for easy read
                    $extraone_name;
                    if ($row["extra_link_url"] == "index.php") {
                        $extraone_name = "Forside";
                    } 
                    else if($row["extra_link_url"] == "services.php") {
                        $extraone_name = "Ydelser";
                    } 
                    else if($row["extra_link_url"] == "gallery.php") {
                        $extraone_name = "Galleri";
                    } 
                    else if($row["extra_link_url"] == "about.php") {
                        $extraone_name = "Om Os";
                    } 
                    else if ($row["extra_link_url"] == "contact.php") {
                        $extraone_name = "Kontakt";
                    }
                    else {
                        $extraone_name = "Intet URL valgt";
                    } ?>

                    <!-- SET NEW DIVS AND CLASSES ON extratwo -->

                    <section attr-extraone_id="<?php echo $row['id']; ?>">
                        <div class="admin-extraone-content">
                            <div class="extra_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div> <!-- .extra_id end -->
                            <div class="extra-visibility border-left border-right green-border-bottom">
                                <label>Skal blokken vises på forsiden?</label>
                                <div class="input">
                                    <select class="extra_visibility">
                                        <option value="<?php echo $row["extra_visibility"]; ?>" selected>--- <?php echo $extraone_visibility; ?> ---</option>
                                        <option value="yes">Ja</option>
                                        <option value="no">Nej</option>
                                    </select>
                                </div>
                            </div> <!-- .extra-visibility end -->
                            <div class="extraone-top green-border-bottom">
                                <div class="extraone-left">
                                    <div class="extra-image">
                                        <div class="input">
                                            <?php if (!empty($row['extra_image'])) { ?>
                                                <img src="includes/extra-images/<?php echo $row['extra_image']; ?>">
                                            <?php }
                                            else {
                                                echo "Intet billede";
                                            }?>
                                        </div>
                                    </div> <!-- .extra-image end -->
                                    <div class="extra-titles border-left padding-top">
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
                                </div> <!-- .extraone-left end -->
                                <div class="extraone-right">
                                    <div class="extra-text_one border-bottom border-right padding-top">
                                        <label>Tekst 1</label>
                                        <div class="input">
                                            <textarea class="extra_text_one" placeholder="Tekst 1"><?php echo $row['extra_text_one']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_one end -->
                                    <div class="extra-text_two border-right border-bottom padding-top">
                                        <label>Tekst 2</label>
                                        <div class="input">
                                            <textarea class="extra_text_two" placeholder="Tekst 2"><?php echo $row['extra_text_two']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_two end -->
                                    <div class="extra-text_three border-right padding-top">
                                        <label>Teskt 3</label>
                                        <div class="input">
                                            <textarea class="extra_text_three" placeholder="Tekst 3"><?php echo $row['extra_text_three']?></textarea>
                                        </div>
                                    </div> <!-- .extra-text_three end -->
                                </div> <!-- .extraone-right end -->
                            </div> <!-- .extraone-top end -->
                            <div class="extraone-bottom border-left border-right">
                                <div class="extra_link_div padding-top green-border-bottom">
                                    <div class="extra-text_link border-right">
                                        <label>Tekst sammen med link</label>
                                        <div class="input">
                                            <input type="text" value="<?php echo $row['extra_text_link']?>" class="extra_text_link">
                                        </div>
                                    </div> <!-- .extra-text_link end -->
                                    <div class="extra-link_text">
                                        <label>Tekst der bliver til link</label>
                                        <div class="input">
                                            <input type="text" value="<?php echo $row['extra_link_text']?>" class="extra_link_text">
                                        </div>
                                    </div> <!-- .extra-link_text end -->
                                </div> <!-- .extra_link_div end -->
                                <div class="extra-link_url green-border-bottom">
                                    <label>Hvilken side skal linket føre hen til?</label>
                                    <div class="input">
                                        <select class="extraone_link_url">
                                            <option value="<?php echo $row['extra_link_url']?>" selected>--- <?php echo $extraone_name; ?> ---</option>
                                            <option value="index.php">Forside</option>
                                            <option value="services.php">Ydelser</option>
                                            <option value="gallery.php">Galleri</option>
                                            <option value="about.php">Om Os</option>
                                            <option value="contact.php">Kontakt</option>
                                        </select>
                                    </div>
                                </div> <!-- .extra-link_url end -->
                            </div> <!-- .extraone-bottom end -->
                            <div class="update-delete-buttons">
                                <div class="update-extraone">
                                    <button id="update-extraone">Opdatér</button>
                                </div>                                    
                                <div class="delete-extraone">
                                    <button id="delete-extraone">Slet</button>
                                </div>
                            </div> <!-- .update-delete-buttons end -->
                        </div> <!-- .admin-extraone-content end -->
                    </section>
                <?php } ?>
            </div> <!-- .block .admin-extraone end -->
        </div> <!-- .one end -->
    </div> <!-- .container end -->
</div> <!-- .block .block-admin-extraone end -->