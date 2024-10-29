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
                <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
            
                    <section attr-message_id="<?php echo $row['id']; ?>">
                        <div class="message">
                            <div class="button">
                                <button class="delete-message">Slet Besked</button>
                            </div>
                            <div class="message-from">
                                <div class="message_subject">
                                    <h5 class="border-bottom">Emne</h5>
                                    <div class="subject">
                                        <?php if(!empty($row['message_subject'])) { ?>
                                            <h4><?php echo $row['message_subject']?></h4>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="message_name">
                                    <h5 class="border-bottom">Afsender</h5>
                                    <div class="name">
                                        <?php if(!empty($row['message_name'])) { ?>
                                            <h4><?php echo $row['message_name']?></h4>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div id="arrow_down">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div id="arrow_up">
                                    <i class="fa fa-chevron-up"></i>
                                </div>
                            </div>
                            <div class="message-msg">
                                <div class="message-top">
                                    <div class="message_contact">
                                        <h5>
                                            Kontakt<br>
                                            <?php if(!empty($row['message_name'])) { ?>
                                                <span><?php echo $row['message_name']?></span>
                                            <?php } ?>
                                        </h5>
                                        <div class="how_to_contact">
                                            <?php if(!empty($row['message_contact'])) { ?>
                                                <h4><?php echo $row['message_contact']?></h4>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="message_contact_method">
                                        <h5>Telefon / Email</h5>
                                        <div class="message_phone">
                                            <?php if(!empty($row['message_phone'])) { ?>
                                                <h4><?php echo $row['message_phone']?></h4>
                                            <?php } ?>
                                        </div>
                                        <div class="message_email">
                                            <?php if(!empty($row['message_email'])) { ?>
                                                <a href="mailto:<?php echo $row['message_email']?>"><?php echo $row['message_email']?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-bottom">
                                    <div class="message_msg">
                                        <div class="msg">
                                            <?php if(!empty($row['message_msg'])) { ?>
                                                <p><?php echo $row['message_msg']?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- </div>--.message-msg end -->
                        </div> <!-- </div>--.message end -->
                    </section>

                <?php } ?>
            </div> <!-- </div>--.inbox-messages end -->
        </div> <!-- </div>--.inbox end -->
    </div> <!-- </div>--.container end -->
</div> <!-- </div>--.admin-inbox end -->