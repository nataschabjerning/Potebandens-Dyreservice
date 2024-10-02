<head>
    <title>Potebandens Dyreservice | Profil</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-profile">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Profil</h1>
        </div>
    </div>
    
    <div class="page-content">

        <!-- if logged in show page content -->
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

            <?php
                include("php-partials/blocks/admin/create-update_user/create-update_user.php");
                include("php-partials/blocks/admin/users/users.php");
            ?>
            

        <?php } // if (isset($_SESSION["id"])) end

        // if not logged in
        else { ?>
            <div class="no_session">
                <h1>Beklager!</h1>
                <h2>Du skal være logget ind for at se denne side.</h2>
            </div>
        <?php } ?>
        
    </div>
</div>

<?php
    include_once("php-partials/blocks/footer/footer.php");
?>