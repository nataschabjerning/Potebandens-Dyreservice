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

                    <h3>Oversigt over alle ydelser og priser i tabel</h3>

                    <?php if (isset($_SESSION["username"])) { ?>
                        <div class="form">
                            <?php
                                if (isset($_GET["error"])) {
                                    if ($_GET["error"] == "emptyinput") {
                                        echo "<p style=\"text-align:center;font-size:1.4rem;font-weight:bold;color:red;\">Hov!</p>";
                                        echo "<p style=\"text-align:center;font-size:1.2rem;font-weight:bold;color:red;\">- Det ser ud som om du har glemt at udfylde et af felterne!</p>";
                                    }
                                }
                            ?>

                            <!-- error msg if values are not approved -->
                            <div id="error_create"></div>

                            <div class="show_hide">
                                <button id="show_add_form">Tilføj Ydelse</button>
                                <button id="hide_add_form">Skjul formular</button>
                            </div>

                            <div id="new_service">
                                <table class="new_service">
                                    <tr>
                                        <th>Ydelse</th>
                                        <td>
                                            <input type="text" class="service_name" name="service_name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hvor længe</th>
                                        <td>
                                            <input type="text" class="service_length" name="service_length">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Beskrivelse</th>
                                        <td>
                                            <input type="text-area" class="service_description" name="service_description">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pris</th>
                                        <td>
                                            <input type="text" class="service_price" name="service_price">
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- fix to make button fill entire width of bottom cell -->
                                        <td class="button">
                                            <button id="create-service">Create</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    <?php } ?>
        
                    <hr>

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
                                <td>
                                    <?php echo $row['id']?>
                                </td>
                                <td>
                                    <input type="text" class="service_name" value="<?php echo $row['service_name']?>">
                                </td>
                                <td>
                                    <input type="text" class="service_length" value="<?php echo $row['service_length']?>">
                                </td>
                                <td>
                                    <input type="text" class="service_description" value="<?php echo $row['service_description']?>">
                                </td>
                                <td>
                                    <input type="text" class="service_price" value="<?php echo $row['service_price']?>"> kr.
                                </td>
                                <?php if (isset($_SESSION["username"])) { ?>
                                    <td class="buttons">
                                        <div class="update">
                                            <p style="color: green; font-weight: 600;">virker</p>
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