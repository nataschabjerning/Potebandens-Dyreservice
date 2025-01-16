<head>
    <title>Kontakt Os</title>
</head>

<?php
    include_once("php-partials/blocks/block-header/block-header.php");
?>


<div class="page-contact">

    <div class="subhero">
        <div class="page-title">
            <h1>Kontakt os</h1>
        </div>
    </div>

    <div class="page-content">

        <!-- img leaves under every subhero -->
        <div class="leavestop"></div>

        <?php
            include("php-partials/blocks/block-contact/block-contact.php");
            include("php-partials/blocks/block-openinghours/block-openinghours.php");
            include("php-partials/components/creator/creator.php");
            include("php-partials/blocks/block-rules/block-rules.php");
        ?>

    </div>

</div>


<?php
    include_once("php-partials/blocks/block-footer/block-footer.php");
?>