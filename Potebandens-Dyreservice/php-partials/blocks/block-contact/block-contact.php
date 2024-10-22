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

        
        <div class="contact-grid">
            <div class="contact-info">

                <div class="contact-title">
                    <h3>Telefonopkald - SMS - Email</h3>
                </div>

                <div class="contact-blocks">
                    <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                        <div class="contact-wrapper">
                            <div class="contact-options">
                
                                <div class="contact-top">
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
                                </div>
                
                                <div class="contact-bottom">
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
                                </div>
                        
                            </div> <!-- .contact-options end -->
                        </div> <!-- .contact-wrapper end -->
                    <?php } ?>

                </div> <!-- .contact-blocks end -->

            </div> <!-- .contact-info end -->

            <div class="message-form">

                <div class="message-title">
                    <h3>Udfyld formen nedenfor</h3>
                </div>

                <div id="new-message">
                    <div class="new-message">
                        
                        <p class="span"><span>*</span> SKAL udfyldes</p>
        
                        <form method="post">
                            <div class="message_name message_div">
                                <label>Dit Navn <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="message_name">
                                </div>
                            </div>

                            <div class="message_subject message_div">
                                <label>Emne <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="message_subject">
                                </div>
                            </div>

                            <div class="message_msg message_div">
                                <label>Din Besked <span>*</span></label>
                                <div class="input">
                                    <textarea name="message_msg" id="message_msg"></textarea>
                                    <div id="message_msg_feedback"></div>
                                </div>
                            </div>

                            <div class="message_contact message_div">
                                <label>Hvordan vil du helst kontaktes? <span>*</span></label><br>

                                <select id="selected">
                                    <option value="choose" selected class="selected">--- Vælg ---</option>
                                    <option value="call">Telefonopkald</option>
                                    <option value="sms">SMS</option>
                                    <option value="email">Email</option>
                                </select>

                                <div class="call sms box">
                                    <label>Dit Telefonnummer <span>*</span></label>
                                    <div class="input">
                                        <input type="text" name="message_phone">
                                    </div>
                                </div>
                                <div class="email box">
                                    <label>Din Email <span>*</span></label>
                                    <div class="input">
                                        <input type="text" name="message_email">
                                    </div>
                                </div>

                            </div> <!-- .how-to-contact end -->
                        </form>

                        <div class="button">
                            <button id="send-contact-message">Send Besked</button>
                        </div>

                    </div> <!-- .new-message end -->
                </div> <!-- #new-message end -->

            </div> <!-- .message-form end -->
        </div> <!-- .contact-grid end -->

        <div class="contact-phone">
                <div class="phone-title">
                    <h3>Telefontider</h3>
                </div>
            <div class="phone-time">
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
        </div> <!-- .contact-phone end -->

    </div> <!-- .container end -->

</div> <!-- .block .contact end -->