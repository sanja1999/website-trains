<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$return=array();
$prijavaId= $_GET["id"];
$prijavaBrisanje = "delete from prijava where zahtjev_za_prijavu_id='" . $prijavaId . "'";

$rezultat=$db->updateDB($prijavaBrisanje);

$return['poruka'] = "Prijava obrisana";
echo json_encode($return);

$db->zatvoriDB();
?>