<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 13:19
 */
?>
<head>
<!--<script  type="text/javascript" src="/assets/bootstrap/js/sorttable.js"></script>µ-->
 <!--   <script type="text/javascript" src="/assets/bootstrap/js/jquery.tablesorter.js">
    $(document).ready(function(){
    $(function(){
    $("#mytable").tablesorter();
    });
    });
    </script>-->
<!--   bronnen : http://www.kryogenix.org/code/browser/sorttable/
http://tutsme-webdesign.info/bootstrap-3-sortable-table/ -->
</head>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <h1>Overzicht alle tickets</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h2>Welkom dispatcher</h2>
        </div>
        <div class="col-md-8 right">
            <p>Als dispatcher heb je het recht alle ticets te beheren.
            Dit houd in dat je de prioriteteiten en statussen kunt aanpassen en tickets kan toekennen aan werkmannen.
            </p>
        </div>
        <div class="col-md-12 center">
<!--            id="myTable" class="table tablesorter"-->
            <table class="table table-striped"   > <!-- class="table table-striped"  class="sortable" -->
                <thead>
                <tr>
                    <th>TicketId</th>
                    <th>Onderwerp</th>
                    <th>Prioriteit</th>
                    <th>Type</th>
                    <th>Campus</th>
                    <th>Blok</th>
                    <th>Lokaal</th>
                    <th>Status</th>
                    <th>Beheren</th>
                </tr>
                </thead>
            

                <tbody>
                <?php foreach($tickets as $ticket):?>
                    <tr>
                        <td> <?= htmlentities($ticket ->ticketID,ENT_QUOTES,'UTF-8');?></td>
                        <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                        <td> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                        <td> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>
                  <!--  <?php /*foreach($campussen as $camp):*/?> //poging tot campusnaam te laten verschijnen
                        --><?php /*if($ticket ->campusID == $campussen ->campusID) : */?>
                            <td> <?= htmlentities($ticket ->naam,ENT_QUOTES,'UTF-8');?></td>
                       <!-- <?php /*endif; */?>
                        --><?php /*endforeach;*/?>
                        <td> <?= htmlentities($ticket ->blokLetter,ENT_QUOTES,'UTF-8');?></td>
                        <td> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                        <!--<td> <?/*//= htmlentities($ticket ->herstellingDatum,ENT_QUOTES,'UTF-8');*/?></td>-->
                   <td> <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                        <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('Dispatcher','details')),'Details');?></button></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
</div>
