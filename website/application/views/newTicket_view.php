<?php
/**
 * Gebruiker: Marnix
 * Datum: 26/04/2016
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
            <li class="active"><a href="TemplateHome.html">Home</a></li>
            <li><a href="#">Testscreen</a></li>
        </ul>
    </nav>
    <div class="col-md-2"></div>
</header>
<div class="col-lg-12 main home">
    <form>
        <fieldset>
            <label>ID</label><label id="ticketId" name="ticketId"></label>
            <label for="onderwerp">Onderwerp</label><input type="text" name="onderwerp" id="onderwerp"/>
            <label for="type">Type</label>
            <select name="type" id="type">
                <option>IT</option>
                <option>Elektronica</option>
                <option>Faciliteiten</option>
            </select>
            <label for="prior">prioriteit</label>
            <select name="prior" id="prior">
                <option value="1">Kritiek(1uur)</option>
                <option value="2">Dringend(4uur)</option>
                <option value="3">Hoog(2dagen)</option>
                <option value="4">Gemiddeld(1week)</option>
                <option value="5">Laag(3 maanden)</option>
            </select>
            <label for="campus">Locatie</label>
            <select name="campusId" id="campusId">
                <option value="1">Elfde Linie</option>
                <option value="2">Diepenbeek</option>
                <option value="3">VilderStraat</option>
            </select>
            <select name="blokId" id="blokId">
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select>
            <label for="lokaal">Lokaal</label><input name="lokaal" id="lokaal" type="text"/>
            <label for="omschrijving">Omschrijving</label><textarea name="omschrijving" id="omschrijving"></textarea>
            <label for="foto">Optioneel:foto</label>
            <input id="foto" name="foto" type="file"/>
            <button type="submit" name="submit" id="submit">Inzenden</button>
        </fieldset>
    </form>
</div>
</body>
</html>
