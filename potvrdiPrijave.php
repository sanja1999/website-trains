<?php
include_once 'okvir.php';
$izlozbaId=$_GET['izlozbaId'];

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
        <title>Potvrda prijave</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Potvrda prijave">
        <meta name="description" content="Potvrda prijave od strane moderatora">
        <meta name="keywords" content="Potvrda; Prijave; Moderatori">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css"/>  
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="javascript/potvrdiPrijave.js"></script> 
        <script src="javascript/ssajfar.js"></script>
        <script type="text/javascript">
            var izlozbaId="<?php echo $izlozbaId; ?>";
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
            <h1 class="header__title">Potvrda prijave</h1>
            
            
        </div>
    </header>
        <section id="section-hero" class="section-hero">
            <table id="prijave" class="tablica" style="text-align: left">
                <tr>
                    <th>Naziv prijave</th><th>Opis prijave</th><th>Naziv vlaka</th><th>Vrsta pogona</th><th>Maksimalna brzina</th><th>Broj sjedala</th><th>Status</th><th></th>
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
