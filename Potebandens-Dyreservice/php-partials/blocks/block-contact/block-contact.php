<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM contact;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block contact">
    <div class="container">

        <h1>Hvordan kan du kontakte os?</h1>

        <div class="contact-grid">
            <div class="contact-info">
                <div class="contact-title">
                    <h3>Telefonopkald - SMS - Email</h3>
                </div>
                <!-- if there is contacts in db table -->
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <div class="contact-blocks">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="contact-wrapper">
                                <div class="contact-options">
                                    <div class="contact-top">
                                        <?php if (!empty($row['name'])) { ?>
                                            <div class="name">
                                                <h2><?php echo $row['name']?></h2>
                                            </div> <!-- .name end -->
                                        <?php } ?>
                                        <?php if (!empty($row['work_title'])) { ?>
                                            <div class="work_title">
                                                <h3><?php echo $row['work_title']?></h3>
                                            </div> <!-- .worktitle end -->
                                        <?php } ?>
                                    </div> <!-- .contact-top end -->
                                    <div class="contact-bottom">
                                        <?php if (!empty($row['phone'])) { ?>
                                            <div class="phone">
                                                <h4>Mobil</h4>
                                                <a href="tel:<?php echo $row['phone']?>"><?php echo $row['phone']?></a>
                                            </div> <!-- .phone end -->
                                        <?php } ?>
                                        <?php if (!empty($row['email'])) { ?>
                                            <div class="email">
                                                <h4>Email</h4>
                                                <a href="mailto:<?php echo $row['email']?>"><?php echo $row['email']?></a>
                                            </div> <!-- .email end -->
                                        <?php } ?>
                                    </div> <!-- .contact-bottom end -->
                                </div> <!-- .contact-options end -->
                            </div> <!-- .contact-wrapper end -->
                        <?php } ?>
                    </div> <!-- .contact-blocks end -->
                <?php } 
                else { ?>
                    <!-- if no contacts in db table -->
                    <div class="empty">
                        <h2>Der ser ikke ud til at være kontaktoplysninger i øjeblikket</h2>
                        <h1>Men du kan altid kontakte os ved at udfylde formen</h1>
                    </div>
                <?php } ?>
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
                            </div> <!-- .message_name end -->
                            <div class="message_subject message_div">
                                <label>Emne <span>*</span></label>
                                <div class="input">
                                    <input type="text" name="message_subject">
                                </div>
                            </div> <!-- .message_subject end -->
                            <div class="message_msg message_div">
                                <label>Din Besked <span>*</span></label>
                                <div class="input">
                                    <div class="pull-tab"></div>
                                    <textarea name="message_msg" id="message_msg"></textarea>
                                    <div id="message_msg_feedback"></div>
                                </div>
                            </div> <!-- .message_msg end -->
                            <div class="message_contact message_div">
                                <label>Hvordan vil du helst kontaktes? <span>*</span></label><br>
                                <select id="selected">
                                    <option value="vælg" selected>--- Vælg ---</option>
                                    <option value="Telefonopkald">Telefonopkald</option>
                                    <option value="SMS">SMS</option>
                                    <option value="Email">Email</option>
                                </select> <!-- #selected end -->
                                <div class="telefonopkald sms box message_div">
                                    <label>Dit Telefonnummer <span>*</span></label>
                                    <div class="input">
                                        <input type="text" name="message_phone">
                                    </div>
                                </div> <!-- .telefonopkald end -->
                                <div class="email box message_div">
                                    <label>Din Email <span>*</span></label>
                                    <div class="input">
                                        <input type="text" name="message_email">
                                    </div>
                                </div> <!-- .email end -->
                            </div> <!-- .how-to-contact end -->
                        </form> <!-- form end -->
                        <div class="button">
                            <button id="send-contact-message">Send Besked</button>
                        </div>
                    </div> <!-- .new-message end -->
                </div> <!-- #new-message end -->
            </div> <!-- .message-form end -->
        </div> <!-- .contact-grid end -->
    </div> <!-- .container end -->
</div> <!-- .block .contact end -->