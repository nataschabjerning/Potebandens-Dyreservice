<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM services ORDER BY service_name ASC;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block services">

    <div class="service-inner">
        <div class="container">

            <div class="all-services">
                
                <div class="service-cards">
        
                    <?php while($row = mysqli_fetch_assoc($resultData)) { ?>

                        <div class="card">
                            <a href="contact.php" class="contact">
                                <p>Kontakt Lonni for mere info</p>
                            </a>
                            <?php if (!empty($row['service_name'])) { ?>
                                <div class="title">
                                    <h2><?php echo $row['service_name']?></h2>
                                </div>
                            <?php } ?>

                            <hr>

                            <div class="description">
                                <?php if (!empty($row['service_description_one'])) { ?>
                                    <p class="service_description_one"><?php echo $row['service_description_one']?></p>
                                <?php } ?>
                                <?php if (!empty($row['service_description_two'])) { ?>
                                    <p class="service_description_two"><?php echo $row['service_description_two']?></p>
                                <?php } ?>
                                <?php if (!empty($row['service_description_three'])) { ?>
                                    <p class="service_description_three"><?php echo $row['service_description_three']?></p>
                                <?php } ?>
                                <?php if (!empty($row['service_description_four'])) { ?>
                                    <p class="service_description_four"><?php echo $row['service_description_four']?></p>
                                <?php } ?>
                                <?php if (!empty($row['important_note'])) { ?>
                                    <p class="important_note"><?php echo $row['important_note']?></p>
                                <?php } ?>
                            </div>

                        </div>

                    <?php } ?> <!-- while loop end -->
            
                </div> <!-- .service-cards end -->
            
            </div> <!-- .all-services end -->

        </div>  <!-- .container end -->
    </div>  <!-- .service-inner end -->

</div> <!-- .block .services end -->