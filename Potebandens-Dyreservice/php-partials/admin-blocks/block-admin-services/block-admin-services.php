<div class="block admin-services">
    <div class="container">
        <div class="all-services">

            <?php
                include("php-partials/components/confirmation/confirm-update/confirm-update.php");
                include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");
                include("includes/connect.inc.php");

                $sql = "SELECT * FROM services ORDER BY id DESC;";
                $stmt = $conn->prepare($sql);
                mysqli_stmt_execute($stmt);
                $resultData = mysqli_stmt_get_result($stmt);
            ?>

            <h2 class="admin-titles">Oversigt over alle ydelser</h2>

            <div class="form">

                <div class="add_service">
                    <div id="show_add_form">Tilføj Ydelse</div>
                    <div id="hide_add_form">Skjul formular</div>
                </div>

                <div id="new_service">
                    <div class="new_service">
                        <h2>Tilføj Ydelse</h2>
                        <p class="span"><span>*</span> SKAL udfyldes</p>
                        <form method="post">
                            <div class="top">
                                <div class="name">
                                    <label>Ydelsens Navn <span>*</span></label>
                                    <div class="input">
                                        <input type="text" class="service_name" name="service_name">
                                    </div>
                                </div> <!-- .name end -->
                                <div class="short_description">
                                    <label>Kort Beskrivelse</label>
                                    <div class="input">
                                        <textarea name="service_short_description" id="service_short_description" placeholder="En kort tekst til visning på forsiden"></textarea>
                                    </div>
                                </div> <!-- .short_description end -->
                                <div class="notes">
                                    <label>Vigtige Noter</label>
                                    <div class="input">
                                        <textarea name="important_note" id="important_note" placeholder="Regler, priser, info el. lign. (Denne tekst bliver vist under alle tekstfelter)"></textarea>
                                    </div>
                                </div> <!-- .notes end -->
                            </div> <!-- .top end -->
                            <p class="descriptions-p">Vil du dele tekst op i sektioner, kan du gøre det ved at skrive det i hvert sit tekstfelt. Som minimum skal første tekstfelt udfyldes.</p>
                            <div class="descriptions">
                                <div class="input service_description">
                                    <p class="star">*</p>
                                    <div class="pull-tab"></div>
                                    <textarea name="service_description_one" id="service_description_one" placeholder="Tekstfelt 1 (max 250 tegn)"></textarea>
                                </div>
                                <div class="input">
                                    <div class="pull-tab"></div>
                                    <textarea name="service_description_two" id="service_description_two" placeholder="Tekstfelt 2 (max 250 tegn)"></textarea>
                                </div>
                                <div class="input">
                                    <div class="pull-tab"></div>
                                    <textarea name="service_description_three" id="service_description_three" placeholder="Tekstfelt 3 (max 250 tegn)"></textarea>
                                </div>
                                <div class="input">
                                    <div class="pull-tab"></div>
                                    <textarea name="service_description_four" id="service_description_four" placeholder="Tekstfelt 4 (max 250 tegn)"></textarea>
                                </div>
                            </div> <!-- .descriptions end -->
                        </form>
                        <div class="button">
                            <button id="create-service">Tilføj ydelse</button>
                        </div>
                    </div> <!-- .new_service end -->
                </div> <!-- #new_service end -->
            </div> <!-- .form end -->

            <div class="table">
                <p class="update-info">Vil du opdatere en ydelse?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>

                <div class="display-service">
                    <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                        <section attr-service_id="<?php echo $row['id']; ?>">
                            <div class="service-id">
                                <h4>ID: <?php echo $row['id']?></h4>
                            </div>
                            <div class="textareas">
                                <div class="textareas-top">
                                    <div class="service-name">
                                        <h4>Ydelsens Navn</h4>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea name="service_name" class="service_name"><?php echo $row['service_name']?></textarea>
                                        </div>
                                    </div> <!-- .service-name end -->
                                    <div class="important-note">
                                        <h4>Vigtig Note</h4>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea name="important_note" class="important_note"><?php echo $row['important_note']?></textarea>
                                        </div>
                                    </div> <!-- .important-note end -->
                                </div> <!-- .textareas-top end -->
                                <div class="service-short_description">
                                    <h4>Kort beskrivelse</h4>
                                    <div class="input">
                                        <div class="pull-tab"></div>
                                        <textarea  name="service_short_description" class="service_short_description"><?php echo $row['service_short_description']?></textarea>
                                    </div>
                                </div> <!-- .service-short_description end -->
                                <div class="textareas-bottom">
                                    <div class="service-description_one">
                                        <h4>Tekstfelt 1</h4>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea name="service_description_one" class="service_description_one"><?php echo $row['service_description_one']?></textarea>
                                        </div>
                                    </div> <!-- .service-description_one end -->
                                    <div class="service-description_two">
                                        <h4>Tekstfelt 2</h4>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea name="service_description_two" class="service_description_two"><?php echo $row['service_description_two']?></textarea>
                                        </div>
                                    </div> <!-- .service-description_two end -->
                                    <div class="service-description_three">
                                        <h4>Tekstfelt 3</h4>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea name="service_description_three" class="service_description_three"><?php echo $row['service_description_three']?></textarea>
                                        </div>
                                    </div> <!-- .service-description_three end -->
                                    <div class="service-description_four">
                                        <h4>Tekstfelt 4</h4>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea name="service_description_four" class="service_description_four"><?php echo $row['service_description_four']?></textarea>
                                        </div>
                                    </div> <!-- .service-description_four end -->
                                </div> <!-- .textareas-bottom end -->
                                <div class="buttons">
                                    <div class="update-service">
                                        <button id="update-service">Opdatér</button>
                                    </div>                                    
                                    <div class="delete-service">
                                        <button id="delete-service">Slet</button>
                                    </div>
                                </div>
                            </div> <!-- .textareas end -->
                        </section>
                    <?php } ?>
                </div> <!-- .display-service end -->
            </div> <!-- .table end -->
        </div> <!-- .all-services end -->
    </div> <!-- .container end -->
</div> <!-- .block .services end -->