<?php
include_once '../okvir.php';

$db=new Baza();
$db->spojiDB();
// TU NEŠ NE VALJA
$sql="SELECT ime,prezime,korisnicko_ime,lozinka,email,naziv FROM korisnik,uloga WHERE korisnik.uloga_uloga_id=uloga.uloga_id";
$rezultat=$db->selectDB($sql);
?>
<table>
<tr>
<th>Ime</th>
<th>Prezime</th>
<th>Korisničko ime</th>
<th>Lozinka</th>
<th>Email</th>
<th>Uloga</th>
</tr>
<?php
while ($red = $rezultat->fetch_array()) {
    echo "<tr><td>$red[0]</td><td>$red[1]</td><td>$red[2]</td><td>$red[3]</td><td>$red[4]</td><td>$red[5]</td></tr>";
}
$db->zatvoriDB();
?>
</table>