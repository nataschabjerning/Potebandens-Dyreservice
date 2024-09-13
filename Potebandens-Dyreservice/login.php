<head>
    <title>Potebandens Dyreservice | Ydelser og priser</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-login">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Log ind</h1>
        </div>
    </div>

    <div class="page-content">

        <div class="container">

            <div class="block admin">

                <?php
                    include("includes/register-login/login.php");
                    include("includes/register-login/registration.php");
                ?>

            </div>

        </div>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>