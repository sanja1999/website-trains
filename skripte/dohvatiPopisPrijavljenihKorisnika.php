<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
$upit = "SELECT korisnik.ime, korisnik.prezime, izlozba.naziv,korisnik.korisnik_id, izlozba.pobjednik_pobjednik_id
FROM korisnik 
inner join prijava on prijava.korisnik_korisnik_id=korisnik.korisnik_id
inner join izlozba on prijava.izlozba_izlozba_id=izlozba.izlozba_id order by izlozba.naziv ";

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();