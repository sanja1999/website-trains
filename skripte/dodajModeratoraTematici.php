<?php
include_once '../okvir.php';

    $poruka = "";
    $tematikaId = $_POST["tematike"];
    $moderatorId = $_POST["moderatoriSelect"];
    
    $spremanje = array();

    $db=new Baza();
    $db->spojiDB();
    $upit = "select * from upravljati where korisnik_korisnik_id='$moderatorId' && tematika_izlozbe_tematika_izlozbe_id='$tematikaId'";
    $rezultat = $db->selectDB($upit);
    
    if ($rezultat->num_rows == 0) {
        $sql = "insert into upravljati(korisnik_korisnik_id, tematika_izlozbe_tematika_izlozbe_id) values($moderatorId,$tematikaId)";
        $db->updateDB($sql);
        $poruka = "Odabrani moderator je dodan odabranoj tematici.";
    } else {
        $poruka = "Odabrani moderator je već dodan odabranoj tematici!";
    }
    
    $db->zatvoriDB();

    $spremanje["poruka"] = $poruka;

    echo json_encode($spremanje);

?>