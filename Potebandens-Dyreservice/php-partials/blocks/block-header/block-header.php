<?php
    session_start();
    include_once("includes/connect.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- SEO () -->
        <meta name="keywords" content="Dyr, Hunde, Pasning, Dyreservice, Potebanden, Potebandens Dyreservice, Lonni Danielsen, Lonni, Natascha, Natascha Bjerning, Hundepasning, Hundebørnehave, Hundelegestue, Dyrepasning">
        <meta name="author" content="Natascha Bjerning">
        <meta name="description" content="Potebandens Dyreservice hjælper dig med at passe din hund. Hos os får din hund sin daglige dosis af kærlighed og bliver samtidig aktiveret ved hvert besøg.">

        <!-- favicon -->
        <link rel="icon" type="image/x-icon" href="../../../images/logo/logo.png">
        
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- enable ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <!-- enable slick slider js -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

        <!-- custom js -->
        <script src="js/script.js"></script>
        <!-- custom style sheet -->
        <link rel="stylesheet" href="css/style.scss">

        <title>Potebandens Dyreservice</title>
    </head>

    <body>

        <div class="header">
            <div class="container">
                <?php
                    // so alert messages can be shown when creating/updating/deleting or sending msg to admin inbox
                    include("php-partials/components/alert/alert.php");
                    include("php-partials/components/logo/logo.php");
                ?>
                <nav class="site-navigation">
                    <ul class="nav-items">
                        <?php 
                        // if logged in - show admin(page) and log out buttons
                            if (isset($_SESSION["id"])  || isset($_SESSION["username"])) {
                                echo "<li><a href='admin.php'>Admin</a></li>";
                                echo "<li class='logout'><a href='includes/user/logout.inc.php'>Log out</a></li>";
                            }
                            // if not logged in - show admin button
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

                    <!-- navigation for mobile -->
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
                                <li><a href="services.php">Ydelser</a></li>
                                <li><a href="gallery.php">Galleri</a></li>
                                <li><a href="about.php">Om os</a></li>
                                <li><a href="contact.php">Kontakt</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- leaves border on bottom of nav bar -->
            <div class="fallleavesbottom"></div>
        </div>