$(document).ready(function () {
    $("#novaKonfiguracija").submit(function (event) {
        event.preventDefault();
        var podaci = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "skripte/novaKonfiguracija.php",
            dataType: 'json',
            data: podaci,
            success: function (data) {
                if (data.kod) {
                    $("#kod-id").text(data.kod);
                }
                if (data.pomakSBarke) {
                    $("#pomak-id").text(data.pomakSBarke);
                }
                if (data.neuspjesne_prijave) {
                    $("#neuspjesne-prijave-id").text(data.neuspjesne_prijave);
                }
                if (data.trajanje_sesije) {
                    $("#trajanje-sesije-id").text(data.trajanje_sesije);
                }
                if (data.stranicenje) {
                    $("#stranicenje-id").text(data.stranicenje);
                }
            }

        });
    });
});