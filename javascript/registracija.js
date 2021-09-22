$(document).ready(function () {
    $("#forma_registracija").submit(function (event) {
        event.preventDefault();
        if (provjera()) {
            var podaci = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "skripte/registracijaSkripta.php",
                dataType: 'json',
                data: podaci,
                success: function (data) {
                    alert(data);
                }

            });
        }
    });


});


function provjeraKorImena() {
    var kime = $('#korime').val();
    var ret;
    if (kime.length === 0) {
        $("#korime").attr("style", "border-color:red");
        $('#korime-pogreska').text("Polje korisničko ime nije popupnjeno");
        return false;
    }
    $.ajax({
        type: "GET",
        url: "skripte/dohvacanjeKorisnika.php?kime=" + kime,
        dataType: 'json',
        async: false,
        success: function (data) {
            if (data.length === 1) {
                $("#korime").attr("style", "border-color:red");
                $('#korime-pogreska').text("Navedeno korisničko ime se već koristi");
                ret = false;
            }
            else {
                $("#korime").removeAttr("style", "border-color:red");
                $('#korime-pogreska').text("");
                ret = true;
            }
        }

    });
    return ret;
}

function proveraImena() {
    if ($('#ime').val() == "") {
        $('#ime').attr("style", "border-color:red");
        $('#ime-pogreska').text("Polje ime nije popupnjeno");
        return false;
    }
    else {
        $("#ime").removeAttr("style", "border-color:red");
        $('#ime-pogreska').text("");
        return true;
    }
}

function provjeraPrezimena() {
    if ($('#prez').val() == "") {
        $('#prez').attr("style", "border-color:red");
        $('#prez-pogreska').text("Polje prezime nije popupnjeno");
        return false;
    }
    else {
        $("#prez").removeAttr("style", "border-color:red");
        $('#prez-pogreska').text("");
        return true;
    }
}

function minimalniZnakoviLozinke() {
    if ($('#lozinka1').val().length < 6) {
        $('#lozinka1').attr("style", "border-color:red");
        $('#lozinka1-pogreska').text("Lozinka mora sadržavati minimalno 6 znakova");
        return false;
    }
    else {
        $("#lozinka1").removeAttr("style", "border-color:red");
        $('#lozinka1-pogreska').text("");
        return true;
    }
}


function provjeraEmaila() {
    var ret;
    var reg = /^[a-zA-Z0-9-.]+@[a-zA-Z0-9]+\.+[a-zA-Z0-9]{2,3}$/;
    if (reg.test($('#email').val())) {
        $("#email").removeAttr("style", "border-color:red");
        $('#email-pogreska').text("");
        $.ajax({
            type: "GET",
            url: "skripte/dohvacanjeEmaila.php?email=" + $('#email').val(),
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data.length === 1) {
                    $("#email").attr("style", "border-color:red");
                    $('#email-pogreska').text("Navedeni email se već koristi");
                    ret = false;
                }
                else {
                    $("#email").removeAttr("style", "border-color:red");
                    $('#email-pogreska').text("");
                    ret = true;
                }
            }
        });
    }
    else {
        $("#email").attr("style", "border-color:red");
        $('#email-pogreska').text("Email nije upisan u ispravnom obliku");
        ret = false;
    }
    return ret;
}

function potvrdaLozinke() {
    if ($('#lozinka2').val() !== $('#lozinka1').val()) {
        $("#lozinka2").attr("style", "border-color:red");
        $('#lozinka2-pogreska').text("Lozinke se ne poklapaju");
        return false;
    }
    else {
        $("#lozinka2").removeAttr("style", "border-color:red");
        $('#lozinka2-pogreska').text("");
        return true;
    }
}

function provjeraDatuma() {
    if ($('#danRod').val() == "") {
        $('#danRod').attr("style", "border-color:red");
        $('#danRod-pogreska').text("Polje nije popupnjeno");
        return false;
    }
    else {
        //$("#danRod").removeAttr("style", "border-color:red");
        //$('#danRod-pogreska').text("");

        var datum = new Date($('#danRod').val());
        var sada = new Date();

        if (sada.getFullYear() - datum.getFullYear() > 18) {
            $("#danRod").removeAttr("style", "border-color:red");
            $('#danRod-pogreska').text("");
            return true;
        }
        else {
            if (sada.getFullYear() - datum.getFullYear() == 18) {
                if (sada.getMonth() == datum.getMonth()) {
                    if (datum.getDay() > sada.getDay()) {
                        $('#danRod').attr("style", "border-color:red");
                        $('#danRod-pogreska').text("Morate imati minimalno 18 godina");
                        return false;
                    }
                    else {
                        $("#danRod").removeAttr("style", "border-color:red");
                        $('#danRod-pogreska').text("");
                        return true;
                    }

                }
                else if (sada.getMonth() >= datum.getMonth()) {
                    $("#danRod").removeAttr("style", "border-color:red");
                    $('#danRod-pogreska').text("");
                    return true;
                }
                else {
                    $('#danRod').attr("style", "border-color:red");
                    $('#danRod-pogreska').text("Morate imati minimalno 18 godina");
                    return false;
                }
            }
            else {
                $('#danRod').attr("style", "border-color:red");
                $('#danRod-pogreska').text("Morate imati minimalno 18 godina");
                return false;
            }
        }
    }
}

function provjera() {
    //return true;
    return provjeraKorImena() &&
        proveraImena() &&
        provjeraPrezimena() &&
        minimalniZnakoviLozinke() &&
        provjeraEmaila() &&
        potvrdaLozinke() &&
        provjeraDatuma();

}
