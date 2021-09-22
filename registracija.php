<?php
include_once 'okvir.php';
$public_key = "6LfcxQ0bAAAAAIvtkP59efOKH_oeAt_tQKFO3uLL";

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">

<head>
    <title>Registracija</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="tittle" content="Registracija">
    <meta name="description" content="Registracija na stranicu">
    <meta name="keywords" content="Registracija; Trains; Vlakovi">
    <meta name="author" content="Sanja Šajfar">
    <meta name="date" content="14. Lipanj 2021.">
    <link rel="stylesheet" href="css/ssajfar.css" type="text/css" />
    <link rel="stylesheet" href="css/ssajfar_accesibility.css" type="text/css" id="accessibility-style"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="javascript/registracija.js"></script>
    <script src="javascript/ssajfar.js"></script>
</script>
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
            <h1 class="header__title">Registracija</h1>
        </div>
    </header>
    <section id="section-hero" class="section-hero">
        <form novalidate id="forma_registracija" method="post" name="forma_registracija"
            action="skripte/registracijaSkripta.php">
            <table>
                <tr>
                    <td><label for="ime" class="labela">Ime: </label></td>
                    <td><input type="text" id="ime" name="ime" size="15" maxlength="25" placeholder="ime"
                            autofocus="autofocus"><br></td>
                    <td><span id="ime-pogreska"></span></td>
                </tr>
                <tr>
                    <td><label for="prez" class="labela">Prezime: </label></td>
                    <td><input type="text" id="prez" name="prez" size="20" maxlength="40" placeholder="prezime"
                            ><br></td>
                            <td><span id="prez-pogreska"></span></td>
                </tr>
                <tr>
                    <td><label for="korime" class="labela">Korisničko ime: </label></td>
                    <td><input type="text" id="korime" name="korime" size="20" maxlength="20"
                            placeholder="korisničko ime"><br></td>
                            <td><span id="korime-pogreska"></span></td>
                </tr>
                <tr>
                    <td><label for="danRod" class="labela">Datum rođenja: </label></td>
                    <td><input type="date" id="danRod" name="danRod"><br></td>
                    <td><span id="danRod-pogreska"></span></td>
                </tr>
                <tr>
                    <td><label for="email" class="labela">Email adresa: </label></td>
                    <td><input type="email" id="email" name="email" size="35" maxlength="35"
                            placeholder="ime.prezime@posluzitelj.xxx"><br></td>
                            <td><span id="email-pogreska"></span></td>
                </tr>
                <tr>
                    <td><label for="lozinka1" class="labela">Lozinka: </label></td>
                    <td> <input type="password" id="lozinka1" name="lozinka1" size="20" maxlength="40"
                            placeholder="lozinka"><br></td>
                            <td><span id="lozinka1-pogreska"></span></td>
                </tr>
                <tr>
                    <td><label for="lozinka2" class="labela">Ponovi lozinku: </label></td>
                    <td><input type="password" id="lozinka2" name="lozinka2" size="20" maxlength="40"
                            placeholder="lozinka"><br></td>
                            <td><span id="lozinka2-pogreska"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><div class="g-recaptcha" data-sitekey="<?php echo $public_key ?>"></div></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input id="submit" name="submit" type="submit" value=" Registriraj se "></td>
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