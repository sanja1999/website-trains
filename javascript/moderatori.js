$(document).ready(function () {

    dohvati();
    dohvatiTematike();

    $("#moderatoriIzlozbe").submit(function(event) {
        event.preventDefault();
        var podaci = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "skripte/dodajModeratoraTematici.php",
                dataType: 'json',
                data: podaci,
                success: function (data) {
                    alert(data.poruka);
                }
        
            });
    });

});

function dohvati() {
    dohvatiKorisnike(2, 'moderatori', false, 'moderatoriSelect');
    dohvatiKorisnike(3, 'registrirani', true);
}

function dohvatiKorisnike(ulogaId, tablicaId, akcija, selectId) {
    $.ajax({
        type: "GET",
        url: "skripte/korisniciPremaUlozi.php?uloga="+ulogaId,
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr id="'+tablicaId+item.korisnik_id+'">';
                red += dodajStupac(item.korisnicko_ime);
                red += dodajStupac(item.ime);
                red += dodajStupac(item.prezime);
                red += dodajStupac(item.email);
                if (akcija) {
                    red += dodajStupacAkcije(item.korisnik_id);
                }
                red += '</tr>';
                $('#'+tablicaId+' tr:last').after(red);
                if (selectId) {
                    $('#'+selectId).append($('<option>', { 
                        value: item.korisnik_id,
                        text : item.korisnicko_ime 
                    }));
                }
            });
        }
    });
}

function dohvatiTematike() {
    $.ajax({
        type: "GET",
        url: "skripte/dohvatiTematikeIzlozbeModeratori.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                $('#tematike').append($('<option>', { 
                    value: item.tematika_izlozbe_id,
                    text : item.naziv 
                }));
            });
        }
    });
}


function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}

function dodajStupacAkcije(id) {
    var a = '<a href=\'#\' onclick="postaviModeratora(' + id + ')">Postavi moderatora</a>';
    return dodajStupac(a);
}

function postaviModeratora(id) {
    $.ajax({
        type: "GET",
        url: "skripte/postaviModeratora.php?id=" + id,
        dataType: 'json',
        success: function (data) {
            
            alert(data.poruka);

            $('#moderatori td').empty();
            $('#registrirani td').empty();
            $('#moderatoriSelect').empty();
            
            dohvati();
        }
    });
}