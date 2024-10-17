<head>
    <title>Admin | Beskeder</title>
</head>

<?php
    include_once("php-partials/blocks/block-header/block-header.php");
?>

<div class="page-services">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Beskeder</h1>
        </div>
    </div>

    <div class="page-content">

        <?php
            include("php-partials/admin-blocks/block-admin-inbox/block-admin-inbox.php");
        ?>  

    </div>

</div>


<?php
    include_once("php-partials/blocks/block-footer/block-footer.php");
?>