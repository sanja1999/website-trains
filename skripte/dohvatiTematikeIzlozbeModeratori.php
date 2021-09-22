<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$spremanje = array();
if (isset($_GET['moderator'])) {
    $korisnikId = Sesija::dajKorisnika()->get_id();
    $upit = "select ti.* from tematika_izlozbe ti left join upravljati u on ti.tematika_izlozbe_id = u.tematika_izlozbe_tematika_izlozbe_id where u.korisnik_korisnik_id = '$korisnikId'";
} else {
    $upit = "SELECT * FROM tematika_izlozbe";
}

$rezultat=$db->selectDB($upit);

if($rezultat->num_rows > 0){
    while ($red = $rezultat->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();