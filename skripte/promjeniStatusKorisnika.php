<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$return=array();
$id= $_GET["id"];
$upit = "update korisnik set status = not status, neuspjesne_prijave=0 where korisnik_id='$id'";

$rezultat=$db->updateDB($upit);

$return['poruka'] = "Status promijenjen";
echo json_encode($return);

$db->zatvoriDB();
?>