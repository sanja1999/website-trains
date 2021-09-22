function accessibilityKlik() {
    let style = document.getElementById("accessibility-style");
    style.disabled = !style.disabled;
}

window.addEventListener('load', function () {

    document.getElementById("accessibility").addEventListener("click", accessibilityKlik);
    document.getElementById("accessibility-style").disabled = true;

});