<?php
include_once 'okvir.php';

if (dohvatiUlogu(2)) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>Moje prijave</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Izložbe moderatora">
        <meta name="description" content="Izložbe moderatora">
        <meta name="keywords" content="Izložve; Vlakovi; WebDiP">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css"/>  
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="javascript/ssajfar.js"></script>
        <script src="javascript/izlozbeModerator.js"></script>  
        <script type="text/javascript">
            var pomakVremena = "<?php echo trenutniPomak(); ?>";
        </script>
    </head>
    <body>
    <header class="header">
        <div class="header__inner">
            <a href="index.html" class="header__logo-container">
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
        </div>
    </header>

        <section id="section-hero" class="section-hero">
        <h1 class="header__title">Moje izložbe</h1>
        <table style="text-align: left" class="tablica" id="izlozbe">
                <tr><th>Naziv izložbe</th><th>Broj korisnika</th><th>Početak</th><th>Kraj</th><th>Status</th><th></th></tr>

            </table>
            <hr style="margin-top: 50px;">
            <h2>Dodaj novu izložbu</h2>

            <form id="dodajIzlozbu" method="post" name="form1" action="#">
                <table> 
                    <tr>
                        <td><label class="labele" for="nazivIzlozbe">Naziv izložbe:</label></td>
                        <td><input class="polja" id="nazivIzlozbe" name="nazivIzlozbe" type="text" required="required"></td>
                        <td><span id="nazivIzlozbe-pogreska"></span></td>
                    </tr>
                    <tr>
                            <td><label class="labele" for="brojKorisnika">Broj korisnika:</label></td>
                            <td><input class="polja" id="brojKorisnika" name="brojKorisnika" type="number" placeholder="Unesite broj korisnika" min="0" required="required"></td> <br>
                            <td><span id="brojKorisnika-pogreska"></span></td>
                    </tr>
                    <tr>
                        <td><label for="pocetak" class="labele">Početak: </label></td>
                        <td><input type="date" id="pocetak" name="pocetak" required="required"><br></td>
                        <td><span id="pocetak-pogreska"></span></td>
                    </tr>
                    <tr>
                        <td><label for="kraj" class="labele">Kraj: </label></td>
                        <td><input type="date" id="kraj" name="kraj" required="required"><br></td>
                        <td><span id="kraj-pogreska"></span></td>
                    </tr>
                    <tr>
                        <td><label class="labele" for="izlozba">Tematika izložbe:</label></td>
                        <td><select name="tematika" id="tematika" required="required">
                            </select></td>      
                    </tr>
                    <tr><td></td>
                        <td><input class="polja" id="podnesi" name="podnesi" type="submit" value="Dodaj izložbu"></td>
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
