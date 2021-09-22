$(document).ready(function () {

    dohvatiKorisnike();

});


function dohvatiKorisnike() {
    $.ajax({
        type: "POST",
        url: "skripte/korisnici.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr id="korisnik'+item.korisnik_id+'">';
                red += dodajStupac(item.korisnicko_ime);
                red += dodajStupac(item.ime);
                red += dodajStupac(item.prezime);
                red += dodajStupac(item.email);
                red += dodajStupac(item.neuspjesne_prijave);
                red += dodajStupac(item.status, 'status');
                red += dodajStupacAkcije(item.korisnik_id, item.status);
                red += '</tr>';
                $('#korisnici tr:last').after(red);
                
            });
        }
    });
}

function dodajStupac(polje, klasa) {
    var ret = '<td';
    if (klasa) {
        ret += ' class="'+klasa+'"';
    }
    ret += '>' + polje + '</td>';
    return ret;
}


function dodajStupacAkcije(id, status) {
    var naziv = status==0 ? 'Otključaj' : 'Blokiraj';
    var a = '<a href=\'#\' onclick="promjeniStatus(' + id + ')">'+naziv+'</a>';
    return dodajStupac(a);
}

function promjeniStatus(id) {
    var red = $('#korisnik'+id);
    $.ajax({
        type: "GET",
        url: "skripte/promjeniStatusKorisnika.php?id=" + id,
        dataType: 'json',
        success: function (data) {
            var polje = red.find('.status');
            var text = polje.text();
            if (text == '0') {
                text = '1';
            } else {
                text = '0';
            }
            polje.text(text);

            polje = red.find('a');
            text = polje.text();
            if (text == 'Otključaj') {
                text = 'Blokiraj';
            } else {
                text = 'Otključaj';
            }
            polje.text(text);

            alert(data.poruka);
        }
    });
}