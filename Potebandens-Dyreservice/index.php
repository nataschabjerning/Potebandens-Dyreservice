<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-index">

    <div class="hero">
    <div class="overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1>Potebandens Dyreservice</h1>
                <h3>Vores dyr er en del af familien..... <span>Pas godt på dem</span></h3>
            </div>
        </div>
    </div>

    <div class="page-content">

        <?php
            // <!-- include() php components here -->
            include("php-partials/blocks/info/info.php");
            include("php-partials/blocks/service-slider/service-slider.php");
        ?>

    </div>

</div>

<?php
    include_once("php-partials/blocks/footer/footer.php");
?>