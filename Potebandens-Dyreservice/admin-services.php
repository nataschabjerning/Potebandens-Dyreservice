<head>
    <title>Admin | Ydelser</title>
</head>

<?php
    include_once("php-partials/blocks/block-header/block-header.php");
?>

<div class="page-services">

    <div class="subhero">
        <!-- <div class="flowersbottom"></div> -->
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Admin | Ydelser</h1>
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
            </div>
            
            <div class="back">
                <a href="admin.php">
                    <i class="fa fa-arrow-left"></i>
                    <p>Til Oversigten</p>
                </a>
            </div>

        <!-- include php blocks here -->
        <?php
            include("php-partials/admin-blocks/block-admin-services/block-admin-services.php");      
        ?>

        <?php } // if (isset($_SESSION["username"])) end

        // if not logged in
        else { ?>
            <div class="block no_session">
                <h1>Beklager!</h1>
                <h2>Du skal være logget ind for at se denne side.</h2>
            </div> 
        <?php } ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/block-footer/block-footer.php");
?>