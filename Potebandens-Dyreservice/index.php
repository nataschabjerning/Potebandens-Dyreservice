<?php
    include_once("php-partials/blocks/block-header/block-header.php");
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
            include("php-partials/blocks/block-us/block-us.php");
            include("php-partials/blocks/block-service-slider/block-service-slider.php");
            include("php-partials/blocks/block-info/block-info.php");
            include("php-partials/blocks/block-gallery-slider/block-gallery-slider.php");
            include("php-partials/blocks/block-questions/block-questions.php");
        ?>

    </div>

</div>

<?php
    include_once("php-partials/blocks/block-footer/block-footer.php");
?>