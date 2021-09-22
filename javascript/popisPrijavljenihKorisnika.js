function popisPrijavljenihKorisnika() {
    $.ajax({
        type: "POST",
        url: "skripte/dohvatiPopisPrijavljenihKorisnika.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr>'
                red += dodajStupac(item.ime);
                red += dodajStupac(item.prezime);
                red += dodajStupac(item.naziv);
                red += dodajStupacAkcija(item.pobjednik_pobjednik_id, item.korisnik_id);
                red += '</tr>'
                $('#pijavljeniKorisnici tr:last').after(red);
                
            });
        }
    });
}

function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}

function dodajStupacAkcija(pobjednik, korisnik) {
    var a = "";
    if (pobjednik==korisnik) {
        a += "Pobjednik izložbe";
    }
    return dodajStupac(a);
}


$(document).ready(function () {

    popisPrijavljenihKorisnika();

});