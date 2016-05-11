<?php
/**
 * Gebruiker: Marnix
 * Datum: 11/05/2016
 * Bron: /
 */

?>
<html>
<head>
    <title>TODO supply a title</title>
    <?= link_tag('/assets/bootstrap/css/bootstrap.css') ?>
    <?= link_tag('/assets/bootstrap/css/customStyle.css') ?>

    <!--   <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/customStyle.css" type="text/css"/>
-->
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
            <li><?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?></li>
            <li class="active"><?php echo anchor(site_url(array('profiel_controller','index')),'Profiel');?></li>
            <li><?php echo anchor(site_url(array('home','logout')),'Afmelden'); ?></li>
        </ul>
    </nav>
    <div class="col-md-2"></div>
</header>
<div class="col-lg-12 main home">
   TODO
</div>
</body>
</html>
