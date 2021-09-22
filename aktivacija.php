<?php
include_once 'okvir.php';


$aplikacijskiKod = $_GET["kod"];
$db = new Baza();
$db->spojiDB();
$poruka="";

$upit = "SELECT korisnik_id,vrijeme_registracije FROM korisnik WHERE aktivacijski_kod='$aplikacijskiKod'";
$rezultat = $db->selectDB($upit);

if ($rezultat->num_rows > 0) {
    $red = mysqli_fetch_array($rezultat);
    $id = $red[0];
    $vrijemeRegistracije = strtotime($red[1]);

    if (trenutnoVrijemeSustava() > ($vrijemeRegistracije + (trenutnoTrajanjeAktivacijskogKoda() * 60 * 60))) // postavljanje u sekunde
    {

        //vrijeme za aktivaciju je prošlo
        //header("Location: aktivacijaRacuna.php?poruka=2");
        $poruka="<p>Vrijeme za aktivaciju je isteklo</p>";
    } 
    else {

        $upit = "UPDATE korisnik SET aktivacijski_kod=NULL where korisnik_id='$id'";
        $db->updateDB($upit);
        $upit = "UPDATE korisnik set status=1 where korisnik_id='$id'";
        $db->updateDB($upit);
        $poruka="<p>Aktivacija uspješna!</p>";
     //   $adresa = "prijava.php";
     //   ZapisiDnevnikBezId("Aktivacija racuna", $id);
     // uspješan
        //header("Location: aktivacijaRacuna.php?poruka=1");
    }
} else {
    // kod nije valjan ili iskorišten
    //header("Location: aktivacijaRacuna.php?poruka=0");
    $poruka="<p>Kod nije valjan ili je iskorišten</p>";
}

$db->zatvoriDB();
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">

<head>
    <title>Aktivacija</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="tittle" content="Aktivacija korisničkog računa">
    <meta name="description" content="Aktivacija na stranicu">
    <meta name="keywords" content="Aktivacija; Trains; Korisnicko ime">
    <meta name="author" content="Sanja Šajfar">
    <meta name="date" content="14. Lipanj 2021.">
    <link rel="stylesheet" href="css/ssajfar.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
           
            <a href="#section-hero">
                <h1 class="header__title">Aktivacija</h1>
            </a>
        </div>
    </header>


    <section id="section-hero" class="section-hero">
    <?php
        echo $poruka;
        ?>
        <a href="prijava.php">Stranica za prijavu</a>
   
    </section>

    <footer class="footer">
        <div class="footer-description">
            <br>
            <p>&copy; 2021. <a href="../autor.html">Sanja Šajfar</a></p>
        </div>
    </footer>
</body>

</html>