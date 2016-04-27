<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>Nieuw Ticket</title>
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>/assets/bootstrap/css/customStyle.css" rel="stylesheet"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body id="background">
        <header class="container hoofding">
            <div id="pxlLine"></div>
            <img class="navbar-header" src="<?php echo base_url();?>asssets/Pictures/Logo_PXL.png" alt="PXL logo"/>
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
                <h1>Nieuw Ticket</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 main home ">
                <form>
                    <fieldset>
                        <label for="onderwerp">Onderwerp</label><input type="text" name="onderwerp" id="onderwerp"/>
                        <label for="type">Type</label>
                        <select name="type" id="type">
                            <option>IT</option>
                            <option>Elektronica</option>
                            <option>Faciliteiten</option>
                        </select>
                        <label for="prior">prioriteit</label>
                        <select name="prior" id="prior">
                            <option>Kritiek(1uur)</option>
                            <option>Dringend(4uur)</option>
                            <option>Hoog(2dagen)</option>
                            <option>Gemiddeld(1week)</option>
                            <option>Laag(3 maanden)</option>
                        </select>
                        <label for="campus">Locatie</label>
                        <select name="campus" id="campus">
                            <option>Elfde Linie</option>
                            <option>Diepenbeek</option>
                            <option>VilderStraat</option>
                        </select>
                        <select name="blok" id="blok">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                        </select>
                        <label for="lokaal">Lokaal</label><input name="lokaal" id="lokaal" type="text"/>
                        <label for="omschrijving">Omschrijving</label><textarea name="omschrijving" id="omschrijving"></textarea>
                        <label for="foto">Optioneel:foto</label>
                        <input id="foto" name="foto" type="file"/>
                        <button type="submit" name="submit" id="submit">Inzenden</button>
                    </fieldset>
                </form>
            
            </div>   
        </div>
    </body>
</html>

