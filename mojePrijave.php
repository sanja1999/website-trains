<?php
include_once 'okvir.php';
if (dohvatiUlogu(3)) {
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
        <meta name="tittle" content="Moje prijave na izložbu">
        <meta name="description" content="Moje prijave na izložbu">
        <meta name="keywords" content="Prijava; Izložbe; WebDiP">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css"/>  
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="javascript/mojePrijave.js"></script>  
        <script src="javascript/ssajfar.js"></script>
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
                <img src="multimedija/accessibility.png" alt="header__social-media-image" class="header__social-media-image">               
            </span>
        </div>
    </header>
        <section id="section-hero" class="section-hero">
        <h1 class="header__title">Moje prijave na izložbu</h1>

            <table id="prijave">
                <tr>
                    <th>Naziv izložbe</th><th>Naziv prijave</th><th>Opis prijave</th><th>Status prijave</th><th>Akcije</th>
                </tr>
            </table>

            <hr style="margin-top: 50px;">

            <h2>Prijava za dodavanje vlaka na izložbu</h2>

            <form id="prijavaNaIzlozbu" method="post" name="form1" action="skripte/prijavaNaIzlozbuSkripta.php">
                <table> 
                        <tr>
                            <td><label class="labele" for="nazivPrijave">Naziv prijave:</label></td><td>
                            <input class="polja" id="nazivPrijave" name="nazivPrijave" type="text"></td>
                            <td><span id="nazivPrijave-pogreska"></span></td>
                        </tr>
                        <tr>
                            <td><label class="labele" for="opisPrijave">Opis prijave:</label></td><td>
                                <textarea name="opisPrijave" id="opisPrijave" rows="5" cols="20"></textarea></td>
                                <td><span id="opisPrijave-pogreska"></span></td>  
                        </tr>
                        <tr>
                            <td><label class="labele" for="naziv">Naziv vlaka:</label></td><td>
                                <input class="polja" id="naziv" name="naziv" type="text"></td>
                                <td><span id="naziv-pogreska"></span></td>    
                        </tr>
                        <tr>
                            <td><label class="labele" for="opis">Opis:</label></td><td>
                                <textarea name="opis" id="opis" rows="5" cols="20"></textarea></td>
                                <td><span id="opis-pogreska"></span></td>  
                        </tr>
                        <tr>
                            <td><label class="labele" for="vrsta">Vrsta pogona:</label></td><td>
                            <input class="polja" id="vrsta" name="vrsta" type="text"></td>
                            <td><span id="vrsta-pogreska"></span></td>  
                        </tr>
                        <tr>
                            <td><label class="labele" for="maxBrzina">Maksimalna brzina:</label></td><td>
                            <input class="polja" id="maxBrzina" name="maxBrzina" type="text" placeholder="Unesite u obliku broja"></td> <br>
                            <td><span id="maxBrzina-pogreska"></span></td>  
                        </tr>
                        <tr>
                            <td><label class="labele" for="brojSjedala">Broj sjedala:</label></td><td>
                            <input class="polja" id="brojSjedala" name="brojSjedala" type="text" placeholder="Unesite broj"></td> <br>
                            <td><span id="brojSjedala-pogreska"></span></td>
                        </tr>
                        <tr>
                            <td><label class="labele" for="izlozba">Izložba na koju se prijavljujete:</label></td><td>
                                <select name="izlozba" id="izlozba">
                                </select></td>
                                
                                </tr><tr><td></td>
                            <td><input class="polja" id="podnesi" name="podnesi" type="submit" value="Podnesi prijavu"></td>
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
