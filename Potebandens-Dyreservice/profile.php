<head>
    <title>Potebandens Dyreservice | Administrér Brugere</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-profile">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Profil</h1>
            <?php 
                if (isset($_SESSION["id"])  || isset($_SESSION["username"])) {
                    echo "<h3>" . $_SESSION["username"] . "</h3>";
                }
                else {
                    echo "<h3>Administrator</h3>";
                }
            ?>
        </div>
    </div>
    
    <div class="page-content">

            <!-- include php blocks here -->
            <?php
                include("php-partials/blocks/update-users/users.php");
            ?>
            
    </div>
</div>

<?php
    include_once("php-partials/blocks/footer/footer.php");
?>