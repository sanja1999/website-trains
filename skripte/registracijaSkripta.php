<?php
include_once '../okvir.php';
    // $public_key = "6LfcxQ0bAAAAAIvtkP59efOKH_oeAt_tQKFO3uLL";
    // $private_key = "6LfcxQ0bAAAAAKlRPa4nu6LHKDUMCeJ9g7UJYirv";
    // $url = "https://www.google.com/recaptcha/api/siteverify";



    // if (isset($_POST['g-recaptcha-response'])) {
    //     $response_key = $_POST['g-recaptcha-response'];

    // //$response_key = $_POST['g-recaptcha-response'];
    // /* Send the data to the API for a response */
    // $response = file_get_contents($url . '?secret=' . $private_key . '&response=' . $response_key . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
    // /* json decode the response to an object */
    // $response = json_decode($response);
    // }

    $pogreska = "";
    $ime = $_POST["ime"];
    $prezime = $_POST["prez"];
    $korime = $_POST["korime"];
    $email = $_POST["email"];
    $lozinka1 = $_POST["lozinka1"];
    $lozinka2 = $_POST["lozinka2"];
    $datum = $_POST["danRod"];

 
    if (empty($_POST['ime'])) {
        $pogreska .= "Unesite ime.";
    }
    if (empty($prezime)) {
        $pogreska .= "Unesite prezime.";
    }
    if (empty($korime)) {
        $pogreska .= "Unesite korisnicko ime.";
    }
    if (strlen($lozinka1) < 6) {
        $pogreska .= "Lozinka mora imati minimalno 6 znakova.";
    }


    if(!preg_match('/^[a-zA-Z0-9-.]+@[a-zA-Z0-9]+\.+[a-zA-Z0-9]{2,3}$/', $email)){
        $pogreska .= "Email nije napisan u ispravnom formatu.";
    }

    if($lozinka1!= $lozinka2){
        $pogreska .= "Lozinke se ne poklapaju.";
    }
    
    
    $db=new Baza();
    $db->spojiDB();
    $upit="SELECT email FROM korisnik where email='" . $email . "'";

    $rezultat=$db->selectDB($upit);
    if($rezultat->num_rows==1){
        $pogreska .= "Email već postoji.";
    }    

    $db->zatvoriDB();
    // if ($response->success != 1) {
    //     $pogreska .= "Potvrdite da niste robot";
    // }

    if (empty($pogreska) ) {
        $lozinkaSHA = sha1($lozinka1);
        $db->spojiDB();
        $vrijemeRegistracije = date("Y-m-d H:i:s", trenutnoVrijemeSustava());
        $upit = "INSERT INTO korisnik(ime, prezime, korisnicko_ime, lozinka,lozinka_sha1, email, status, uloga_uloga_id,vrijeme_registracije) VALUES ('$ime','$prezime','$korime','$lozinka1','$lozinkaSHA','$email',1,3,'".$vrijemeRegistracije."')";
        //echo $upit;
        $db->updateDB($upit);
        $aktivacijskiKod = sha1($korime);
        $upit = "UPDATE korisnik SET aktivacijski_kod='$aktivacijskiKod' WHERE korisnicko_ime='$korime'";
        $db->updateDB($upit);
        $poruka = "Molimo Vas da potvrdite registraciju klikom na sljedeci link: http://barka.foi.hr/WebDiP/2020_projekti/WebDiP2020x115/aktivacija.php?kod=$aktivacijskiKod";
        mail($email, "Aktivacija računa", $poruka);
        $db->zatvoriDB();
        $pogreska="Registracija uspješna. Molimo provjerite Vaš email i potvrdite registraciju.";
    }

    echo json_encode($pogreska);

?>