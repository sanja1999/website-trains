$(document).ready(function () {

    dohvatiMojePrijave();
    popuniIzlozbe();

    $("#prijavaNaIzlozbu").submit(function(event) {
        event.preventDefault();
        if (provjera()) {
        var podaci = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "skripte/prijavaNaIzlozbuSkripta.php",
                dataType: 'json',
                data: podaci,
                success: function (data) {
                    alert(data.pogreska);
                    if (data.uspjesno) {
                        var red = '<tr>'
                        red += dodajStupac($("#izlozba option[value='" + data.izlozbaId + "']").text());
                        red += dodajStupac(data.prijavaNaziv);
                        red += dodajStupac(data.prijavaOpis);
                        red += dodajStupac("Neobrađena");
                        red += dodajStupacAkcije(data.prijavaId);
                        red += '</tr>'
                        $('#prijave tr:last').after(red);
                    }
                    obrisiPolja();
                }
        
            });
        }
    });

});

function obrisiPolja() {
    $('#nazivPrijave').val('');
    $('#opisPrijave').val('');
    $('#naziv').val('');
    $('#opis').val('');
    $('#vrsta').val('');
    $('#maxBrzina').val('');
    $('#brojSjedala').val('');
}

function dohvatiMojePrijave() {
    $.ajax({
        type: "POST",
        url: "skripte/dohvatiMojePrijave.php",
        dataType: 'json',
        success: function (data) {
            $.each(data, function (i, item) {
                var red = '<tr id="prijava'+item.zahtjev_za_prijavu_id+'">'
                red += dodajStupac(item.izlozbaNaziv);
                red += dodajStupac(item.naziv);
                red += dodajStupac(item.opis);
                red += dodajStupac(item.statusNaziv);
                red += dodajStupacAkcije(item.zahtjev_za_prijavu_id);
                red += '</tr>'
                $('#prijave tr:last').after(red);
            });
        }
    });
}

function dodajStupacAkcije(id) {
    var a = '<a href=\'#\' onclick="obrisiPrijavu(' + id + ')">Obriši</a>';
    return dodajStupac(a);
}

function dodajStupac(polje) {
    return '<td>' + polje + '</td>';
}

function obrisiPrijavu(id) {
    var red = $('#prijava'+id);
    $.ajax({
        type: "GET",
        url: "skripte/obrisiPrijavu.php?id=" + id,
        dataType: 'json',
        success: function (data) {
            red.remove();
            alert(data.poruka);
        }
    });
}

function popuniIzlozbe() {
    $.ajax({
        type: "GET",
        url: "skripte/dohvatiIzlozbeId.php",
        dataType: 'json',
        success: function (json)
        {
            $.each(json, function (i, item) {
                $('#izlozba').append($('<option>', { 
                    value: item.izlozba_id,
                    text : item.naziv 
                }));
            });
        }
    });
}

function provjera1() {
    if ($('#nazivPrijave').val() == "") {
        $('#nazivPrijave').attr("style", "border-color:red");
        $('#nazivPrijave-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        $("#nazivPrijave").removeAttr("style", "border-color:red");
        $('#nazivPrijave-pogreska').text("");
        return true;
    }
}

function provjera2(){
    if ($('#naziv').val() == "") {
        $('#naziv').attr("style", "border-color:red");
        $('#naziv-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        $("#naziv").removeAttr("style", "border-color:red");
        $('#naziv-pogreska').text("");
        return true;
    }
}

function provjera3(){
    if ($('#opis').val() == "") {
        $('#opis').attr("style", "border-color:red");
        $('#opis-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        $("#opis").removeAttr("style", "border-color:red");
        $('#opis-pogreska').text("");
        return true;
    }
}

function provjera4(){
    if ($('#vrsta').val() == "") {
        $('#vrsta').attr("style", "border-color:red");
        $('#vrsta-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        $("#vrsta").removeAttr("style", "border-color:red");
        $('#vrsta-pogreska').text("");
        return true;
    }
}

function provjera4(){
    if ($('#maxBrzina').val() == "") {
        $('#maxBrzina').attr("style", "border-color:red");
        $('#maxBrzina-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        $("#maxBrzina").removeAttr("style", "border-color:red");
        $('#maxBrzina-pogreska').text("");
        return true;
    }
}

function provjera5(){
    if ($('#brojSjedala').val() == "") {
        $('#brojSjedala').attr("style", "border-color:red");
        $('#brojSjedala-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        $("#brojSjedala").removeAttr("style", "border-color:red");
        $('#brojSjedala-pogreska').text("");
        return true;
    }
}

function provjera6(){
    var ret;
    var reg = /^\d+$/;
    if (reg.test($('#brojSjedala').val())) {
        $("#brojSjedala").removeAttr("style", "border-color:red");
        $('#brojSjedala-pogreska').text("");
        ret = true;
    }
    else {
        $("#brojSjedala").attr("style", "border-color:red");
        $('#brojSjedala-pogreska').text("Nije upisano u ispravnom obliku");
        ret = false;
    }
    return ret;
}

function provjera7(){
    var ret;
    var reg = /^\d+$/;
    if (reg.test($('#maxBrzina').val())) {
        $("#maxBrzina").removeAttr("style", "border-color:red");
        $('#maxBrzina-pogreska').text("");
        ret = true;
    }
    else {
        $("#maxBrzina").attr("style", "border-color:red");
        $('#maxBrzina-pogreska').text("Nije upisano u ispravnom obliku");
        ret = false;
    }
    return ret;
}


function provjera() {
    return provjera1() &&
    provjera2() &&
    provjera3() &&
    provjera4() &&
    provjera5() &&
    provjera6() &&
    provjera7();
}
    
