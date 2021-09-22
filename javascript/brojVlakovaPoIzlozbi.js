function brojVlakovaPoIzlozbi() {
    $.ajax({
        type: "POST",
        url: "skripte/dohvatiBrojVlakovaPoIzlozbi.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                console.log(item);
                var red = '<tr>'
                red += dodajStupac(item.naziv);
                red += dodajStupac(item.brojPrijava);
                red += '</tr>'
                $('#statistika tr:last').after(red);
                
            });
        }
    });
}

function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}


$(document).ready(function () {

    brojVlakovaPoIzlozbi();
    dodajStupac();

});