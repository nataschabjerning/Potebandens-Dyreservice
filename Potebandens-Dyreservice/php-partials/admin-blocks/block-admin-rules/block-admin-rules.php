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

        <p class="update-info">Vil du opdatere én eller flere regler?<br>- Ret i det ønskede tekstfelt og tryk herefter på 'opdatér'</p>

        <div class="all-rules">
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <section attr-rules_id="<?php echo $row['id']; ?>">
                    <div class="rules-content">
                        <div class="rule_id">
                            <h4>ID:</h4>
                            <h4><?php echo $row['id']?></h4>
                        </div>
                        <div class="rule">
                            <input type="text" class="rules" value="<?php echo $row['rules']?>">
                            <div class="bullet-points">
                                <div class="bullet-points-top">
                                    <div class="point">
                                        <!-- point one -->
                                        <p class="point-numb">1:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_one"><?php echo $row['rules_point_one']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point two -->
                                        <p class="point-numb">2:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_two"><?php echo $row['rules_point_two']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point three -->
                                        <p class="point-numb">3:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_three"><?php echo $row['rules_point_three']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point four -->
                                        <p class="point-numb">4:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_four"><?php echo $row['rules_point_four']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point five -->
                                        <p class="point-numb">5:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_five"><?php echo $row['rules_point_five']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="bullet-points-bottom">
                                    <div class="point">
                                        <!-- point six -->
                                        <p class="point-numb">6:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_six"><?php echo $row['rules_point_six']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point seven -->
                                        <p class="point-numb">7:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_seven"><?php echo $row['rules_point_seven']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point eight -->
                                        <p class="point-numb">8:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_eight"><?php echo $row['rules_point_eight']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point nine -->
                                        <p class="point-numb">9:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_nine"><?php echo $row['rules_point_nine']?></textarea>
                                        </div>
                                    </div>
                                    <div class="point">
                                        <!-- point ten -->
                                        <p class="point-numb">10:</p>
                                        <div class="input">
                                            <div class="pull-tab"></div>
                                            <textarea class="point_ten"><?php echo $row['rules_point_ten']?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="update-rules">
                                <button id="update-rule">Opdatér</button>
                            </div>                                    
                            <div class="delete-rules">
                                <button id="delete-rule">Slet</button>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
    </div> <!-- .container end -->
</div> <!-- .block-rules end -->