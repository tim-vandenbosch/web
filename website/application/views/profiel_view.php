<?php
/**
 * Gebruiker: Marnix
 * Datum: 26/04/2016
 * Bron: /
 */
?>
<html>
<head>
    <title>User ticket</title>
    <?= link_tag('/assets/bootstrap/css/bootstrap.css') ?>
    <?= link_tag('/assets/bootstrap/css/customStyle.css') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="background">
<header class="container hoofding">
    <div id="pxlLine"></div>
    <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
    <nav class="nav">
        <ul class="nav navbar-nav navbar-style">
            <li><?php echo anchor(array('home','index'),'Overzicht'); ?></li>
            <li"><?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?></li>
            <li class="active"><?php echo anchor(site_url(array('profiel_controller','index')),'Profiel');?></li>
            <li><?php echo anchor(site_url(array('home','logout')),'Afmelden'); ?></li>
        </ul>
    </nav>
    <div class="col-md-2"></div>
</header>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <h1>Nieuw Ticket</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h2><!--lefttitle--></h2>
        </div>
        <div class="col-md-8 right">
            <!-- hier kan nog eventuele uitleg over overzicht-->
        </div>
        <div class="row">
            <div class="col-md-12 center">
                <!--hier invullen-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn-default">
                    <?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?>
                </button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
