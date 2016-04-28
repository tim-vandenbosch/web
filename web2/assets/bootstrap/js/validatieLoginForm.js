/**
 * Gebruiker: Britt
 * Datum: 28/04/2016
 * Bron: /
 */
function validateEmail() {
    var x = document.getElementById("user").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        event.preventDefault();
    } else
        alert("valid en sent");
}

function validatew8w() {

}