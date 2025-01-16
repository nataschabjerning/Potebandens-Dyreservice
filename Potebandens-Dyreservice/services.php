<head>
    <title>Ydelser</title>
</head>

<?php
    include_once("php-partials/blocks/block-header/block-header.php");
?>

<div class="page-services">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Ydelser</h1>
        </div>
    </div>

    <div class="page-content">

        <!-- img leaves under every subhero -->
        <div class="leavestop"></div>

        <?php
            include("php-partials/blocks/block-services/block-services.php");
            include("php-partials/blocks/block-questions/block-questions.php");
        ?>  

    </div>

</div>


<?php
    include_once("php-partials/blocks/block-footer/block-footer.php");
?>