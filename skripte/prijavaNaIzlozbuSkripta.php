<?php
include_once '../okvir.php';

    $pogreska = "";
    $nazivPrijave = $_POST["nazivPrijave"];
    $opisPrijave = $_POST["opisPrijave"];
    $naziv = $_POST["naziv"];
    $opis = $_POST["opis"];
    $vrsta = $_POST["vrsta"];
    $maxBrzina = $_POST["maxBrzina"];
    $brojSjedala = $_POST["brojSjedala"];
    $izlozba = $_POST["izlozba"];
    
    $spremanje = array();

    if (empty($_POST['nazivPrijave'])) {
        $pogreska .= "Unesite naziv prijave";
    }
    if (empty($opisPrijave)) {
        $pogreska .= "Unesite opis prijave";
    }
    if (empty($_POST['naziv'])) {
        $pogreska .= "Unesite naziv vlaka";
    }
    if (empty($opis)) {
        $pogreska .= "Unesite opis";
    }
    if (empty($vrsta)) {
        $pogreska .= "Unesite vrstu pogona.";
    }
    if (empty($maxBrzina)) {
        $pogreska .= "Unesite maksimalnu brzinu.";
    }
    if (empty($brojSjedala)) {
        $pogreska .= "Unesite broj sjedala.";
    }
    if (empty($izlozba)) {
        $pogreska .= "Odaberite izložbu na kojoj želite sudjelovati.";
    }




    if(!preg_match('/^\d+$/', $maxBrzina)){
        $pogreska .= "Maksimalna brzina mora biti upisana u obliku broja.";
    }

    if(!preg_match('/^\d+$/', $brojSjedala)){
        $pogreska .= "Broj sjedala mora biti upisana u obliku broja.";
    }

    if (empty($pogreska) ) {
        $db=new Baza();
        $veza = $db->spojiDB();
        $upitVlak = "INSERT INTO vlak(naziv, opis, vrsta_pogona, maksimalna_brzina, broj_sjedala) VALUES ('$naziv','$opis','$vrsta','$maxBrzina',$brojSjedala)";
        $db->updateDb($upitVlak);
        $vlakId  = $veza->insert_id;
        $korisnikId = Sesija::dajKorisnika()->get_id();
        $upit = "INSERT INTO prijava(naziv, opis, korisnik_korisnik_id, izlozba_izlozba_id, status_status_id, vlak_vlak_id) VALUES ('$nazivPrijave','$opisPrijave','$korisnikId','$izlozba',3,'$vlakId')";
        
        if ($db->updateDB($upit)) {
            $idPrijave = $veza->insert_id;
            $pogreska = "Uspješan unos!";
            $spremanje["uspjesno"] = true;
            $spremanje["izlozbaId"] = $izlozba;
            $spremanje["prijavaNaziv"] = $nazivPrijave;
            $spremanje["prijavaOpis"] = $opisPrijave;
            $spremanje["prijavaId"] = $idPrijave;
        } else {
            $pogreska = "Pogreška kod unosa!";
        }

        
        $db->zatvoriDB();
    }
    $spremanje["pogreska"] = $pogreska;

    echo json_encode($spremanje);

?>