<?php

$uri = $_SERVER["REQUEST_URI"];
$pos = strrpos($uri, "/");
$dir = $_SERVER["SERVER_NAME"] . substr($uri, 0, $pos + 1);

if (!isset($_SERVER["HTTPS"]) || strtolower($_SERVER["HTTPS"]) != "on") {
    $adresa = 'https://' . $dir . 'prijava.php';
    header("Location: $adresa");
    exit();
}

include_once 'okvir.php';

// if (isset($_COOKIE['korisnicko_ime'])) {
//     $adresa = 'http://' . $dir . 'index.php';
//     header("Location: $adresa");
//     exit();
// }
// if (isset($_SESSION["korisnik"])) {
//     echo "da";
// } else {
//     echo "ne";
// }

if (Sesija::dajKorisnika() != null) {
    $adresa = 'http://' . $dir . 'index.php';
    header("Location: $adresa");
    exit();
}

if (isset($_POST['prijava'])) {
    if (isset($_POST['lozinka']) && isset($_POST['korime'])) {
        if (isset($_POST["zapamti"])) {
            setcookie("zapamti", $_POST["korime"]);
        }
        $korime = $_POST['korime'];
        $lozinka = $_POST['lozinka'];
        $lozinkaSHA = sha1($lozinka);
        $db = new Baza();
        $db->spojiDB();
        $upit = "select * from korisnik where korisnicko_ime = '$korime'";
        $rezultat = $db->selectDB($upit);
        if ($rezultat->num_rows > 0) {
            $k = $rezultat->fetch_assoc();
            $id = $k['korisnik_id'];
            if ($k['status'] == 0) {
                echo "<script type='text/javascript'>alert('Neuspješna prijava. Račun je blokiran.');</script>";
            } else if ($k['aktivacijski_kod'] != NULL) {
                echo "<script type='text/javascript'>alert('Neuspješna prijava. Niste potvrdili registraciju.');</script>";
            } else if ($lozinkaSHA != $k['lozinka_sha1']) {
                $neuspjesnePrijave = $k['neuspjesne_prijave'] + 1;
                $sql = "update korisnik set neuspjesne_prijave='$neuspjesnePrijave' where korisnik_id='$id'";
                $db->updateDB($sql);
                if ($neuspjesnePrijave > neuspjesnePrijave()) {
                    $sql = "update korisnik set status=0 where korisnik_id='$id'";
                    $db->updateDB($sql);
                    echo "<script type='text/javascript'>alert('Prevelik broj pogrešnih prijava.');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Pogrešno korisničko ime ili lozinka');</script>";
                }
            } else {
                setcookie("korisnicko_ime", $k['korisnicko_ime']);
                $korisnik = new Korisnik();
                $korisnik->set_podaci($k['korisnicko_ime'],$k['uloga_uloga_id'],$k['korisnik_id']);
                Sesija::kreirajKorisnika($korisnik);

                $sql = "update korisnik set neuspjesne_prijave=0 where korisnik_id='$id'";
                $db->updateDB($sql);

                $adresa = 'http://' . $dir . 'index.php';
                header("Location: $adresa");
            }
        } else {
            echo "<script type='text/javascript'>alert('Pogrešno korisničko ime ili lozinka');</script>";
        }
        $db->zatvoriDB();
    } else {
        echo "<script type='text/javascript'>alert('Unesite korisničko ime i lozinku');</script>";
    }
}

if (isset($_POST['zaboravljenaLozinka'])) {
    if (isset($_POST['korime'])) {
        $korime = $_POST['korime'];
        $db = new Baza();
        $db->spojiDB();
        $upit = "select * from korisnik where korisnicko_ime = '$korime'";
        $rezultat = $db->selectDB($upit);
        if ($rezultat->num_rows > 0) {
            $k = $rezultat->fetch_assoc();
            $email = $k['email'];
            $id = $k["korisnik_id"];
            $nova = (string) rand(10000000, 99999999);
            $novaSHA = sha1($nova);
            $sql = "update korisnik set	lozinka='$nova', lozinka_sha1='$novaSHA' where korisnicko_ime='$korime'";
            $db->updateDB($sql);
            mail($email, "Lozinka", $nova);
        } else {
            echo "<script type='text/javascript'>alert('Pogrešno korisničko ime');</script>";
        }
        $db->zatvoriDB();
    } else {
        echo "<script type='text/javascript'>alert('Unesite korisničko ime');</script>";
    }
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
        <title>Prijava</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="tittle" content="Prijava">
        <meta name="description" content="Prijava na stranicu">
        <meta name="keywords" content="Prijava; Vlakovi; WebDiP">
        <meta name="author" content="Sanja Šajfar">
        <meta name="date" content="14. Lipanj 2021.">
        <link rel="stylesheet" href="css/ssajfar.css" type="text/css" />
        <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/> 
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
            <h1 class="header__title">Prijava</h1>
        </div>
    </header>
        <section id="section-hero" class="section-hero">
            <h2>Prijava</h2>
            <form id="form1" method="post" name="form1" action="">
                <table>
                    <tr>
                        <td><label for="korime" class="labela">Korisničko ime: </label></td>
                        <td><input type="text" id="korime" name="korime" size="20" maxlength="20" placeholder="korisničko ime" autofocus="autofocus" required="required"
                        <?php
                                if (isset($_COOKIE["zapamti"])) {
                                    $k = $_COOKIE["zapamti"];
                                    echo "value=\"$k\"";
                                }
                                ?>
                        ><br></td>
                    </tr>
                    <tr>
                        <td><label for="lozinka" class="labela">Lozinka: </label></td>
                        <td><input type="password" id="lozinka" name="lozinka" size="20" maxlength="40" placeholder="lozinka"><br></td>
                    </tr>
                    <tr>
                        <td></td><td><input type="checkbox" name="zapamti" value="zapamti"> Zapamti me<br></td>
                    </tr>
                    <tr>
                        <td></td><td><input type="submit" name="prijava" value="Prijavi se"></td>
                    </tr>
                    <tr>
                        <td></td><td><input type="submit" name="zaboravljenaLozinka" value="Zaboravljena lozinka"></td>
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
