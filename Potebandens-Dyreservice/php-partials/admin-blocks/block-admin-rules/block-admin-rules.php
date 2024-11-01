<?php
    include("php-partials/components/confirmation/confirm-update/confirm-update.php");
    include("php-partials/components/confirmation/confirm-delete/confirm-delete.php");

    include("includes/connect.inc.php");

    $sql = "SELECT * FROM rules;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block admin-rules">
    <div class="container">

        <h3 class="admin-titles">Regler og retningslinjer</h3>

        <p class="subtitle">Lige som hos alle andre organisationer, har vi en kort række regler, der skal følges.</p>

        <div class="all-rules">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <section attr-rule_id="<?php echo $row['id']; ?>">
                    <div class="rules-content">
                        <div class="rule_id">
                            <h4>ID:</h4>
                            <h4><?php echo $row['id']?></h4>
                        </div>
                        <div class="rule">
                            <input type="text" class="rules" value="<?php echo $row['rules']?>">
                            <div class="bullet-points">
                                <div class="point">
                                    <p>1)</p>
                                    <input type="text" class="point_one" value="<?php echo $row['rules_point_one']?>">
                                </div>
                                <div class="point">
                                    <p>2)</p>
                                    <input type="text" class="point_two" value="<?php echo $row['rules_point_two']?>">
                                </div>
                                <div class="point">
                                    <p>3)</p>
                                    <input type="text" class="point_three" value="<?php echo $row['rules_point_three']?>">
                                </div>
                                <div class="point">
                                    <p>4)</p>
                                    <input type="text" class="point_four" value="<?php echo $row['rules_point_four']?>">
                                </div>
                                <div class="point">
                                    <p>5)</p>
                                    <input type="text" class="point_five" value="<?php echo $row['rules_point_five']?>">
                                </div>
                                <div class="point">
                                    <p>6)</p>
                                    <input type="text" class="point_six" value="<?php echo $row['rules_point_six']?>">
                                </div>
                                <div class="point">
                                    <p>7)</p>
                                    <input type="text" class="point_seven" value="<?php echo $row['rules_point_seven']?>">
                                </div>
                                <div class="point">
                                    <p>8)</p>
                                    <input type="text" class="point_eight" value="<?php echo $row['rules_point_eight']?>">
                                </div>
                                <div class="point">
                                    <p>9)</p>
                                    <input type="text" class="point_nine" value="<?php echo $row['rules_point_nine']?>">
                                </div>
                                <div class="point">
                                    <p>10)</p>
                                    <input type="text" class="point_ten" value="<?php echo $row['rules_point_ten']?>">
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="update-rule">
                                <button id="update-rule">Opdatér</button>
                            </div>                                    
                            <div class="delete-rule">
                                <button id="delete-rule">Slet</button>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
    </div> <!-- .container end -->
</div> <!-- .block-rules end -->