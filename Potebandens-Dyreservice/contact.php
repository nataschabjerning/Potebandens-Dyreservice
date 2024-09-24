<head>
    <title>Potebandens Dyreservice | Kontakt Os</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>


<div class="page-contact">

    <div class="subhero">
        <div class="page-title">
            <h1>Kontakt os</h1>
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

            <!-- include admin php blocks here -->

        <?php } // if (isset($_SESSION["username"])) end

        // if not logged in
        else { ?>
            <div class="no_session">
                <!-- include user php blocks here -->
                <?php
                    include("php-partials/blocks/sendemail/sendemail.php");
                ?>
            </div>
        <?php } ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>