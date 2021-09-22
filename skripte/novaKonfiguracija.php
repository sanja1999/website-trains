<?php
    include_once '../okvir.php';
    $spremanje = array();
    $db=new Baza();
    $db->spojiDB();

    if(isset($_POST["kod"]) && !empty($_POST["kod"])){
        $kod=$_POST["kod"];
        $sql="UPDATE konfiguracija SET kod='$kod' where id=1";
        $db->updateDB($sql);
        $spremanje['kod']=$kod;

    }
    if(isset($_POST["pomakSBarke"]) && !empty($_POST["pomakSBarke"])){
        $spremanje['pomakSBarke']=pomakVremenaBarka();
    }
    if(isset($_POST["neuspjesne_prijave"]) && !empty($_POST["neuspjesne_prijave"])){
        $neuspjesne_prijave=$_POST["neuspjesne_prijave"];
        $sql="UPDATE konfiguracija SET neuspjesne_prijave='$neuspjesne_prijave' where id=1";
        $db->updateDB($sql);
        $spremanje['neuspjesne_prijave']=$neuspjesne_prijave;

    }
    if(isset($_POST["trajanje_sesije"]) && !empty($_POST["trajanje_sesije"])){
        $trajanje_sesije=$_POST["trajanje_sesije"];
        $sql="UPDATE konfiguracija SET trajanje_sesije='$trajanje_sesije' where id=1";
        $db->updateDB($sql);
        $spremanje['trajanje_sesije']=$trajanje_sesije;

    }
    if(isset($_POST["stranicenje"]) && !empty($_POST["stranicenje"])){
        $stranicenje=$_POST["stranicenje"];
        $sql="UPDATE konfiguracija SET stranicenje='$stranicenje' where id=1";
        $db->updateDB($sql);
        $spremanje['stranicenje']=$stranicenje;

    }
    $db->zatvoriDB();
    echo json_encode($spremanje);
?>
