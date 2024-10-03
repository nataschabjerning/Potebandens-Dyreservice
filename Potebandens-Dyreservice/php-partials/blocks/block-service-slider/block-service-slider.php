<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM services ORDER BY id DESC LIMIT 6;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block service-slider-block">

    <div class="container">

        <div class="top">
            <div class="title">
                <h3>Vores ydelser</h3>
                <a href="services.php">Vis alle</a>
            </div>
            <div class="arrows">
                <button class="service-prev"><i class="fa fa-chevron-left"></i></button>
                <button class="service-next"><i class="fa fa-chevron-right"></i></button>
            </div>
        </div> <!-- .top end -->

        <div class="service-slider">
            
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <div class="slide">
                    <div class="service-content">
                        <div class="icon">
                            <img src="../../../Images/Logo/logo-multicolor.png" alt="Potebandens Dyreservice Logo">
                        </div>
                        <div class="text">
                            <?php if (!empty($row['service_name'])) { ?>
                                <h2><?php echo $row['service_name']?></h2>
                            <?php } ?>
                            <?php if (!empty($row['service_short_description'])) { ?>
                                <p><?php echo $row['service_short_description']?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?> <!--  while() end -->
            
        </div> <!-- .slider end -->

    </div> <!-- .container end -->

</div> <!-- .block .service-slider end -->