<?php
include_once 'okvir.php';

if (dohvatiUlogu(1)) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Konfiguracija Sustava</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Konfiguracija sustava">
        <meta name="description" content="Konfiguracija sustava za administratora">
        <meta name="keywords" content="Konfiguracija; Administrator; Sustav">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css" />
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="javascript/konfiguracijaSustava.js"></script>
        <script src="javascript/ssajfar.js"></script>
    </head>
    <body>
        <header class="header">

            <div class="header__inner">
                <a href="index.php" class="header__logo-container">
                    <img src="multimedija/Logo.jpg" alt="logo" class="header__logo"></a>
                <nav id="header__nav">
                            <?php

                            navigacija();
                            ?>
                </nav>

                <span class="header__social-media-container" id="accessibility">
                    
                        <img src="multimedija/accessibility.png" alt="header__social-media-image"
                            class="header__social-media-image">
                    
                </span>
                <h1 class="header__title">Konfiguracija</h1>
            
            </div>
        </header>
            <section id="section-hero" class="section-hero">
                <form>
                <table style="text-align: right">
                    
                    <tr><td>Trenutne postavke</td></tr>
                    <tr><td>Trajanje aktivacijskog koda (h): </td><td><span id="kod-id"> <?php echo trenutnoTrajanjeAktivacijskogKoda(); ?></span></td></tr>
                    <tr><td>Pomak vremena (h): </td><td><span id="pomak-id"> <?php echo trenutniPomak(); ?></span></td></tr>
                    <tr><td>Broj neuspješnih prijava: </td><td><span id="neuspjesne-prijave-id"> <?php echo neuspjesnePrijave(); ?></span></td></tr>
                    <tr><td>Trajanje sesije (h): </td><td><span id="trajanje-sesije-id"> <?php echo trajanjeSesije(); ?></span></td></tr>
                    <tr><td>Straničenje: </td><td><span id="stranicenje-id"> <?php echo stranicenje(); ?></span></td></tr>
                </table>
                </form>
                <br>
                <form id="novaKonfiguracija" action="#" method="post">
                    <table style="text-align: right">
                        <tr><td>Postavi novu konfiguraciju</tr></td>
                        <tr>
                            <td><label for="kod">Novo trajanje aktivacijskog koda:</label></td>
                            <td><input type="number" name="kod"></td>
                        </tr><tr>
                            <td><label for="dohvatiSBarke">Pomak vremena s Barke <a href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html">[LINK]:</a></label></td>
                        
                            <td style="text-align: center"><input type="checkbox" name="pomakSBarke"></td>
                        </tr>
                        <tr>
                            <td><label for="neuspjesne_prijave">Novi broj neuspješnih prijava:</label></td>
                            <td><input type="number" name="neuspjesne_prijave"></td>
                        </tr>
                        <tr>
                            <td><label for="trajanje_sesije">Novo trajanje sesije:</label></td>
                            <td><input type="number" name="trajanje_sesije"></td>
                        </tr>
                        <tr>
                            <td><label for="stranicenje">Novo straničenje:</label></td>
                            <td><input type="number" name="stranicenje"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="submit" id="novePostavke" type="submit" value="Stavi nove postavke"></td>
                        </tr>
                    
                    </table>
                </form>
            </section>
            <footer class="footer">
            <div class="footer-description">
                <br>
                <p>&copy; 2021. <a href="autor.html">Sanja Šajfar</a></p>
            </div>
            </footer>   
    </body>
</html>