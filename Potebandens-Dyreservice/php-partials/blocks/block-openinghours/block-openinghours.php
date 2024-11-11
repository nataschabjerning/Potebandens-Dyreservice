<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM openinghours;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block openinghours">
    <div class="container">
        <div class="contact-phone">
            <div class="phone-title">
                <h3>Telefontider</h3>
            </div>
            <!-- if there is openinghours in db table -->
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
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
                            </div> <!-- .day end -->
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
                            </div> <!-- .day end -->
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
                            </div> <!-- .day end -->
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
                            </div> <!-- .day end -->
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
                            </div> <!-- .day end -->
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
                            </div> <!-- .day end -->
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
                            </div> <!-- .day end -->
                        </div> <!-- .time end -->
                    </div> <!-- .phone-time end -->
                <?php } ?>
            <?php }
            else { ?>
                <!-- if no openinghours in db table -->
                <div class="empty">
                    <h2>Der ser ikke ud til at være telefontider oplyst i øjeblikket</h2>
                    <h1>Men du kan altid kontakte os ved at udfylde formen ovenfor</h1>
                </div>
            <?php } ?>
        </div> <!-- .contact-phone end -->
    </div>
</div>