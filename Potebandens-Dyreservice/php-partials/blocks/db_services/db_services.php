<div class="block services">

    <div class="container">

        <div class="all-services">
            
            <?php
                include("../../../includes/connect.inc.php");

                $sql = "SELECT * FROM services ORDER BY service_name ASC;";
                $stmt = $conn->prepare($sql);
                mysqli_stmt_execute($stmt);
                $resultData = mysqli_stmt_get_result($stmt);
            ?>

            <h3>Oversigt over alle ydelser og priser i tabel</h3>
            <p>admin skal kunne oprette/opdatere/slette rækker i tabellen, som går ind og sletter fra db også (i admin-services.php)</p>
            
            <br>
            <hr>
            <br>

            <table>
                <tr>
                    <th>Ydelse</th>
                    <th>Hvor længe</th>
                    <th>Beskrivelse</th>
                    <th>Pris</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                    <tr>
                        <td><?php echo $row['service_name']?></td>
                        <td><?php echo $row['service_length']?></td>
                        <td><?php echo $row['service_description']?></td>
                        <td><?php echo $row['service_price']?> kr.</td>
                    </tr>
                <?php } ?>
            </table>
        
        </div>

    </div>

</div>