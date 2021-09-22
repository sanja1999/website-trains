<?php

function neregistrirani() {

    echo '<ul>
    <li class=header__nav-item>    <a href="index.php">POČETNA</a> </li>
    <li class=header__nav-item>    <a href="prijava.php">PRIJAVA</a> </li>
    <li class=header__nav-item>    <a href="registracija.php">REGISTRACIJA</a> </li>
    <li class=header__nav-item>    <a href="popisPrijavljenihKorisnika.php">KORISNICI</a> </li>
    <li class=header__nav-item>    <a href="autor.html">O AUTORICI</a> </li>
    <li class=header__nav-item>    <a href="dokumentacija.html">DOKUMENTACIJA</a> </li>
    </ul>';
}

function registrirani(){
    echo '<ul>
    <li class=header__nav-item>    <a href="index.php">POČETNA</a> </li>
    <li class=header__nav-item>    <a href="mojePrijave.php">PRIJAVA NA IZLOŽBU</a> </li>
    <li class=header__nav-item>    <a href="izlozbe.php">IZLOŽBE</a> </li>
    <li class=header__nav-item>    <a href="odjava.php">ODJAVA</a></li>
    <li class=header__nav-item>    <a href="popisPrijavljenihKorisnika.php">KORISNICI</a> </li>
    <li class=header__nav-item>    <a href="autor.html">O AUTORICI</a> </li>
    <li class=header__nav-item>    <a href="dokumentacija.html">DOKUMENTACIJA</a> </li>
    </ul>';
}

function moderator(){
    echo '<ul>
    <li class=header__nav-item>    <a href="index.php">POČETNA</a> </li>
    <li class=header__nav-item>    <a href="mojePrijave.php">PRIJAVA NA IZLOŽBU</a> </li>
    <li class=header__nav-item>    <a href="izlozbe.php">IZLOŽBE</a> </li>
    <li class=header__nav-item>    <a href="izlozbeModerator.php">UPRAVLJANJE IZLOŽBAMA</a> </li>
    <li class=header__nav-item>    <a href="odjava.php">ODJAVA</a></li>
    <li class=header__nav-item>    <a href="popisPrijavljenihKorisnika.php">KORISNICI</a> </li>
    <li class=header__nav-item>    <a href="autor.html">O AUTORICI</a> </li>
    <li class=header__nav-item>    <a href="dokumentacija.html">DOKUMENTACIJA</a> </li>
    </ul>';
}

function administrator(){
    echo '<ul>
    <li class=header__nav-item>    <a href="index.php">POČETNA</a> </li>
    <li class=header__nav-item>    <a href="mojePrijave.php">PRIJAVA NA IZLOŽBU</a> </li>
    <li class=header__nav-item>    <a href="izlozbe.php">IZLOŽBE</a> </li>
    <li class=header__nav-item>    <a href="izlozbeModerator.php">UPRAVLJANJE IZLOŽBAMA</a> </li>
    <li class=header__nav-item>    <a href="odjava.php">ODJAVA</a></li>
    <li class=header__nav-item>    <a href="popisPrijavljenihKorisnika.php">KORISNICI</a> </li>
    <li class=header__nav-item>    <a href="konfiguracijaSustava.php">KONFIGURACIJA SUSTAVA</a> </li>
    <li class=header__nav-item>    <a href="moderatori.php">MODERATORI</a> </li>
    <li class=header__nav-item>    <a href="upravljanjeKorisnicima.php">UPRAVLJANJE KORISNICIMA</a> </li>
    <li class=header__nav-item>    <a href="autor.html">O AUTORICI</a> </li>
    <li class=header__nav-item>    <a href="dokumentacija.html">DOKUMENTACIJA</a> </li>
    </ul>';
}

function navigacija() {
        $k= Sesija::dajKorisnika();
        if ($k!=null) {
            switch ($k->get_uloga()) {
                case 1:
                    administrator();
                    break;
                case 2:
                    moderator();
                    break;
                case 3:
                    registrirani();
                    break;
                default:
                    break;
            }
        }
        else {
            neregistrirani();
        }
}