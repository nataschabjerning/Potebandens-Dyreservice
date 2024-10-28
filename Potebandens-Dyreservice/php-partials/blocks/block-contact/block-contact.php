<?php
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

<div class="block contact">

    <div class="container">

        <h1>Hvordan kan du kontakte os?</h1>

        
        <div class="contact-grid">
            <div class="contact-info">

                <div class="contact-title">
                    <h3>Telefonopkald - SMS - Email</h3>
                </div>

                <div class="contact-blocks">
                    <?php while($row = mysqli_fetch_assoc($resultData1)) { ?>
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
                                    <option value="vælg" selected>--- Vælg ---</option>
                                    <option value="Telefonopkald">Telefonopkald</option>
                                    <option value="SMS">SMS</option>
                                    <option value="Email">Email</option>
                                </select>

                                <div class="telefonopkald sms box message_div">
                                    <label>Dit Telefonnummer <span>*</span></label>
                                    <div class="input">
                                        <input type="text" name="message_phone">
                                    </div>
                                </div>
                                <div class="email box message_div">
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
            <?php while($row = mysqli_fetch_assoc($resultData2)) { ?>
                <div class="phone-time">
                    
                    <?php if (!empty($row['vacation'])) { ?>
                        <div class="vacation day">
                            <h4><?php echo $row['vacation']; ?></h4>
                        </div>
                    <?php } ?>
                    
                    <div class="time">

                        <div class="day">
                            <p>Mandag</p>
                            <h4>
                                <?php if (!empty($row['mondayfrom'])) { ?>
                                    <?php echo $row['mondayfrom']; ?>
                                <?php } ?>
                                <?php if (!empty($row['mondayto'])) { ?>
                                    - <?php echo $row['mondayto']; ?>
                                <?php } ?>
                            </h4>
                        </div>

                            <div class="day">
                                <p>Tirsdag</p>
                                <h4>
                                    <?php if (!empty($row['tuesdayfrom'])) { ?>
                                        <?php echo $row['tuesdayfrom']; ?>
                                    <?php } ?>
                                    <?php if (!empty($row['tuesdayto'])) { ?>
                                        - <?php echo $row['tuesdayto']; ?>
                                    <?php } ?>
                                </h4>
                            </div>

                            <div class="day">
                                <p>Onsdag</p>
                                <h4>
                                    <?php if (!empty($row['wednesdayfrom'])) { ?>
                                        <?php echo $row['wednesdayfrom']; ?>
                                    <?php } ?>
                                    <?php if (!empty($row['wednesdayto'])) { ?>
                                        - <?php echo $row['wednesdayto']; ?>
                                    <?php } ?>
                                </h4>
                            </div>

                            <div class="day">
                                <p>Torsdag</p>
                                <h4>
                                    <?php if (!empty($row['thursdayfrom'])) { ?>
                                        <?php echo $row['thursdayfrom']; ?>
                                    <?php } ?>
                                    <?php if (!empty($row['thursdayto'])) { ?>
                                        - <?php echo $row['thursdayto']; ?>
                                    <?php } ?>
                                </h4>
                            </div>

                            <div class="day">
                                <p>Fredag</p>
                                <h4>
                                    <?php if (!empty($row['fridayfrom'])) { ?>
                                        <?php echo $row['fridayfrom']; ?>
                                    <?php } ?>
                                    <?php if (!empty($row['fridayto'])) { ?>
                                        - <?php echo $row['fridayto']; ?>
                                    <?php } ?>
                                </h4>
                            </div>

                            <div class="day">
                                <p>Lørdag</p>
                                <h4>
                                    <?php if (!empty($row['saturdayfrom'])) { ?>
                                        <?php echo $row['saturdayfrom']; ?>
                                    <?php } ?>
                                    <?php if (!empty($row['saturdayto'])) { ?>
                                        - <?php echo $row['saturdayto']; ?>
                                    <?php } ?>
                                </h4>
                            </div>

                            <div class="day">
                                <p>Søndag</p>
                                <h4>
                                    <?php if (!empty($row['sundayfrom'])) { ?>
                                        <?php echo $row['sundayfrom']; ?>
                                    <?php } ?>
                                    <?php if (!empty($row['sundayto'])) { ?>
                                        - <?php echo $row['sundayto']; ?>
                                    <?php } ?>
                                </h4>
                            </div>
                        
                    </div> <!-- .time end -->
                </div> <!-- .phone-time end -->
            <?php } ?>
        </div> <!-- .contact-phone end -->

    </div> <!-- .container end -->

</div> <!-- .block .contact end -->