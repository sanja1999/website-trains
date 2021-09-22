<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();
$korisnikId = Sesija::dajKorisnika()->get_id();
$id=$_GET['id'];
$status=$_GET['status'];
$upit = "update izlozba set status_izlozbe_status_izlozbe_id=$status where izlozba_id=$id";

$rezultat=$db->selectDB($upit);

if ($status == 4) {
    $upit1 = "select p.korisnik_korisnik_id, count(*) as brojGlasova from je_glasao jg left join vlak v on jg.vlak_id =v.vlak_id left join prijava p on v.vlak_id =p.vlak_vlak_id where jg.izlozba_izlozba_id = $id group by p.korisnik_korisnik_id  order by 2 desc";
    $r = $db->selectDB($upit1);
    if ($r) {
        $red = $r->fetch_assoc();
        $pobjednik = $red['korisnik_korisnik_id'];
        $upit2 = "update izlozba set pobjednik_pobjednik_id=$pobjednik where izlozba_id=$id";
        $db->selectDB($upit2);
    }
}

echo json_encode($rezultat);
$db->zatvoriDB();