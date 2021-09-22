<?php
include_once 'okvir.php';
$idIzlozba=$_GET['id'];
$nazivIzlozbe=$_GET['naziv'];

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
        <title>Vlakovi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Pregled vlakova po izložbi">
        <meta name="description" content="Pregled vlakova po izložbi">
        <meta name="keywords" content="Pregled; Vlakovi; Korisnik">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css"/>  
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="javascript/ssajfar.js"></script>
        <script src="javascript/sviVlakovi.js"></script> 
        <script type="text/javascript">
            var idIzlozba="<?php echo $idIzlozba; ?>";
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
                <img src="multimedija/accessibility.png" alt="header__social-media-image" class="header__social-media-image"> 
            </span>
            <h1 class="header__title">Pregled vlakova</h1>
            
        </div>
    </header>
        <section id="section-hero" class="section-hero">
            <h2><?php echo $nazivIzlozbe; ?></h2><br>
             <table id="vlakovi" class="tablica" style="text-align: left">
                <tr>
                    <th>Naziv vlak</th><th>Opis vlaka</th><th>Vrsta pogona</th><th>Maksimalna brzina</th><th>Broj sjedala</th><th></th>
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
