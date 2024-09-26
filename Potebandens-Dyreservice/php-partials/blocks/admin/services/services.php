<div class="block services">
    <div class="container">
        <div class="all-services">

            <?php
                include("includes/connect.inc.php");

                $sql = "SELECT * FROM services ORDER BY id DESC;";
                $stmt = $conn->prepare($sql);
                mysqli_stmt_execute($stmt);
                $resultData = mysqli_stmt_get_result($stmt);
            ?>

            <div id="confirmation-delete">
                <div class="content">
                    <h2>Er du sikker på, at du gerne vil slette denne ydelse?</h2>
                    <div class="buttons">
                        <button class="confirm_delete">
                            <img src="../../../../Images/References/grønpotebtn.png" alt="">
                            <h4>Ja</h4>
                        </button>
                        <button class="cancel_delete">
                            <img src="../../../../Images/References/rødpotebtn.png" alt="">
                            <h4>Nej</h4>
                        </button>
                    </div>
                </div>
            </div>

            <div id="confirmation-update">
                <div class="content">
                    <h2>Er du sikker på, at du gerne vil opdatere denne ydelse?</h2>
                    <div class="buttons">
                        <button class="confirm_update">
                            <img src="../../../../Images/References/grønpotebtn.png" alt="">
                            <h4>Ja</h4>
                        </button>
                        <button class="cancel_update">
                            <img src="../../../../Images/References/rødpotebtn.png" alt="">
                            <h4>Nej</h4>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form">

                <div class="add_service">
                    <div id="show_add_form">Tilføj Ydelse</div>
                    <div id="hide_add_form">Skjul formular</div>
                </div>

                <!-- message div for success when creating/updating service -->
                <div id="alertMessage"></div>

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
                                </div>
                                <div class="short_description">
                                    <label>Kort Beskrivelse <span>*</span></label>
                                    <div class="input">
                                        <textarea name="service_short_description" id="service_short_description" placeholder="En kort tekst til visning på forsiden"></textarea>
                                    </div>
                                </div>
                                <div class="notes">
                                    <label>Vigtige Noter</label>
                                    <div class="input">
                                        <textarea name="important_note" id="important_note" placeholder="Regler, priser, info el. lign. (Denne tekst bliver vist under alle tekstfelter)"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="descriptions">
                                <p>Vil du dele tekst op i sektioner, kan du gøre det ved at skrive det i hvert sit tekstfelt. Som minimum skal første tekstfelt udfyldes.</p>
                                <div class="input" id="service_description">
                                    <p class="star">*</p>
                                    <textarea name="service_description_one" id="service_description_one" placeholder="Tekstfelt 1 (max 250 tegn)"></textarea>
                                </div>
                                <div class="input">
                                    <textarea name="service_description_two" id="service_description_two" placeholder="Tekstfelt 2 (max 250 tegn)"></textarea>
                                </div>
                                <div class="input">
                                    <textarea name="service_description_three" id="service_description_three" placeholder="Tekstfelt 3 (max 250 tegn)"></textarea>
                                </div>
                                <div class="input">
                                    <textarea name="service_description_four" id="service_description_four" placeholder="Tekstfelt 4 (max 250 tegn)"></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="button">
                            <button id="create-service">Tilføj ydelse</button>
                        </div>
                    </div> <!-- .new_service end -->
                </div>
                

                <hr>

                <h3>Oversigt over alle ydelser i tabel</h3>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ydelsens Navn</th>
                            <th>Kort beskrivelse</th>
                            <th>Tekstfelt 1</th>
                            <th>Tekstfelt 2</th>
                            <th>Tekstfelt 3</th>
                            <th>Tekstfelt 4</th>
                            <th>Vigtige Noter</th>
                            <th>Opdater/Slet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                            <tr attr-service_id="<?php echo $row['id']; ?>">
                                <td class="service_id"><?php echo $row['id']?></td>
                                <td class="service_name"><textarea name="service_name" id="service_name"><?php echo $row['service_name']?></textarea></td>
                                <td><textarea name="service_short_description" id="service_short_description"><?php echo $row['service_short_description']?></textarea></td>
                                <td><textarea name="service_description_one" id="service_description_one"><?php echo $row['service_description_one']?></textarea></td>
                                <td><textarea name="service_description_two" id="service_description_two"><?php echo $row['service_description_two']?></textarea></td>
                                <td><textarea name="service_description_three" id="service_description_three"><?php echo $row['service_description_three']?></textarea></td>
                                <td><textarea name="service_description_four" id="service_description_four"><?php echo $row['service_description_four']?></textarea></td>
                                <td><textarea name="important_note" id="important_note"><?php echo $row['important_note']?></textarea></td>
                                <td class="buttons">
                                    <div class="update-service">
                                      <button>Opdater</button>
                                    </div>                                    
                                    <div class="delete-service">
                                        <button>Slet</button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div> <!-- .form end -->

        </div> <!-- .all-services end -->
    </div> <!-- .container end -->
</div> <!-- .block .services end -->