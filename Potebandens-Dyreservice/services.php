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
        </div>
    </div>

    <div class="page-content">

        <?php
            include("php-partials/blocks/db_services/db_services.php");
        ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>