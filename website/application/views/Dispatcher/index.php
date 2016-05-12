<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 13:19
 */
?>
<!--<script src="'/assets/bootstrap/js/sorttable.js'"></script>-->
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
            <table class="table table-striped "> <!-- class="sortable" -->
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Onderwerp</th>
                    <th>Prioriteit</th>
                    <th>Type</th>
                    <th>Campus</th>
                    <th>Blok</th>
                    <th>lokaalNr</th>
<!--                    <th>Herstellings datum</th>-->
                    <th>Status</th>
                    <th>Beheren</th>
                    <!--  <th>Locatie </th>-->

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
                            <td> <?= htmlentities($ticket ->campusID,ENT_QUOTES,'UTF-8');?></td>
                       <!-- <?php /*endif; */?>
                        --><?php /*endforeach;*/?>
                        <td> <?= htmlentities($ticket ->blokID,ENT_QUOTES,'UTF-8');?></td>
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
