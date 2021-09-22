<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$korisnikId = Sesija::dajKorisnika()->get_id();
$vlakId=$_GET['vlakId'];
$izlozbaId=$_GET['izlozbaId'];
$upit = "INSERT INTO je_glasao(korisnik_korisnik_id, izlozba_izlozba_id, vlak_id)  VALUES ('$korisnikId', '$izlozbaId', '$vlakId')";

$rezultat=$db->selectDB($upit);

echo json_encode($rezultat);
$db->zatvoriDB();