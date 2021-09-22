function dohvatiSveIzlozbe() {
    $.ajax({
        type: "POST",
        url: "skripte/dohvatiSveIzlozbe.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr>'
                red += dodajStupac(item.naziv);
                red += dodajStupac(item.statusIzlozbe);
                red += dodajStupacAkcije(item.izlozba_id, item.naziv);
                red += '</tr>'
                $('#izlozbe tr:last').after(red);
                
            });
        }
    });
}

function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}


function dodajStupacAkcije(id, naziv) {
    var a = '<a href=\'pregledVlakova.php?id='+id+'&naziv='+naziv+'\'>Detaljnije</a>';
    return dodajStupac(a);
}

$(document).ready(function () {

    dohvatiSveIzlozbe();
    dodajStupac();

});