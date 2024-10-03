<div class="block service-slider">

    <div class="container">

        <div class="top">
            <div class="title">
                <h3>Vores ydelser</h3>
                <a href="services.php" target="_blank">Vis alle</a>
            </div>
            <div class="arrows">
                <button class="service-prev"><i class="fa fa-chevron-left"></i></button>
                <button class="service-next"><i class="fa fa-chevron-right"></i></button>
            </div>
        </div>

        <?php
            include("includes/connect.inc.php");
            include("includes/functions.inc.php");

            $sql = "SELECT * FROM services ORDER BY id DESC LIMIT 6;";
            $stmt = $conn->prepare($sql);
            mysqli_stmt_execute($stmt);
            $resultData = mysqli_stmt_get_result($stmt);
        ?>

        <div class="slider">
            
            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                <div class="slide">
                        <div class="overlay"></div>
                        <div class="service-content">
                            <div class="text">
                                <h3><?php echo $row['service_name']?></h3>
                                <p><?php echo $row['service_short_description']?></p>
                            </div>
                        </div>
                    
                </div>
            <?php } ?>
            
        </div>

    </div>

</div>