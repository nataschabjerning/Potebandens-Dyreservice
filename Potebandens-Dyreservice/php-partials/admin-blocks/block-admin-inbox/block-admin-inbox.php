<?php
    include("includes/connect.inc.php");
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    $sql = "SELECT * FROM inbox ORDER BY id DESC;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block admin-inbox">
    <div class="container">
        <div class="inbox">

            <h2 class="admin-titles">Beskeder</h2>
            
            <div class="inbox-messages">
                
                <div class="table">
                    <div class="thead">
                        <div class="th">
                            <h4>Emne</h4>
                        </div>
                        <div class="th">
                            <h4>Afsender</h4>
                        </div>
                        <div id="arrow-up">
                            <i class="fa fa-chevron-up"></i>
                        </div>
                    </div>
                    
                    <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                        
                        <section id="section" attr-message_id="<?php echo $row['id']; ?>">
                            
                            <div class="theadmessage message-from close <?php if($row['message_read'] == "") {?>newmessage<?php } else { ?>read<?php } ?>">
                            <input type="hidden" name="message_read" class="<?php if($row['message_read'] == "") {?>newmessage<?php } else { ?>read<?php } ?>" value="<?php if($row['message_read'] == "") {?>newmessage<?php } else { ?>read<?php } ?>">

                                <!-- VISITOR SUBJECT AND NAME START -->
                                <div class="td message-subject">
                                    <?php if(!empty($row['message_subject'])) { ?>
                                        <h4><?php echo $row['message_subject']?></h4>
                                    <?php } ?>
                                </div>
                                <div class="td message-name">
                                    <?php if(!empty($row['message_name'])) { ?>
                                        <h4><?php echo $row['message_name']?></h4>
                                    <?php } ?>
                                </div>
                                <!-- VISITOR SUBJECT AND NAME END -->

                                <!-- ARROWS START -->
                                <div class="arrow-up">
                                    <i class="fa fa-chevron-up"></i>
                                </div>
                                <div class="arrow-down">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <!-- ARROWS END -->

                                <!-- ABSOLUTE POSITIONED ITEMS START -->
                                <div class="button">
                                    <button class="delete-message">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <!-- ABSOLUTE POSITIONED ITEMS END -->

                            </div> <!-- .message-from end -->

                            <div class="tbody message-msg">
                                <div class="message-content">

                                    <!-- HOW TO CONTACT VISITOR START -->
                                    <div class="message-contact-options">
                                        <div class="td message_contact">
                                            <h5>Kontakt via</h5>
                                            <div class="how_to_contact">
                                                <?php if(!empty($row['message_contact'])) { ?>
                                                    <p><?php echo $row['message_contact']?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="td message_contact_method">
                                            <h5>Telefon / Email</h5>
                                            <div class="message_phone">
                                                <?php if(!empty($row['message_phone'])) { ?>
                                                    <p><?php echo $row['message_phone']?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="message_email">
                                                <?php if(!empty($row['message_email'])) { ?>
                                                    <a href="mailto:<?php echo $row['message_email']?>"><?php echo $row['message_email']?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- HOW TO CONTACT VISITOR END -->
                                    
                                    <!-- VISITOR MESSAGE START -->
                                    <div class="td message_msg">
                                        <h5>Besked</h5>
                                        <div class="msg">
                                            <?php if(!empty($row['message_msg'])) { ?>
                                                <p><?php echo $row['message_msg']?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- VISITOR MESSAGE END -->

                                </div> <!-- .message-content end -->
                            </div> <!-- .message-msg end -->
                        </section>

                    <?php } ?>
                </div> <!-- .table end -->
            </div> <!-- .inbox-messages end -->
        </div> <!-- .inbox end -->
    </div> <!-- .container end -->
</div> <!-- .admin-inbox end -->