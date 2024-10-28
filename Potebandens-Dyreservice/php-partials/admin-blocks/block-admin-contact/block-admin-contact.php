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

        <div class="form">

            <div class="buttons">

                <div class="c">
                    <div class="add_contact">
                        <div id="show_add_contact">Tilføj Kontakt</div>
                        <div id="hide_add_contact">Skjul formular</div>
                    </div>

                    <div id="new_contact">
                        <div class="new_contact">

                            <h2>Tilføj Kontakt</h2>
                            <p class="span"><span>*</span> SKAL udfyldes</p>

                            <form method="post">

                                <div class="contact-top">
                                    <div class="contact_name contact-box">
                                        <label>Navn <span>*</span></label>
                                        <div class="input">
                                            <input type="text" name="contact_name">
                                        </div>
                                    </div>
                                
                                    <div class="contact_work_title contact-box">
                                        <label>Arbejdstitel <span>*</span></label>
                                        <div class="input">
                                            <input type="text" name="contact_work_title">
                                        </div>
                                    </div>
                                </div>

                                <div class="contact-bottom">
                                    <div class="contact_phone contact-box">
                                        <label>Mobil <span>*</span></label>
                                        <div class="input">
                                            <input type="text" name="contact_phone">
                                        </div>
                                    </div>

                                    <div class="contact_email contact-box">
                                        <label>Email <span>*</span></label>
                                        <div class="input">
                                            <input type="text" name="contact_email">
                                        </div>
                                    </div>
                                </div>
                                
                            </form>

                            <div class="button">
                                <button id="create-contact">Tilføj Kontakt</button>
                            </div>

                        </div> <!-- .new_contact end -->
                    </div> <!-- #new_contact end -->
                </div> <!-- .c end -->

                <div class="o">
                    <div class="add_openinghours">
                        <div id="show_add_openinghours">Tilføj Åbningstider</div>
                        <div id="hide_add_openinghours">Skjul formular</div>
                    </div>

                    <div id="new_openinghours">
                        <div class="new_openinghours">

                            <h2>Tilføj Åbningstider</h2>

                            <div class="openinghours-info">
                                <div class="ifclosed">
                                    <p>Lukket?</p>
                                    <p>Så kan du nøjes med at udfylde 'Fra' feltet og springe 'Til' feltet over.</p>
                                </div>
                                <div class="vacation-times">
                                    <p>Ændrede åbningstider i en ferie?</p>
                                    <p>Vælg hvilken ferie nedenfor. Ellers kan du springe det første felt over.</p>
                                </div>
                            </div>
                            

                            <form method="post">

                                <div id="openinghours">
                                    <label>Hvilken ferieperiode</label>
                                    <div class="input">
                                        <select id="vacationform">
                                            <option value="vælg" disabled selected>---- Vælg ----</option>
                                            <option value="Vinterferie">Vinterferie</option>
                                            <option value="Påskeferie">Påskeferie</option>
                                            <option value="Sommerferie">Sommerferie</option>
                                            <option value="Efterårsferie">Efterårsferie</option>
                                            <option value="Juleferie">Juleferie</option>
                                            <option value="Privat Ferie">Privat Ferie</option>
                                        </select>
                                    </div>
                                </div> <!-- #openinghours end -->

                                <div id="openinghours">
                                    <label>Mandag</label>
                                    <div class="input">
                                        <select id="mondayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="mondaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->
                                
                                <div id="openinghours">
                                    <label>Tirsdag</label>
                                    <div class="input">
                                        <select id="tuesdayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="tuesdaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->

                                <div id="openinghours">
                                    <label>Onsdag</label>
                                    <div class="input">
                                        <select id="wednesdayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="wednesdaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->

                                <div id="openinghours">
                                    <label>Torsdag</label>
                                    <div class="input">
                                        <select id="thursdayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="thursdaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->

                                <div id="openinghours">
                                    <label>Fredag</label>
                                    <div class="input">
                                        <select id="fridayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="fridaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->

                                <div id="openinghours">
                                    <label>Lørdag</label>
                                    <div class="input">
                                        <select id="saturdayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="saturdaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->

                                <div id="openinghours">
                                    <label>Søndag</label>
                                    <div class="input">
                                        <select id="sundayfromform">
                                            <option value="Fra" selected disabled>--- Fra ---</option>
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
                                        <select id="sundaytoform" class="ifclosed">
                                            <option value="Til" selected disabled>--- Til ---</option>
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
                                    </div> <!-- .input end -->
                                </div> <!-- #openinghours end -->
                                
                            </form>

                            <div class="button">
                                <button id="create-openinghours">Tilføj Åbningstider</button>
                            </div>

                        </div> <!-- .new_openinghours end -->
                    </div> <!-- #new_openinghours end -->
                </div> <!-- .o end -->
            </div> <!-- .buttons end -->
        </div> <!-- .form end -->



        <p class="update-info">Vil du opdatere en kontakt eller åbningstider? - Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>
        <div class="contact-grid">

            <div class="contact-info">

                <h3>Kontakter</h3>

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
                    <h3>Telefontider</h3>
                </div>

                <?php while($row = mysqli_fetch_assoc($resultData2)) { ?>
                    <section attr-openinghours_id="<?php echo $row['id']; ?>">
                        <div class="time">

                            <div class="openinghours_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div>


                            <div class="day">
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