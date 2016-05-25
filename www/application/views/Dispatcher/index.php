<?php
/* @author = Daniela Lupo
 * Date = 10/05/2016
 * Bron : http://stackoverflow.com/questions/2997288/calling-controller-methods-from-inside-view-in-codeigniter
 */
?>
<head>
</head>
<div class="row">
    <div class="col-md-7 col-md-offset-2 titel">
        <h1>Overzicht alle tickets</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h2>Welkom dispatcher</h2>
        </div>
        <div class="col-md-7 right">
            <br/>
            <p>Als dispatcher heb je het recht alle tickets te beheren.
            Dit houd in dat je de prioriteteiten en statussen kunt aanpassen en tickets kan toekennen aan werkmannen.
            </p>
        </div>
        <div class="col-md-12 center">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th class="hidden-sm hidden-xs">TicketId</th>
                        <th>Onderwerp</th>
                        <th class="hidden-sm hidden-xs">Prioriteit</th>
                        <th class="hidden-sm hidden-xs">Type</th>
                        <th class="hidden-sm hidden-xs">Campus</th>
                        <th class="hidden-sm hidden-xs">Blok</th>
                        <th class="hidden-sm hidden-xs">Lokaal</th>
                        <th>Status</th>
                        <th>Beheren</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tickets as $ticket):?>
                        <tr>
                            <td class="hidden-sm hidden-xs"> <?= $ticketid =  htmlentities($ticket ->ticketID,ENT_QUOTES,'UTF-8');?></td>
                            <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                            <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                            <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>
                            <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->naam,ENT_QUOTES,'UTF-8');?></td>
                            <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->blokLetter,ENT_QUOTES,'UTF-8');?></td>
                            <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                            <td> <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo anchor(site_url(array('Dispatcher','details', $ticketid,"noupdate")),'Details');?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="pull-right col-md-1">
                <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                    <i class="glyphicon glyphicon-chevron-up"> </i>
                </a>
            </div>
        </div>
        <br>
    </div>
</div>