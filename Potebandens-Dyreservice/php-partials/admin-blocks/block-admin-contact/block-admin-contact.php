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
            
            <div class="add_contact">
                <div id="show_add_contact">Tilføj kontakt</div>
                <div id="hide_add_contact">Skjul formular</div>
            </div>

            <div id="new_contact">
                <div class="new_contact">

                    <h2>Tilføj Kontakt</h2>
                    <p class="span"><span>*</span> SKAL udfyldes</p>

                    <form method="post">

                        <div class="contact-top">
                            <div id="contact_name" class="contact-box">
                                <label>Navn <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_name">
                                </div>
                            </div>
                            
                            <div id="contact_work_title" class="contact-box">
                                <label>Arbejdstitel <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_work_title">
                                </div>
                            </div>
                        </div>

                        <div class="contact-bottom">
                            <div id="contact_phone" class="contact-box">
                                <label>Mobil <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="contact_phone">
                                </div>
                            </div>

                            <div id="contact_email" class="contact-box">
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
        </div> <!-- .form end -->
        
        <div class="contact-info">

            <h3>Kontakter</h3>
            <p class="update-info">Vil du opdatere en ydelse?<br>- Ret i det ønskede tekstfelt<br>og tryk herefter på 'opdatér'</p>

            <div class="contact-blocks">
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
                                    <input type="text" value="<?php echo $row['name']?>" id="contact_name">
                                </div>
                            </div>

                            <div class="work_title contact-box">
                                <label>Arbejdstitel</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['work_title']?>" id="contact_work_title">
                                </div>
                            </div>

                            <div class="phone contact-box">
                                <label>Mobil</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['phone']?>" id="contact_phone">
                                </div>
                            </div>

                            <div class="email contact-box">
                                <label>Email</label>
                                <div class="input">
                                    <input type="text" value="<?php echo $row['email']?>" id="contact_email">
                                </div>
                            </div>

                            <div class="buttons contact-box">
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

            </div> <!-- .contact-blocks end -->

        </div> <!-- .contact-info end -->

        <div class="contact-phone">
            <div class="phone-title">
                <h3>Telefontider</h3>
            </div>
            <?php while($row = mysqli_fetch_assoc($resultData2)) { ?>
                <section attr-hours_id="<?php echo $row['id']; ?>">
                    <div class="phone-time">
                        <div class="time">
                            <div class="day">
                                <p>Mandag</p>
                                <input type="text" name="monday" value="<?php echo $row['monday']; ?>">
                            </div>
                            <div class="day">
                                <p>Tirsdag</p>
                                <input type="text" name="tuesday" value="<?php echo $row['tuesday']; ?>">
                            </div>
                            <div class="day">
                                <p>Onsdag</p>
                                <input type="text" name="wednesday" value="<?php echo $row['wednesday']; ?>">
                            </div>
                            <div class="day">
                                <p>Torsdag</p>
                                <input type="text" name="thursday" value="<?php echo $row['thursday']; ?>">
                            </div>
                            <div class="day">
                                <p>Fredag</p>
                                <input type="text" name="friday" value="<?php echo $row['friday']; ?>">
                            </div>
                            <div class="day">
                                <p>Lørdag</p>
                                <input type="text" name="saturday" value="<?php echo $row['saturday']; ?>">
                            </div>
                            <div class="day">
                                <p>Søndag</p>
                                <input type="text" name="sunday" value="<?php echo $row['sunday']; ?>">
                            </div>
                        </div> <!-- .time end -->
                    </div> <!-- .phone-time end -->
                </section>
            <?php } ?>
        </div> <!-- .contact-phone end -->

    </div> <!-- .container end -->

</div> <!-- .block .admin-contact end -->