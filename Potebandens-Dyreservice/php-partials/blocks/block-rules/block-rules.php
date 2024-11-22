<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM rules;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block block-rules" id="rules">
    <div class="container">

        <div class="rules-title">
            <h3>Regler og retningslinjer</h3>
        </div>

        <div class="rules-content">
            <!-- if there is rules in db table -->
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <p class="subtitle">Lige som hos alle andre organisationer, har vi en kort række regler, der skal følges.</p>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="all-rules">
                        <?php if (!empty($row['rules'])) { ?>
                            <h4><?php echo $row['rules']; ?></h4>
                        <?php } ?>
                        <div class="bullet-points">
                            <div class="point">
                                <?php if (!empty($row['rules_point_one'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_one']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_two'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_two']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_three'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_three']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_four'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_four']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_five'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_five']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_six'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_six']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_seven'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_seven']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_eight'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_eight']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_nine'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_nine']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="point">
                                <?php if (!empty($row['rules_point_ten'])) { ?>
                                    <img src="../../../../Images/backgrounds/bulletpoint.png" alt="">
                                    <p><?php echo $row['rules_point_ten']; ?></p>
                                <?php } ?>
                            </div>
                        </div> <!-- .bullet-points end -->
                    </div> <!-- .all-rules end -->
                <?php } ?>
            <?php }
            else { ?>
                <!-- if no rules in db table -->
                <div class="empty">
                    <h1>Der er ikke nogle regler at vise i øjeblikket</h1>
                    <h2>Men du kan altid kontakte os via en af de ovenstående muligheder og høre nærmere.</h2>
                </div>
            <?php } ?>
        </div> <!-- .rules-content end -->
    </div> <!-- .container end -->
</div> <!-- .block-rules end -->