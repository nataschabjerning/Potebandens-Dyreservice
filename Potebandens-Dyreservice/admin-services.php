<head>
    <title>Potebandens Dyreservice | Ydelser og priser</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-services">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Ydelser og priser</h1>
            <h3>Administrator</h3>
        </div>
    </div>

    <div class="page-content">

        <div class="block services">

            <div class="container">

                <div class="all-services">
        
                    <?php
                        include("../../../includes/connect.inc.php");
                        include("../../../includes/functions.inc.php");

                        $sql = "SELECT * FROM services;";
                        $stmt = $conn->prepare($sql);
                        mysqli_stmt_execute($stmt);
                        $resultData = mysqli_stmt_get_result($stmt);
                    ?>

                    <div id="confirmation">
                        <div class="content">
                            <h2>Er du sikker på, at du gerne vil slette denne ydelse?</h2>
                            <div class="buttons">
                                <button class="confirm_delete">Yes</button>
                                <button class="cancel_delete">No</button>
                            </div>
                        </div>
                    </div>

                    <h3>Oversigt over alle ydelser og priser i tabel</h3>
                    <p>admin skal kunne oprette/opdatere/slette rækker i tabellen, som går ind og sletter fra db også (i admin-services.php)</p>

                    <br>
                    <hr>
                    <br>

                    <?php if (isset($_SESSION["username"])) { ?>
                        <div class="form">
                            <div class="success">
                                <p style="color: darkred; font-weight: 600;">confirmation text when service has been created</p>
                            </div>
                            <p style="color: green; font-weight: 600;">virker</p>
                            <h3>Opret ny ydelse</h3>
                            <br>
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "emptyinput") {
                                        echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Hov!</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Det ser ud som om du har glemt at udfylde et af felterne!</p>";
                                    }
                                }
                            ?>
                            <br>  
                            <form action="includes/newservice.inc.php" method="post">
                                <div class="label">
                                    <label for='service_name'>Ydelse</label>
                                    <div class="input">
                                        <input type='text' name='service_name'>
                                    </div>
                                </div>
                                <div class="label">
                                    <label for='service_length'>Hvor længe</label>
                                    <div class="input">
                                        <input type='text' name='service_length'>
                                    </div>                            
                                </div>
                                <div class="label">
                                    <label for='service_description'>Beskrivelse</label>
                                    <div class="input">
                                        <input type='text' name='service_description'>
                                    </div>                            
                                </div>
                                <div class="label">
                                    <label for='service_price'>Pris</label>
                                    <div class="input">
                                        <input type='text' name='service_price'>
                                    </div>                            
                                </div>
                                <div class="button">
                                    <button type="submit" name="add-service">Opret ydelse</button>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
        
                    <br>
                    <hr>
                    <br>

                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Ydelse</th>
                            <th>Hvor længe</th>
                            <th>Beskrivelse</th>
                            <th>Pris</th>
                            <?php if (isset($_SESSION["username"])) { ?>
                                <th>Opdater/Slet</th>
                            <?php } ?>
                        </tr>

                        <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                            
                            <tr attr-service_id="<?php echo $row['id']; ?>">
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['service_name']?></td>
                                <td><?php echo $row['service_length']?></td>
                                <td><?php echo $row['service_description']?></td>
                                <td><?php echo $row['service_price']?> kr.</td>
                                <?php if (isset($_SESSION["username"])) { ?>
                                    <td class="buttons">
                                        <div class="update">
                                            <p style="color: orange; font-weight: 600;">to do</p>
                                            <button class="update-service">Opdater</button>
                                        </div>                                    
                                        <div class="delete">
                                            <p style="color: green; font-weight: 600;">virker</p>
                                            <button class="delete-service">Slet</button>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>
    
                </div>

            </div>

        </div>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>