$(document).ready(function () {

    dohvatiPrijave();

});

function dohvatiPrijave() {
    $('#prijave td').empty();
    $.ajax({
        type: "GET",
        url: "skripte/dohvatiPrijavePremaIzlozbi.php?izlozbaId="+izlozbaId,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr>';
                red += dodajStupac(item.naziv);
                red += dodajStupac(item.opis);
                red += dodajStupac(item.vlakNaziv);
                red += dodajStupac(item.vrsta_pogona);
                red += dodajStupac(item.maksimalna_brzina);
                red += dodajStupac(item.broj_sjedala);
                red += dodajStupac(item.status_status_id);
                red += dodajStupacAkcije(item.zahtjev_za_prijavu_id, item.status_status_id)
                red += '</tr>';
                $('#prijave tr:last').after(red);
                
            });
        }
    });
}


function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}

function dodajStupacAkcije(id, status) {
    var a = "";
    if (status == 2 || status == 3) {
        a += '<a href=\'#\' onclick="promjeniStatus(' + id + ', 1)">Prihvati</a>';
        if(status == 3) {
            a+='<br>';
        }
    } if (status == 1 || status == 3) {
        a += '<a href=\'#\' onclick="promjeniStatus(' + id + ', 2)">Odbij</a>';
    }
    return dodajStupac(a);
}

function promjeniStatus(id,status) {
    $.ajax({
        type: "GET",
        url: "skripte/promijeniStatusPrijave.php?id="+id+"&status="+status,
        dataType: 'json',
        success: function (data) {
           if (data) {
               alert("Status promijenjen");
               dohvatiPrijave();
           }
      }
    });
}