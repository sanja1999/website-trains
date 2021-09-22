<?php
    include_once '../okvir.php';
    $db=new Baza();
    $db->spojiDB();
    $return=array();
    $upit="SELECT * FROM korisnik";

    $rezultat=$db->selectDB($upit);

    if($rezultat != null && $rezultat->num_rows > 0){
        while ($row = $rezultat->fetch_assoc()) {
            array_push($return,$row);
        }
    }
    echo json_encode($return);
    $db->zatvoriDB();
?>