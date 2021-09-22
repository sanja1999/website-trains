$(document).ready(function () {

    dohvatiIzlozbe();
    dohvatiTematike();

    $("#dodajIzlozbu").submit(function(event) {
        event.preventDefault();
        var podaci = $(this).serialize();
        console.log(podaci);
        $.ajax({
            type: "POST",
            url: "skripte/dodajIzlozbu.php",
            dataType: 'json',
            data: podaci,
            success: function (data) {
                obrisiPolja();
                dohvatiIzlozbe();
                
                alert(data.poruka);
            }
    
        });
    });

});

function obrisiPolja() {
    $('#nazivIzlozbe').val('');
    $('#brojKorisnika').val('');
    $('#pocetak').val('');
    $('#kraj').val('');
}

function dohvatiIzlozbe() {
    $('#izlozbe td').empty();
    $.ajax({
        type: "GET",
        url: "skripte/dohvatiMojeIzlozbe.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr>';
                red += dodajStupac(item.naziv);
                red += dodajStupac(item.broj_korisnika);
                red += dodajStupac(item.pocetak);
                red += dodajStupac(item.kraj);
                red += dodajStupac(item.status_izlozbe_status_izlozbe_id);
                red += dodajStupacAkcije(item.izlozba_id, item.status_izlozbe_status_izlozbe_id, item.kraj);
                red += dodajStupacVidiPrijave(item.status_izlozbe_status_izlozbe_id, item.izlozba_id);
                red += '</tr>';
                $('#izlozbe tr:last').after(red);
            });
        }
    });
}

function dohvatiTematike() {
    $.ajax({
        type: "GET",
        url: "skripte/dohvatiTematikeIzlozbeModeratori.php?moderator=1",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                $('#tematika').append($('<option>', { 
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

function dodajStupacAkcije(id, status, kraj) {
    var a = "";
    if ((status == 1 || status == 2) ) { // otvorene prijave
        if (new Date() > new Date(kraj).addHours(pomakVremena)) {
            a = '<a href=\'#\' onclick="otvoriZatvoriGlasanje(' + id + ',3)">Otvori glasanje</a>';
        }
        
    }
    if (status == 3) { // otvoreno glasanje
        a = '<a href=\'#\' onclick="otvoriZatvoriGlasanje(' + id + ',4)">Zatvori glasanje</a>';
    }
    return dodajStupac(a);
}

function dodajStupacVidiPrijave(status, id) {
    var a = "";
    if (status == 1) {  
        a = '<a href=\'potvrdiPrijave.php?izlozbaId='+id+'\' >Pregledaj prijave</a>';
    }
    return dodajStupac(a);
}

function otvoriZatvoriGlasanje(id,status) {
     $.ajax({
         type: "GET",
         url: "skripte/otvaranjeZatvaranjeIzlozbi.php?id="+id+"&status="+status,
         dataType: 'json',
         success: function (data) {
            if (data) {
                alert("Status promijenjen");
                dohvatiIzlozbe();
            }
       }
     });
}

Date.prototype.addHours = function(h) {
    this.setTime(this.getTime() + (h*60*60*1000));
    return this;
  }