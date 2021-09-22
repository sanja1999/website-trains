<?php
include_once '../okvir.php';
$db=new Baza();
$db->spojiDB();

 $spremanje = array();


$upit = "select count(*) as brojPrijava, i.* from izlozba i left join prijava p on i.izlozba_id = p.izlozba_izlozba_id where p.status_status_id = 1 group by i.izlozba_id ";


$rezultat1=$db->selectDB($upit);

if($rezultat1->num_rows > 0){
    while ($red = $rezultat1->fetch_assoc()) {
        array_push($spremanje,$red);
    }
}

echo json_encode($spremanje);
$db->zatvoriDB();
