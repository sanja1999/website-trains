<?php
include_once 'baza.class.php';

function pomakVremenaBarka(){
    $url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=xml";

    if (!($fp = fopen($url, 'r'))) {
        echo "Problem kod otvaranja URL-a!" . $url;
        exit;
    }
    
    // XML data
    $xml_string = fread($fp, 10000);
    fclose($fp);
    
    // create a DOM object from the XML data
    $domdoc = new DOMDocument;
    $domdoc->loadXML($xml_string);
    
    $params = $domdoc->getElementsByTagName('brojSati');
    $sati = 0;
    
    if ($params != NULL) {
        $sati = $params->item(0)->nodeValue;
    }
    
    $db = new Baza();
    $db->spojiDB();
    $sql = "UPDATE konfiguracija SET vrijeme='$sati' where id=1";
    $db->updateDB($sql);
    $db->zatvoriDB();

    return $sati;
}

function trenutniPomak(){
    $db = new Baza();
    $db->spojiDB();
    $sql = "SELECT vrijeme FROM konfiguracija where id=1";
    $rezultat = $db->selectDB($sql);
    $podaci = $rezultat->fetch_assoc();
    $db->zatvoriDB();
    $sati = $podaci["vrijeme"];
    return $sati;
}


function trenutnoVrijemeSustava() {
    $vrijemeServera = time();
    $sati= trenutniPomak();
    $vrijemeSustava= $vrijemeServera + ($sati * 60 * 60);
    return $vrijemeSustava;
}


function trenutnoTrajanjeAktivacijskogKoda() {
    $db = new Baza();
    $db->spojiDB();
    $sql = "SELECT kod FROM konfiguracija where id=1";
    $rezultat = $db->selectDB($sql);
    $podaci = $rezultat->fetch_assoc();
    $db->zatvoriDB();
    $trajanjeKoda = $podaci["kod"];
    return $trajanjeKoda;
}

function neuspjesnePrijave(){
    $db = new Baza();
    $db->spojiDB();
    $sql = "SELECT neuspjesne_prijave FROM konfiguracija where id=1";
    $rezultat = $db->selectDB($sql);
    $podaci = $rezultat->fetch_assoc();
    $db->zatvoriDB();
    $neuspjesnePrijave = $podaci["neuspjesne_prijave"];
    return $neuspjesnePrijave;
}

function trajanjeSesije(){
    $db = new Baza();
    $db->spojiDB();
    $sql = "SELECT trajanje_sesije FROM konfiguracija where id=1";
    $rezultat = $db->selectDB($sql);
    $podaci = $rezultat->fetch_assoc();
    $db->zatvoriDB();
    $trajanjeSesije = $podaci["trajanje_sesije"];
    return $trajanjeSesije;
}

function stranicenje(){
    $db = new Baza();
    $db->spojiDB();
    $sql = "SELECT stranicenje FROM konfiguracija where id=1";
    $rezultat = $db->selectDB($sql);
    $podaci = $rezultat->fetch_assoc();
    $db->zatvoriDB();
    $stranicenje = $podaci["stranicenje"];
    return $stranicenje;
}
?>



