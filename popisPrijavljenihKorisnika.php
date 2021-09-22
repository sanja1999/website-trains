<?php
include_once 'okvir.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>Popis prijavljenih korisnika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Popis prijaljenih korisnika">
        <meta name="description" content="Pregled prijavljenih korisnika">
        <meta name="keywords" content="Korisnici; Pregled; Popis">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css"/>  
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="javascript/ssajfar.js"></script>
        <script src="javascript/popisPrijavljenihKorisnika.js"></script> 
        
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
            <h1 class="header__title">Pregled</h1>
        </div>
    </header>
        <section id="section-hero" class="section-hero">
            <h2>Pregled prijavljenih korisnika</h2><br>
             <table id="pijavljeniKorisnici" class="tablica" style="text-align: left">
                <tr>
                    <th>Ime</th><th>Prezime</th><th>Naziv izložbe</th><th></th><th>
                </tr><tr>
                    <td></td><td></td><td></td><td></td>
                </tr>
            </table> 
        </section>
        <footer class="footer">
            <div class="footer-description">
                <br>
                <p>&copy; 2021. <a href="autor.html">Sanja Šajfar</a></p>
            </div>
        </footer>
    </body>
</html>
