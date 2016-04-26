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
<!--
<?php
/**
 * Edit
 * Gebruiker: britt
 * Datum: 26/04/2016
 * Bron: https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#theform
 */
?>
<?php echo validation_errors(); ?> -->
<!-- <?php echo form_open('form'); ?> -->

<header class="container hoofding">
    <div id="pxlLine"></div>
    <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
    <h1 class="col-md-8">HOGESCHOOL PXL</h1>
    <div class="col-md-2"></div>
</header>
<div class="container main login">
    <h2 class="col-md-12">Ticketingsysteem</h2>
    <form class="col-md-12">
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
