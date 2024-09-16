<head>
    <title>Potebandens Dyreservice | Log Ind</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-login">

    <div class="page-content">

        <div class="container">

            <div class="block admin">

                <?php
                    include("includes/login.inc.php");
                    // if logged in
                    if (isset($_SESSION["id"])) {
                        include("includes/changepassword.inc.php");
                        include("includes/signup.inc.php");
                    }
                ?>

            </div>

        </div>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>