<head>
    <title>Potebandens Dyreservice | Om os</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-about">

    <div class="subhero">
        <div class="page-title">
            <h1>Om os</h1>
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
        <div class="block about">
            <div class="container">

                <!-- if logged in -->
                <?php if (isset($_SESSION["id"])) { ?>

                    <!-- include php blocks here -->

                <?php } // if (isset($_SESSION["username"])) end

                // if not logged in
                else { ?>
                    <div class="no_session">
                        <h1>Beklager!</h1>
                        <h2>Du skal være logget ind for at se denne side.</h2>
                    </div>
                <?php } ?>

            </div> <!-- .container end -->
        </div> <!-- .block .about end -->
    </div><!-- .page-content end -->

</div> <!-- .page-about end -->

<?php
    include_once("php-partials/blocks/footer/footer.php");
?>