<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$korisnikId = Sesija::dajKorisnika()->get_id();
$id=$_GET['id'];
$status=$_GET['status'];
$upit = "update prijava set status_status_id=$status where zahtjev_za_prijavu_id=$id";

$rezultat=$db->selectDB($upit);

echo json_encode($rezultat);
$db->zatvoriDB();