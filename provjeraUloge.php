<?php
include_once 'baza.class.php';

function dohvatiId($korime){
    $db=new Baza();
    $db->spojiDB();
    $sql="SELECT korisnik_id from korisnik where korisnicko_ime='$korime'";
    $rezultat=$db->selectDB($sql);
    $rezultat=$rezultat->fetch_assoc();
    $db->zatvoriDB();
    return $rezultat["korisnik_id"];
}


function dohvatiUlogu($uloga) {
    $korisnik = Sesija::dajKorisnika() ? Sesija::dajKorisnika() : "";
    if ($korisnik == "" || $korisnik->get_uloga() > $uloga) {
        return true;
    }
    else{
        return false;
    }
}
