<?php
include_once '../okvir.php';

    $poruka = "";
    $nazivIzlozbe = $_POST["nazivIzlozbe"];
    $brojKorisnika = $_POST["brojKorisnika"];
    $pocetak = $_POST["pocetak"];
    $kraj = $_POST["kraj"];
    $tematika = $_POST["tematika"];

    $spremanje = array();

    $db=new Baza();
    $db->spojiDB();
    $sql = "insert into izlozba(broj_korisnika,pocetak,kraj,status_izlozbe_status_izlozbe_id,tematika_izlozbe_tematika_izlozbe_id, naziv) values('$brojKorisnika','$pocetak','$kraj',1,'$tematika','$nazivIzlozbe')";
    
    
    if ($db->updateDB($sql)) {
        $poruka = "Izložba uspješno dodana.";
    } else {
        $poruka = "Pogreška kod dodavanja izložbe!";
    }
    
    $db->zatvoriDB();

    $spremanje["poruka"] = $poruka;

    echo json_encode($spremanje);

?>