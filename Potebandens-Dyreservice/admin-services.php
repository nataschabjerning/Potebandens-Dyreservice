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
            <?php 
                if (isset($_SESSION["id"])) {
                    echo "<h3>" . $_SESSION["username"] . "</h3>";
                }
                else {
                    echo "<h3>Administrator</h3>";
                }
            ?>
        </div>
    </div>

    <div class="page-content">
        <div class="block services">
            <div class="container">
                <!-- if logged in -->
                <?php if (isset($_SESSION["id"])) { ?>
                    <div class="all-services">
    
                        <?php
                            include("../../../includes/connect.inc.php");
                            include("../../../includes/functions.inc.php");

                            $sql = "SELECT * FROM services ORDER BY id DESC;";
                            $stmt = $conn->prepare($sql);
                            mysqli_stmt_execute($stmt);
                            $resultData = mysqli_stmt_get_result($stmt);
                        ?>

                        <div id="confirmation-delete">
                            <div class="content">
                                <h2>Er du sikker på, at du gerne vil slette denne ydelse?</h2>
                                <div class="buttons">
                                    <button class="confirm_delete">Yes</button>
                                    <button class="cancel_delete">No</button>
                                </div>
                            </div>
                        </div>

                        <div id="confirmation-update">
                            <div class="content">
                                <h2>Er du sikker på, at du gerne vil opdatere denne ydelse?</h2>
                                <div class="buttons">
                                    <button class="confirm_update">Yes</button>
                                    <button class="cancel_update">No</button>
                                </div>
                            </div>
                        </div>

                        <div class="form">
                            <!-- message div for success when creating/updating service -->
                            <div id="alertMessage"></div>

                            <div class="show_hide">
                                <div id="show_add_form">Tilføj Ydelse</div>
                                <div id="hide_add_form">Skjul formular</div>
                            </div>

                            <div id="new_service">
                                <table class="new_service">
                                    <tr>
                                        <th>Ydelse</th>
                                        <td><input type="text" class="service_name" name="service_name"></td>
                                    </tr>
                                    <tr>
                                        <th>Hvor længe</th>
                                        <td><input type="text" class="service_length" name="service_length"></td>
                                    </tr>
                                    <tr>
                                        <th>Beskrivelse</th>
                                        <td><input type="text" class="service_description" name="service_description"></td>
                                    </tr>
                                    <tr>
                                        <th>Pris</th>
                                        <td><input type="text" class="service_price" name="service_price"></td>
                                    </tr>
                                </table>
                                    <div class="button">
                                        <!-- fix to make button fill entire width of bottom cell -->
                                        <button id="create-service">Opret ydelse</button>
                                    </div>
                            </div> <!-- .new_service end -->
                        </div> <!-- .form end -->
    
                        <hr>

                        <h3>Oversigt over alle ydelser og priser i tabel</h3>

                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Ydelse</th>
                                <th>Hvor længe</th>
                                <th>Beskrivelse</th>
                                <th>Pris</th>
                                <th>Opdater/Slet</th>
                            </tr>

                            <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                            
                                <tr attr-service_id="<?php echo $row['id']; ?>">
                                    <td><?php echo $row['id']?></td>
                                    <td><input type="text" class="service_name" value="<?php echo $row['service_name']?>"></td>
                                    <td><input type="text" class="service_length" value="<?php echo $row['service_length']?>"></td>
                                    <td><input type="text" class="service_description" value="<?php echo $row['service_description']?>"></td>
                                    <td><input type="text" class="service_price" value="<?php echo $row['service_price']?>"> kr.</td>
                                    <?php if (isset($_SESSION["username"])) { ?>
                                        <td class="buttons">
                                            <div class="update">
                                                <button class="update-service">Opdater</button>
                                            </div>                                    
                                            <div class="delete">
                                                <button class="delete-service">Slet</button>
                                            </div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div> <!-- .all-services end -->
                <?php } // if (isset($_SESSION["username"])) end

                // if not logged in
                else { ?>
                    <div class="no_session">
                        <h1>Beklager!</h1>
                        <h2>Du skal være logget ind for at se denne side.</h2>
                    </div>
                <?php } ?>

            </div> <!-- .container end -->
        </div> <!-- .block .services end -->
    </div> <!-- .page-content end -->

</div> <!-- .page-services end -->

<?php
    include_once("php-partials/blocks/footer/footer.php");
?>