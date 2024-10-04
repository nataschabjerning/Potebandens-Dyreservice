<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM about;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block about">

    <div class="container">

        <h1>Måske lave det til et while() loop og gøre det muligt at rette i, ligesom ydelser og galleri</h1>

        <br>
        <br>
        <br>
    
        <div class="content">
        <div class="me">
            <div class="image">
                <img src="../../../../Images/website/Lonni.jpg" alt="Lonni">
            </div>
            <div class="intro">
                <h1>Lonni A. Danielsen</h1>
                <p class="one">Jeg er dyreadfærdsterapeut og jeg elsker dyr.</p>
                <p class="two">Jeg har haft hund, katte og en enkelt hest, i løbet af de sidste 30-35 år.</p>
                <p class="three">Lige nu, har jeg Mulle, en lille dværgpuddel på 5 år.</p>
                <p class="four">Jeg har boet i Solkær i lidt over et år, og er vild med området.</p>
                <p class="five">Jeg syntes dog, at der manglede noget til hunde og hundejere, så jeg oprettede <span>Hunde Legestuen</span>.</p>
                <p class="six">Jeg er nu gået et skridt videre og har lavet <span>Hunde Børnehaven</span>.</p>
                <p class="seven">Har du behov for en hundesitter? <br> Måske fordi du skal i byen eller på weekend, og ikke kan have hunden med? <br>Ring endelig, og så finder vi nok ud af noget.</p>
            </div>
        </div>
        </div>
        

        <br>
        <br>
        <br>
        <hr>
        <br>
        <br>
        <br>

        <h1>Måske lave samme funktion her som i galleri, hvis billeder skal skiftes ud løbende</h1>
        
        <br>
        <br>
        <br>

        <div class="photos">
            <img src="" alt="">
        </div>

    </div> <!-- .container end -->

</div> <!-- .block .about end -->