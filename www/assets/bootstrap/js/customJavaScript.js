 /*
     * Gebruiker: Britt
     * Datum: 28/04/2016
     * Bron: /
     */
    window.addEventListener('load', function () {
        var form = document.getElementById("myForm");
        form.addEventListener('submit',validateEmail);
    });

function validateEmail() {
    var x = document.getElementById("user").value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Geen geldig email, log in met je pxl email");
        event.preventDefault();
    } /*else
     alert("valid en sent");*/
}
 /* Author: Nida Ilyas **/
 $(document).ready(function () {
     $(".navbar-toggle").on("click", function () {
         $(this).toggleClass("active");
     });
 });

 function validate()
 {
     var r=confirm("Do you want to update this?")
     if (r==true)
         return true;
     else
         return false;
 }