<div class="block contact">

    <div class="container">

        <h1>styling og formulering til denne info</h1>
        <h2>Hvordan kan du kontakte os?</h2>
        <h3>- Skriv en email</h3>
        <h3>- Ring eller send en sms til telefonnummer</h3>
        <h3>- Udfyld formen nedenfor og vi vender tilbage snarest</h3>

        <br>
        <br>
        <hr>
        <br>
        <br>

        <h3>loop igennem info, som hentes fra contact table og lav ny boks pr. person</h3>

        <div class="phone-time">
            <h3>Telefontid</h3>
            <div class="time">
                <p>Mandag: 9:00 - 15:00</p>
                <p>Tirsdag: 9:00 - 15:00</p>
                <p>Onsdag: 9:00 - 15:00</p>
                <p>Torsdag: 9:00 - 15:00</p>
                <p>Fredag: 9:00 - 15:00</p>
                <p>Lørdag: Lukket</p>
                <p>Søndag: Lukket</p>
            </div>
        </div>
        <div class="contact-wrapper">
            <div class="contact-options">
                <div class="name">
                    <h2>Lonni A. Danielsen</h2>
                </div>
                <div class="work_title">
                    <p>Dyreadfærdsterapeut</p>
                </div>
                <div class="phone">
                    <div class="number">
                        <h3>Mobil</h3>
                        <p>53541944</p>
                    </div>
                </div>
                <div class="email">
                    <h3>Email</h3>
                    <!-- <p>lonni1964@gmail.com</p> -->
                    <a href="lonni1964@gmail.com">lonni1964@gmail.com</a>
                </div>
                <div class="adress">
                    <h3>Adresse</h3>
                    <p>Solkær 34, St. Th.</p>
                    <p>2605 Brøndby</p>
                </div>
            </div>
        </div> <!-- .contact-wrapper end -->

        <br>
        <br>
        <h3>Lav form til at sende besked til admin indbakke</h3>
        <br>
        navn <br>
        emne <br>
        besked <br>
        vil du helst kontaktes via telefon eller email (kryds af) <br>
        indtast mobilnummer eller email, alt efter hvilken du har krydset af
        send <br>

        <br>

        <h3>Besked bliver uploaded til inbox table i database og admin kan se den i indbakke, som kan findes på 'profil.php' (list.php)</h3>
        <h4>- Hvis man har krydset af ved email og ikke indtastet email, vil beskeden ikke sendes</h4>

    </div> <!-- .container end -->

</div> <!-- .block .contact end -->