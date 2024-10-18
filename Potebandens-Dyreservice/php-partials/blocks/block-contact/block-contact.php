<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM contact;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block contact">

    <div class="container">

        <h1>Hvordan kan du kontakte os?</h1>

        <div class="contact-info">

            <div class="contact-title">
                <h2>Ring eller send en SMS</h2>
                <h2>Skriv en email</h2>
            </div>
            
            <div class="contact-blocks">
                <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                    <div class="contact-wrapper">
                        <div class="contact-options">
                            
                            <?php if (!empty($row['name'])) { ?>
                                <div class="name">
                                    <h2><?php echo $row['name']?></h2>
                                </div>
                            <?php } ?>

                            <?php if (!empty($row['work_title'])) { ?>
                                <div class="work_title">
                                    <h3><?php echo $row['work_title']?></h3>
                                </div>
                            <?php } ?>

                            <?php if (!empty($row['phone'])) { ?>
                                <div class="phone">
                                    <h4>Mobil</h4>
                                    <a href="tel:<?php echo $row['phone']?>"><?php echo $row['phone']?></a>
                                </div>
                            <?php } ?>
                            
                            <?php if (!empty($row['email'])) { ?>
                                <div class="email">
                                    <h4>Email</h4>
                                    <a href="mailto:<?php echo $row['email']?>"><?php echo $row['email']?></a>
                                </div>
                            <?php } ?>

                        </div> <!-- .contact-options end -->
                    </div> <!-- .contact-wrapper end -->
                <?php } ?>

            </div> <!-- .contact-blocks end -->

            <div class="phone-time">
                <h4>Telefontider</h4>
                <div class="time">
                    <div class="day">
                        <p>Mandag:</p>
                        <span>9:00 - 15:00</span>
                    </div>
                    <div class="day">
                        <p>Tirsdag:</p>
                        <span>9:00 - 15:00</span>
                    </div>
                    <div class="day">
                        <p>Onsdag:</p>
                        <span>9:00 - 15:00</span>
                    </div>
                    <div class="day">
                        <p>Torsdag:</p>
                        <span>9:00 - 15:00</span>
                    </div>
                    <div class="day">
                        <p>Fredag:</p>
                        <span>9:00 - 15:00</span>
                    </div>
                    <div class="day">
                        <p>Lørdag:</p>
                        <span>Lukket</span>
                    </div>
                    <div class="day">
                        <p>Søndag:</p>
                        <span>Lukket</span>
                    </div>
                </div> <!-- .time end -->
            </div> <!-- .phone-time end -->
        </div> <!-- .contact-info end -->

        <div class="message-form">
            
            <div class="message-title">
                <h2>Udfyld formen nedenfor og vi vender tilbage snarest</h2>
            </div>

            <div id="new-message">
                <div class="new-message">
                    
                    <p class="span">* SKAL udfyldes</p>
                    
                    <form action="">
                        
                        <div class="message-name">
                            <label>Dit Navn</label>
                            <div class="input">
                                <input type="text" name="message-name">
                            </div>
                        </div>

                        <div class="message-subject">
                            <label>Emne</label>
                            <div class="input">
                                <input type="text" name="message-subject">
                            </div>
                        </div>

                        <div class="message-msg">
                            <label>Din Besked</label>
                            <div class="input">
                                <textarea name="message-msg" id="message-msg"></textarea>
                            </div>
                        </div>

                        <select name="message-select" id="message-select">
                            <option value="call">Opkald</option>
                            <option value="sms">SMS</option>
                            <option value="email">Email</option>
                        </select>

                        <div class="message-choice">
                            <label>Mobil eller Email</label>
                            <div class="input">
                                <input type="text" name="message-choice">
                            </div>
                        </div>

                    </form>

                    <div class="button">
                        <button id="send-message">Send Besked</button>
                    </div>
                </div>
            </div>
            
            
        </div> <!-- .message-form end -->

        

        <h3>Lav form til at sende besked til admin indbakke</h3>
        
        <br>
        
        navn <br>
        emne <br>
        besked <br>
        vil du helst kontaktes via telefon eller email (kryds af) <br>
        indtast mobilnummer eller email, alt efter hvilken du har krydset af
        send <br>

        <br>

        if selected phone is not empty and input phone is empty
        - du har glemt at give os dit telefonnummer
        if selected email is not empty and input email is empty
        - du har glemt at give os din email

        <br>
        <br>

        <h3>Besked bliver uploaded til inbox table i database og admin kan se den i indbakke, som kan findes på 'profil.php' (list.php)</h3>
        <h4>- Hvis man har krydset af ved email og ikke indtastet email, vil beskeden ikke sendes</h4>

    </div> <!-- .container end -->

</div> <!-- .block .contact end -->