<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM services ORDER BY id DESC LIMIT 6;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block service-slider-block">
    <div class="container">

        <h2 class="admin-titles">Hvad tilbyder vi?</h2>

        <div class="top">
            <div class="title">
                <a href="services.php">Se alle ydelser</a>
            </div>
            <div class="arrows">
                <button class="service-prev">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="service-next">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div> <!-- .top end -->

        <!-- if there is services in db table -->
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="service-slider">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="slide">
                        <div class="service-content">
                            <div class="icon">
                                <img src="../../../images/logo/logo-multicolor.png" alt="Potebandens Dyreservice Logo">
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
            </div> <!-- .service-slider end -->
        <?php } 
        else { ?>
            <!-- if no services in db table -->
            <div class="empty">
                <h2>Der ser ikke ud til at være nogle ydelser slået op i øjeblikket</h2>
                <h1>Men du kan altid kontakte os <a href="contact.php">her</a></h1>
         </div>
        <?php } ?>
    </div> <!-- .container end -->
</div> <!-- .block .service-slider end -->