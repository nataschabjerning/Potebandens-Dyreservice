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
            <?php 
                if (isset($_SESSION["id"])) {
                    echo "<h1>" . $_SESSION["username"] . "</h1>";
                }
            ?>
        </div>
    </div>

    <div class="page-content">

        <div class="block admin">

            <div class="container">

                <h2>Liste over muligheder som admin</h2>

                <br>

                <ul>
                    <li><a href="admin-about.php">Ret 'Om os'</a></li>
                    <li><a href="admin-contact.php">Ret 'Kontakt os'</a></li>
                    <li><a href="admin-services.php">Ret 'Ydelser og priser'</a></li>
                </ul>

                <br>

                <h3>Lav CRUD over disse sider, så admin kan rette informationer der vises</h3>

                <br>

                <h3>- 'Om os' linker til side der har en tabel(eller andet) der viser alt info skrevet på den side</h3>
                <h3>- 'Kontakt os' linker til side der har en tabel(eller andet) der viser telefonnummer, email osv.</h3>
                <h3>- 'Ydelser og priser' linker til side der har en tabel over alle ydelser og priser</h3>

            </div>

        </div>

    </div>

</div>


<?php
    include_once("php-partials/blocks/footer/footer.php");
?>