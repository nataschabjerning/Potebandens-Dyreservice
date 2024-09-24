<div class="block services">

    <div class="container">

        <div class="all-services">
            
            <?php
                include("includes/connect.inc.php");

                $sql = "SELECT * FROM services ORDER BY service_name ASC;";
                $stmt = $conn->prepare($sql);
                mysqli_stmt_execute($stmt);
                $resultData = mysqli_stmt_get_result($stmt);
            ?>

            <h1>Lav oversigt om til 'kort' i stedet for pænere bruger oversigt</h1>
            
            <h3>Oversigt over alle ydelser og priser i tabel</h3>
            
            <br>
            <hr>
            <br>

            <table>
                <tr>
                    <th>Ydelse</th>
                    <th>Hvor længe</th>
                    <th>Beskrivelse</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                    <tr>
                        <td><?php echo $row['service_name']?></td>
                        <td><?php echo $row['service_length']?></td>
                        <td><?php echo $row['service_description']?></td>
                    </tr>
                <?php } ?>
            </table>
        
        </div>

    </div>

</div>