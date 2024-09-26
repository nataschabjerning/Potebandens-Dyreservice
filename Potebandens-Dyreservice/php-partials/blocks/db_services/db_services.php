<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM services ORDER BY service_name ASC;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block services">

    <div class="container">

        <div class="all-services">

            <h1>Lav oversigt om til 'kort' i stedet, for pænere bruger oversigt</h1>
            
            <hr>

            <div class="service-cards">
    
                <?php while($row = mysqli_fetch_assoc($resultData)) { ?>

                    <div class="card">

                        <div class="title">
                            <h2><?php echo $row['service_name']?></h2>
                        </div>

                        <div class="description">
                            <p><?php echo $row['service_description_one']?></p>
                            <?php if (!empty($row['service_description_two'])) { ?>
                                <p><?php echo $row['service_description_two']?></p>
                            <?php } ?>
                            <?php if (!empty($row['service_description_three'])) { ?>
                                <p><?php echo $row['service_description_three']?></p>
                            <?php } ?>
                            <?php if (!empty($row['service_description_four'])) { ?>
                                <p><?php echo $row['service_description_four']?></p>
                            <?php } ?>
                            <?php if (!empty($row['important_note'])) { ?>
                                <p><?php echo $row['important_note']?></p>
                            <?php } ?>
                        </div>

                    </div>

                <?php } ?> <!-- while loop end -->
        
            </div> <!-- .service-cards end -->
        
        </div> <!-- .all-services end -->

    </div>  <!-- .container end -->

</div> <!-- .block .services end -->