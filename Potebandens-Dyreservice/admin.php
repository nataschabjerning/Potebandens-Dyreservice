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
            <h1>Administrator Side</h1>
            <?php 
                if (isset($_SESSION["id"])  || isset($_SESSION["username"])) {
                    echo "<h3>" . $_SESSION["username"] . "</h3>";
                }
                else {
                    echo "<h3>Administrator</h3>";
                }
            ?>
        </div>
    </div>

    <div class="page-content">

        <!-- if logged in -->
        <?php if (isset($_SESSION["id"])  || isset($_SESSION["username"])) { ?>

            <div class="logged-in">
                <h3>Du er logget ind som</h3>
                <h2><?php echo $_SESSION["username"]; ?></h2>
            </div>
            
            <!-- include php blocks here -->
            <?php
                include("php-partials/blocks/admin/list/list.php");      
            ?>
        
        <?php } // if (isset($_SESSION["id"])) end

        // if not logged in
        else { ?>
            <div class="no_session">
                <h1>Beklager!</h1>
                <h2>Du skal være logget ind for at se denne side.</h2>
            </div>
        <?php } ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>