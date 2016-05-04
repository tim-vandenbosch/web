<!DOCTYPE html>
<html>
<head>
   <!-- <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/bootstrap/css/customStyle.css" rel="stylesheet"/> -->
    <?= link_tag('assets/bootstrap/css/bootstrap.css"') ?>
    <?= link_tag('assets/bootstrap/css/customStyle.css"') ?>
    <title>Tickets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script type="text/javascript">
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
            alert("Not a valid e-mail address");
            event.preventDefault();
        } /*else
            alert("valid en sent");*/
    }
</script>

<body id="background">
<header class="container hoofding">
    <div id="pxlLine"></div>
    <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
    <h1 class="col-md-8">HOGESCHOOL PXL</h1>
    <div class="col-md-2"></div>
</header>
<div class="container main login">
    <h2 class="col-md-12">Ticketingsysteem</h2>
    <form class="col-md-12" action="" id="myForm" method="post">
        <div class="form-group">
            <label for="user">Gebruiker: </label>
            <input class="form-control" name="user" id="user" type="text" value="<?php echo set_value('email'); ?>"/>
        <div class="form-group">
            <label for="password">Wachtwoord: </label>
            <input class="form-control" name="password" id="password" type="password" value="<?php echo set_value('password'); ?>"/><br>
        </div>
        <a href="">wachtwoord vergeten?</a><br>
        <button type="submit" name="login">Inloggen</button>
    </form>
</div>
</body>
</html>