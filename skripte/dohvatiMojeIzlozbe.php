<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
$korisnikId = Sesija::dajKorisnika()->get_id();
$upit = "select i.* from izlozba i left join upravljati u ON i.tematika_izlozbe_tematika_izlozbe_id = u.tematika_izlozbe_tematika_izlozbe_id where u.korisnik_korisnik_id ='$korisnikId'";

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();