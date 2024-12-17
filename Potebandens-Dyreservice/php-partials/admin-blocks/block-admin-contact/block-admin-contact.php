<?php
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    include("includes/connect.inc.php");

    $sql1 = "SELECT * FROM contact;";
    $stmt1 = $conn->prepare($sql1);
    mysqli_stmt_execute($stmt1);
    $resultData1 = mysqli_stmt_get_result($stmt1);

    $sql2 = "SELECT * FROM openinghours;";
    $stmt2 = $conn->prepare($sql2);
    mysqli_stmt_execute($stmt2);
    $resultData2 = mysqli_stmt_get_result($stmt2);
?>

<div class="block admin-contact">

    <div class="container">

        <p class="update-info">Vil du opdatere en kontakt eller åbningstider?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>

        <div class="contact-grid">

            <div class="contact-info">

                <h2 class="admin-titles">Kontakter</h2>

                <?php while($row = mysqli_fetch_assoc($resultData1)) { ?>
                    <section attr-contact_id="<?php echo $row['id']; ?>">

                        <div class="contact-options">

                            <div class="contact_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div>

                            <div class="name contact-box">
                                <label>Navn</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['name']?>" class="contact_name">
                                </div>
                            </div>

                            <div class="work_title contact-box">
                                <label>Arbejdstitel</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['work_title']?>" class="contact_work_title">
                                </div>
                            </div>

                            <div class="phone contact-box">
                                <label>Mobil</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['phone']?>" class="contact_phone">
                                </div>
                            </div>

                            <div class="email contact-box">
                                <label>Email</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['email']?>" class="contact_email">
                                </div>
                            </div>

                            <div class="update-delete-buttons">
                                <div class="update-contact">
                                    <button id="update-contact">Opdatér</button>
                                </div>                                    
                                <div class="delete-contact">
                                    <button id="delete-contact">Slet</button>
                                </div>
                            </div>

                        </div> <!-- .contact-options end -->
                    </section>
                <?php } ?>
            </div> <!-- .contact-info end -->

            <div class="contact-phone">
                <div class="phone-title">
                    <h2 class="admin-titles">Telefontider</h2>
                </div>

                <?php while($row = mysqli_fetch_assoc($resultData2)) { ?>
                    <section attr-openinghours_id="<?php echo $row['id']; ?>">
                        <div class="time">

                            <div class="openinghours_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div>


                            <div class="day weekday">
                                <label>Hvilken ferieperiode</label>
                                <div class="input">
                                    <select class="vacation">
                                        <option value="<?php echo $row['vacation'];?>" class="selected"><?php echo $row['vacation'];?></option>
                                        <option value="">Ingen ferie</option>
                                        <option value="Vinterferie">Vinterferie</option>
                                        <option value="Påskeferie">Påskeferie</option>
                                        <option value="Sommerferie">Sommerferie</option>
                                        <option value="Efterårsferie">Efterårsferie</option>
                                        <option value="Juleferie">Juleferie</option>
                                        <option value="Privat Ferie">Privat Ferie</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->
            
                            <div class="day">
                                <h4>Mandag</h4>
                                <div class="input">
                                    <select class="mondayfrom">
                                        <option value="<?php echo $row['mondayfrom'];?>" class="selected"><?php echo $row['mondayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="mondayto">
                                        <option value="<?php echo $row['mondayto'];?>" class="selected"><?php echo $row['mondayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                                
                            </div> <!-- .day end -->

                            <div class="day">
                                <h4>Tirsdag</h4>
                                <div class="input">
                                    <select class="tuesdayfrom">
                                        <option value="<?php echo $row['tuesdayfrom'];?>" class="selected"><?php echo $row['tuesdayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="tuesdayto">
                                        <option value="<?php echo $row['tuesdayto'];?>" class="selected"><?php echo $row['tuesdayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->

                            <div class="day">
                                <h4>Onsdag</h4>
                                <div class="input">
                                    <select class="wednesdayfrom">
                                        <option value="<?php echo $row['wednesdayfrom'];?>" class="selected"><?php echo $row['wednesdayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="wednesdayto">
                                        <option value="<?php echo $row['wednesdayto'];?>" class="selected"><?php echo $row['wednesdayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->

                            <div class="day">
                                <h4>Torsdag</h4>
                                <div class="input">
                                    <select class="thursdayfrom">
                                        <option value="<?php echo $row['thursdayfrom'];?>" class="selected"><?php echo $row['thursdayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="thursdayto">
                                        <option value="<?php echo $row['thursdayto'];?>" class="selected"><?php echo $row['thursdayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->

                            <div class="day">
                                <h4>Fredag</h4>
                                <div class="input">
                                    <select class="fridayfrom">
                                        <option value="<?php echo $row['fridayfrom'];?>" class="selected"><?php echo $row['fridayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="fridayto">
                                        <option value="<?php echo $row['fridayto'];?>" class="selected"><?php echo $row['fridayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->

                            <div class="day">
                                <h4>Lørdag</h4>
                                <div class="input">
                                    <select class="saturdayfrom">
                                        <option value="<?php echo $row['saturdayfrom'];?>" class="selected"><?php echo $row['saturdayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="saturdayto">
                                        <option value="<?php echo $row['saturdayto'];?>" class="selected"><?php echo $row['saturdayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->

                            <div class="day">
                                <h4>Søndag</h4>
                                <div class="input">
                                    <select class="sundayfrom">
                                        <option value="<?php echo $row['sundayfrom'];?>" class="selected"><?php echo $row['sundayfrom'];?></option>
                                        <option value="Lukket">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                    <select class="sundayto">
                                        <option value="<?php echo $row['sundayto'];?>" class="selected"><?php echo $row['sundayto'];?></option>
                                        <option value="">Lukket</option>
                                        <option value="8:00">8:00</option>
                                        <option value="9:00">9:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                    </select>
                                </div>
                            </div> <!-- .day end -->

                            <div class="update-delete-buttons">
                                <div class="update-openinghours">
                                    <button id="update-openinghours">Opdatér</button>
                                </div>                                    
                                <div class="delete-openinghours">
                                    <button id="delete-openinghours">Slet</button>
                                </div>
                            </div>

                        </div> <!-- .time end -->
                    </section>
                <?php } ?>
            </div> <!-- .contact-phone end -->
        </div> <!-- .contact-grid end -->
    </div> <!-- .container end -->
</div> <!-- .block .admin-contact end -->