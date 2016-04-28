<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>/assets/bootstrap/css/customStyle.css" rel="stylesheet"/>
    <title>Tickets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="background">
<header class="container hoofding">
    <div id="pxlLine"></div>
    <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
    <h1 class="col-md-8">HOGESCHOOL PXL</h1>
    <div class="col-md-2"></div>
</header>
<div class="container main login">
    <h2 class="col-md-12">Ticketingsysteem</h2>
    <form class="col-md-12" action="" onsubmit="return(validate());>
        <div class="form-group">
            <label for="user">Gebruiker: </label>
            <input class="form-control" name="user" id="user" type="text" />
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord: </label>
            <input class="form-control" name="password" id="password" type="password" /><br>
        </div>
        <a href="">wachtwoord vergeten?</a><br>
        <button type="submit" >Inloggen</button>
    </form>
</div>
</body>
</html>
