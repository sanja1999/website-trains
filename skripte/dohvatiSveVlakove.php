<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
$id = $_GET['id'];
$upit = "SELECT vlak.*, izlozba.status_izlozbe_status_izlozbe_id as statusIzlozbe, prijava.naziv as prijavaNaziv
FROM vlak inner join prijava on prijava.vlak_vlak_id=vlak.vlak_id inner join izlozba on prijava.izlozba_izlozba_id=izlozba.izlozba_id where prijava.status_status_id=1 && izlozba.izlozba_id=$id";

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();