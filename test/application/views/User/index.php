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
     <!--   <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>/assets/bootstrap/css/customStyle.css" rel="stylesheet"/> -->
        <?= link_tag('assets/bootstrap/css/bootstrap.css"') ?>
        <?= link_tag('assets/bootstrap/css/customStyle.css"') ?>
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
                <!--hier moet de table komen-->
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
