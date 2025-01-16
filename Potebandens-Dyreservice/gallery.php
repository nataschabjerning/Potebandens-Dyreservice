<head>
    <title>Galleri</title>
</head>

<?php
    include_once("php-partials/blocks/block-header/block-header.php");
?>


<div class="page-contact">

    <div class="subhero">
        <div class="page-title">
            <h1>Galleri</h1>
        </div>
    </div>

    <div class="page-content">

        <!-- img leaves under every subhero -->
        <div class="leavestop"></div>
                
        <?php
            include("php-partials/blocks/block-gallery/block-gallery.php");
            include("php-partials/blocks/block-questions/block-questions.php");
        ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/block-footer/block-footer.php");
?>