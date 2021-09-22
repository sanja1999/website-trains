<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
$korisnikId = Sesija::dajKorisnika()->get_id();
$upit = "SELECT s.naziv as statusNaziv, p.*, i.naziv as izlozbaNaziv from prijava p left join izlozba i on p.izlozba_izlozba_id = i.izlozba_id join status s on p.status_status_id = s.status_id where p.korisnik_korisnik_id= '$korisnikId'";

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();