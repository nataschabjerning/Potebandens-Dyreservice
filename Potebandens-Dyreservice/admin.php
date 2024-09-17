<head>
    <title>Potebandens Dyreservice | Ydelser og priser</title>
</head>

<?php
    include_once("php-partials/blocks/header/header.php");
?>

<div class="page-services">

    <div class="subhero">
        <div class="overlay"></div>
        <div class="page-title">
            <h1>Administrator Side</h1>
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

        <div class="block admin">

            <div class="container">
                <!-- if logged in -->
                <?php if (isset($_SESSION["id"])  || isset($_SESSION["username"])) { ?>
                    
                    <h2>Liste over muligheder som admin</h2>

                    <ul>
                        <li><a href="profile.php">Administrér Brugere</a></li>
                        <li><a href="login.php">Opret Bruger</a></li>
                        <li><a href="admin-about.php">Ret 'Om os'</a></li>
                        <li><a href="admin-contact.php">Ret 'Kontakt os'</a></li>
                        <li><a href="admin-services.php">Ret 'Ydelser og priser'</a></li>
                    </ul>

                    <h3>Lav CRUD over disse sider, så admin kan rette informationer der vises</h3>

                    <h3>- 'Om os' linker til side der har en tabel(eller andet) der viser alt info skrevet på den side</h3>
                    <h3>- 'Kontakt os' linker til side der har en tabel(eller andet) der viser telefonnummer, email osv.</h3>
                    <h3>- 'Ydelser og priser' linker til side der har en tabel over alle ydelser og priser</h3>
                
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

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>