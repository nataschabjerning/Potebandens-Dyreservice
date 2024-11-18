<?php
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    include("includes/connect.inc.php");

    $sql1 = "SELECT * FROM extraone;";
    $stmt1 = $conn->prepare($sql1);
    mysqli_stmt_execute($stmt1);
    $resultData1 = mysqli_stmt_get_result($stmt1);

    $sql2 = "SELECT * FROM extratwo;";
    $stmt2 = $conn->prepare($sql2);
    mysqli_stmt_execute($stmt2);
    $resultData2 = mysqli_stmt_get_result($stmt2);
?>

<div class="block admin-extra">
    <div class="container">

        <p class="update-info">Vil du opdatere en blok?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>

        <div class="extra-grid">

            <div class="admin-extraone">

                <h2 class="admin-titles">Ekstra Blok 1</h2>
                <p class="position">(<u>Over</u> slideshow af ydelser)</p>

                <?php while($row = mysqli_fetch_assoc($resultData1)) {

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

                    <section attr-extraone_id="<?php echo $row['id']; ?>">

                        <div class="admin-extraone-content">

                            <div class="extra_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div>
                            <div class="line extra-visibility">
                                <label>Skal blokken vises på forsiden?</label>
                                <div class="input">
                                    <select id="extra_visibility">
                                        <option value="<?php echo $row['extra_visibility']?>"><?php echo $row['extra_visibility']?></option>
                                        <option value="Ja">Ja</option>
                                        <option value="Nej">Nej</option>
                                    </select>
                                </div>
                            </div>
                            <div class="line extra-title">
                                <label>Titel</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['extra_title']?>" class="extra_title">
                                </div>
                            </div>
                            <div class="line extra-subtitle">
                                <label>Undertitel</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['extra_subtitle']?>" class="extra_subtitle">
                                </div>
                            </div>
                            <div class="line extra-text_one">
                                <label>Tekst 1</label>
                                <div class="input">
                                    <textarea name="extra_text_one" id="extra_text_one" placeholder="Tekst 1"><?php echo $row['extra_text_one']?></textarea>
                                </div>
                            </div>
                            <div class="line extra-text_two">
                                <label>Tekst 2</label>
                                <div class="input">
                                    <textarea name="extra_text_two" id="extra_text_two" placeholder="Tekst 2"><?php echo $row['extra_text_two']?></textarea>
                                </div>
                            </div>
                            <div class="line extra-text_three">
                                <label>Teskt 3</label>
                                <div class="input">
                                    <textarea name="extra_text_three" id="extra_text_three" placeholder="Tekst 3"><?php echo $row['extra_text_three']?></textarea>
                                </div>
                            </div>
                            <div class="line extra_link_div">
                                <div class="extra-text_link">
                                    <label>Tekst sammen med link</label>
                                    <div class="input">
                                        <input type="text" value="<?php echo $row['extra_text_link']?>" class="extra_text_link">
                                    </div>
                                </div>
                                <div class="extra-link_text">
                                    <label>Tekst der bliver til link</label>
                                    <div class="input">
                                        <input type="text" value="<?php echo $row['extra_link_text']?>" class="extra_link_text">
                                    </div>
                                </div>
                            </div>
                            <div class="line extra-link_url">
                                <label>Hvilken side skal linket føre hen til?</label>
                                <div class="input">
                                    <select id="extraone_link_url">
                                        <option value="<?php echo $row['extra_link_url']?>" selected>--- <?php echo $extraone_name; ?> ---</option>
                                        <option value="index.php">Forside</option>
                                        <option value="services.php">Ydelser</option>
                                        <option value="gallery.php">Galleri</option>
                                        <option value="about.php">Om Os</option>
                                        <option value="contact.php">Kontakt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="update-delete-buttons">
                                <div class="update-extraone">
                                    <button id="update-extraone">Opdatér</button>
                                </div>                                    
                                <div class="delete-extraone">
                                    <button id="delete-extraone">Slet</button>
                                </div>
                            </div>
                        </div> <!-- .contact-options end -->
                    </section>
                <?php } ?>
            </div> <!-- .contact-info end -->

            <div class="admin-extratwo">
                <h2 class="admin-titles">Ekstra Blok 2</h2>
                <p class="position">(<u>Under</u> slideshow af ydelser)</p>

                <?php while($row = mysqli_fetch_assoc($resultData2)) {

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
                            </div>
                            <div class="line extra-visibility">
                                <label>Skal blokken vises på forsiden?</label>
                                <div class="input">
                                    <select id="extra_visibility">
                                        <option value="<?php echo $row['extra_visibility']?>"><?php echo $row['extra_visibility']?></option>
                                        <option value="Ja">Ja</option>
                                        <option value="Nej">Nej</option>
                                    </select>
                                </div>
                            </div>
                            <div class="line extra-title">
                                <label>Titel</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['extra_title']?>" class="extra_title">
                                </div>
                            </div>
                            <div class="line extra-subtitle">
                                <label>Undertitel</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['extra_subtitle']?>" class="extra_subtitle">
                                </div>
                            </div>
                            <div class="line extra-text_one">
                                <label>Tekst 1</label>
                                <div class="input">
                                    <textarea name="extra_text_one" id="extra_text_one" placeholder="Tekst 1"><?php echo $row['extra_text_one']?></textarea>
                                </div>
                            </div>
                            <div class="line extra-text_two">
                                <label>Tekst 2</label>
                                <div class="input">
                                    <textarea name="extra_text_two" id="extra_text_two" placeholder="Tekst 2"><?php echo $row['extra_text_two']?></textarea>
                                </div>
                            </div>
                            <div class="line extra-text_three">
                                <label>Teskt 3</label>
                                <div class="input">
                                    <textarea name="extra_text_three" id="extra_text_three" placeholder="Tekst 3"><?php echo $row['extra_text_three']?></textarea>
                                </div>
                            </div>
                            <div class="line extra_link_div">
                                <div class="extra-text_link">
                                    <label>Tekst sammen med link</label>
                                    <div class="input">
                                        <input type="text" value="<?php echo $row['extra_text_link']?>" class="extra_text_link">
                                    </div>
                                </div>
                                <div class="extra-link_text">
                                    <label>Tekst der bliver til link</label>
                                    <div class="input">
                                        <input type="text" value="<?php echo $row['extra_link_text']?>" class="extra_link_text">
                                    </div>
                                </div>
                            </div>
                            <div class="line extra-link_url">
                                <label>Hvilken side skal linket føre hen til?</label>
                                <div class="input">
                                    <select id="extratwo_link_url">
                                        <option value="<?php echo $row['extra_link_url']?>" selected>--- <?php echo $extratwo_name; ?> ---</option>
                                        <option value="index.php">Forside</option>
                                        <option value="services.php">Ydelser</option>
                                        <option value="gallery.php">Galleri</option>
                                        <option value="about.php">Om Os</option>
                                        <option value="contact.php">Kontakt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="update-delete-buttons">
                                    <div class="update-extratwo">
                                        <button id="update-extratwo">Opdatér</button>
                                    </div>                                    
                                    <div class="delete-extratwo">
                                        <button id="delete-extratwo">Slet</button>
                                    </div>
                                </div>
                        </div>
                    </section>
                <?php } ?>
            </div> <!-- .contact-phone end -->
        </div> <!-- .contact-grid end -->
    </div> <!-- .container end -->
</div> <!-- .block-rules end -->