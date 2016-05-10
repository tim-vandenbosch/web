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
            <li class="active"><a href="TemplateHome.html">Overzicht</a></li>
            <li><a href="#">Nieuw Ticket</a></li>
            <li><a href="#">Profiel</a></li>
            <li><a href="#">Afmelden</a></li>
        </ul>
    </nav>
    <div class="col-md-2"></div>
</header>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <h1>Overzicht</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h2>Tickets</h2>
        </div>
        <div class="col-md-8 right">
            <div>LALALALALA tekst</div>
        </div>
        <div class="row">
            <div class="col-md-12 center">
                    <?php if(count($tickets)>0): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><td>lekker zelf doen</td></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tickets as $ticket):?>
                            <tr>
                                <td> <?= htmlentities($ticket ->ticketID,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->campusID,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->BlokID,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->herstellingDatum,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php endif;  ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn-default">
                    Nieuw Ticket
                </button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
