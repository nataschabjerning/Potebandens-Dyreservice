<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../../Images/Logo/logo-multicolor.png">
        <link rel="stylesheet" href="css/style.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <title>Potebandens Dyreservice</title>
    </head>

    <body>

        <div class="header">
            <div class="container">
                
                <?php
                    include_once("includes/connect.inc.php");
                    include("php-partials/components/logo.php");
                ?>

                <nav class="site-navigation">
                    <ul class="nav-items">
                        <?php 
                            if (isset($_SESSION["id"])  || isset($_SESSION["username"])) {
                                echo "<li><a href='admin.php'>Admin</a></li>";
                                echo "<li class='logout'><a href='includes/logout.inc.php'>Log out</a></li>";
                            }
                            else {
                                echo "<li class='login'><a href='login.php'>Admin</a></li>";
                            }
                        ?>
                        <li><a href="index.php">Forside</a></li>
                        <li><a href="services.php">Ydelser</a></li>
                        <li><a href="gallery.php">Galleri</a></li>
                        <li><a href="about.php">Om os</a></li>
                        <li><a href="contact.php">Kontakt</a></li>
                    </ul>

                    <div class="mobile-menu">
                        
                        <div id="menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                        <div class="menu-content">
                            <ul class="mobile-nav-items">
                                <?php 
                                    if (isset($_SESSION["id"])  || isset($_SESSION["username"])) {
                                        echo "<li><a href='admin.php'>Admin</a></li>";
                                        echo "<li class='logout'><a href='includes/logout.inc.php'>Log out</a></li>";
                                    }
                                    else {
                                        echo "<li class='login'><a href='login.php'>Admin</a></li>";
                                    }
                                ?>
                                <li><a href="index.php">Forside</a></li>
                                <li><a href="services.php">Ydelser | Priser</a></li>
                                <li><a href="about.php">Om os</a></li>
                                <li><a href="contact.php">Kontakt</a></li>
                            </ul>
                        </div>

                    </div>

                </nav>

            </div>
        </div>