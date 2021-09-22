<?php
include_once 'okvir.php';

if (!isset($_COOKIE["uvjeti"])) {
    echo "<script type='text/javascript'>alert('Klikom na gumb prihvaćate kolačiće.');</script>";
    setcookie("uvjeti", 1, time() + 2 * 24 * 60 * 60);
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
        <title>Početna stranica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Početna stranica">
        <meta name="description" content="Početna stranica">
        <meta name="keywords" content="Vlakovi; WebDiP; Sanja Šajfar">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css" />
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/> 
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->
  
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script src="javascript/ssajfar_jquery.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="javascript/ssajfar.js"></script>
        <script src="javascript/brojVlakovaPoIzlozbi.js"></script>
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
                    <img src="multimedija/accessibility.png" alt="header__social-media-image" class="header__social-media-image">
            </span>
                <h1 class="header__title">Početna</h1>
            
        </div>
    </header>

        <section id="section-hero" class="section-hero">
        <table id="statistika" class="tablica" style="text-align: center">
                <tr>
                    <th>Naziv izložbe</th><th>Broj vlakova po izložbi</th>
                </tr>
        </table>
        </section>
		
		
        <footer class="footer">
            <div class="footer-description">
               <br>
                <p>&copy; 2021. <a href="autor.html">Sanja Šajfar</a></p>
            </div>
        </footer >
    </body>
</html>
