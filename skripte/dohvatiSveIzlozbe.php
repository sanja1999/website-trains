<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
$upit = "SELECT naziv, izlozba_id, status_izlozbe_status_izlozbe_id as statusIzlozbe FROM izlozba";

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();