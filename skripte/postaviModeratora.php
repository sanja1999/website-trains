<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$return=array();
$id= $_GET["id"];
$upit = "update korisnik set uloga_uloga_id=2 where korisnik_id='$id'";

$rezultat=$db->updateDB($upit);

$return['poruka'] = "Uloga promijenjena";
echo json_encode($return);

$db->zatvoriDB();
?>