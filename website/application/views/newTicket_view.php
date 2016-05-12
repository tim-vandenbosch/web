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
            <li class="active"><?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?></li>
            <li><?php echo anchor(site_url(array('profiel_controller','index')),'Profiel');?></li>
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
            <h2><!--titel--></h2>
        </div>
        <div class="col-md-8 right">
            <!-- hier kan nog eventuele uitleg over overzicht-->
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 center ">
                <form class="" role="form">
                    <fieldset>
                        <div class="from-group row">
                            <label class="">ID</label>
                            <label class="" id="ticketId" name="ticketId"><?php echo $ticket+1; ?></label>
                        </div>
                        <div class="from-group row">
                            <label class="" for="onderwerp">Onderwerp</label>
                            <input class="form-control " type="text" name="onderwerp" id="onderwerp"/>
                        </div>
                        <div class="form-group row">
                            <label class="" for="type">Type</label>
                            <select class="" name="type" id="type">
                                <option>IT</option>
                                <option>Elektronica</option>
                                <option>Faciliteiten</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="" for="prior">prioriteit</label>
                            <select class="" name="prior" id="prior">
                                <option value="1">Kritiek(1uur)</option>
                                <option value="2">Dringend(4uur)</option>
                                <option value="3">Hoog(2dagen)</option>
                                <option value="4">Gemiddeld(1week)</option>
                                <option value="5">Laag(3 maanden)</option>
                            </select>
                        </div>
                        <div class="from-group row">
                            <label class="" for="campus">Locatie</label>
                            <select class="" name="campusId" id="campusId">
                                <option value="1">Elfde Linie</option>
                                <option value="2">Diepenbeek</option>
                                <option value="3">VilderStraat</option>
                            </select>
                            <select class="" name="blokId" id="blokId">
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                            </select>
                        </div>
                        <div class="from-group row">
                            <label class="" for="lokaal">Lokaal</label>
                            <input class="form-control " name="lokaal" id="lokaal" type="text"/>
                        </div>
                        <div class="form-group row">
                            <label class="" for="omschrijving">Omschrijving</label>
                            <textarea class="form-control" rows="3" name="omschrijving" id="omschrijving"></textarea>
                        </div>
                        <div class="from-group row">
                            <label class="" for="foto">Optioneel:foto</label>
                            <input class="form-controlZ" id="foto" name="foto" type="file"/>
                        </div>
                        <button class="btn btn-default" type="submit" name="submit" id="submit">Inzenden</button>
                    </fieldset>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>


</body>
</html>
