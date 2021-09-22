<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
$izlozbaId=$_GET['izlozbaId'];
$upit = "select p.*, v.naziv as vlakNaziv, v.vrsta_pogona,v.maksimalna_brzina, v.broj_sjedala from prijava p join vlak v on p.vlak_vlak_id =v.vlak_id where p.izlozba_izlozba_id = $izlozbaId";

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();