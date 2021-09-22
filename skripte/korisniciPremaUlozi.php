<?php
    include_once '../okvir.php';
    $db=new Baza();
    $db->spojiDB();
    $return=array();
    $ulogaId=$_GET['uloga'];
    $upit="SELECT * FROM korisnik where uloga_uloga_id='$ulogaId'";
    if ($ulogaId == 2) {
        $upit .= " or uloga_uloga_id='1'";
    }

    $rezultat=$db->selectDB($upit);

    if($rezultat != null && $rezultat->num_rows > 0){
        while ($row = $rezultat->fetch_assoc()) {
            array_push($return,$row);
        }
    }
    echo json_encode($return);
    $db->zatvoriDB();
?>