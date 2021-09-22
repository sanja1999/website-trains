function dohvatiSveIzlozbe() {
    $.ajax({
        type: "POST",
        url: "skripte/dohvatiSveVlakove.php?id=" +idIzlozba,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr>'
                red += dodajStupac(item.naziv);
                red += dodajStupac(item.opis);
                red += dodajStupac(item.vrsta_pogona);
                red += dodajStupac(item.maksimalna_brzina);
                red += dodajStupac(item.broj_sjedala);
                red += dodajStupacAkcije(item.vlak_id, item.statusIzlozbe);
                red += '</tr>'
                $('#vlakovi tr:last').after(red);
                
            });
        }
    });
}

function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}


function dodajStupacAkcije(id, statusIzlozbe) {
    var a = "";
    if (statusIzlozbe == 3 && mozeGlasati) {
        a = '<a class="glasajZa" href=\'#\' onclick="glasajZaVlak(' + id + ')">Glasaj za vlak</a>';
    }
    return dodajStupac(a);
}

function glasajZaVlak(id) {
    $('.glasajZa').hide();
     $.ajax({
         type: "GET",
         url: "skripte/glasovanje.php?vlakId="+id+"&izlozbaId="+idIzlozba ,
         dataType: 'json',
         success: function (data) {
            if (data) {
                alert("Uspješno ste glasali");
            }
       }
     });
}

function mozeGlasati() {
    $.ajax({
        type: "GET",
        url: "skripte/mozeGlasati.php?izlozbaId="+idIzlozba ,
        dataType: 'json',
        success: function (data) {
            mozeGlasati = data==0;
            
            dohvatiSveIzlozbe();
            dodajStupac();
      }
    });
}


var mozeGlasati;
$(document).ready(function () {

    mozeGlasati();

});