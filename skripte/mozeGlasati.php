<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$korisnikId = Sesija::dajKorisnika()->get_id();
$izlozbaId=$_GET['izlozbaId'];
$upit = "select * from je_glasao where korisnik_korisnik_id='$korisnikId' and izlozba_izlozba_id='$izlozbaId'";

$rezultat=$db->selectDB($upit);

echo json_encode($rezultat->num_rows);
$db->zatvoriDB();