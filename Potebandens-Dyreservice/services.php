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
            <h1>Ydelser</h1>
        </div>
    </div>

    <div class="page-content">

    <!-- if logged in -->
    <?php if (isset($_SESSION["id"])  || isset($_SESSION["username"])) { ?>

        <div class="subheader">
            <div class="logged-in">
                <h3>Du er logget ind som</h3>
                <h2><?php echo $_SESSION["username"]; ?></h2>
            </div>

            <div class="back">
                <a href="admin.php">Til Oversigten</a>
            </div>
        </div>

        <!-- include php blocks here -->
        <?php
            include("php-partials/blocks/admin/services/services.php");      
        ?>

        <?php } // if (isset($_SESSION["username"])) end

        // if not logged in
        else { ?>
        <div class="no_session">
            <?php
                include("php-partials/blocks/db_services/db_services.php");
            ?>  
        <?php } ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>