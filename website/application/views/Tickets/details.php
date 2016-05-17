<?php
/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 17/05/2016
 * Time: 14:28
 */
?>
<div class="row">
    <div class="col-md-7 col-md-offset-2 titel">

        <?php foreach($query as $quer):?>
<h1>Details van ticket <?= htmlentities($quer ->ticketID,ENT_QUOTES,'UTF-8');?></h1>
</div>
</div>

    <div class="col-md-7 col-md-offset-2 main home ">
        </br>
        <div class="row">
            <h4 class="col-md-1"> <span class="label label-success"> <a style="color: white" href="<?php echo site_url('home/index')?>">Terug naar overzicht tickets</a>
        </div>
        <div class="col-md-6 left">

            <h2><?= htmlentities($quer ->onderwerp,ENT_QUOTES,'UTF-8');?></h2>
        </div>
        <div class="col-md-6 right">

        </div>

        <div class="col-md-12">
            <!--<div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">-->

                <h4>Informatie ticket</h4>
                <div class="row">
                    <div class="col-md-5">
                    <label for="text">Type:</label>
                    <input disabled type="text" class="form-control"  value=<?= htmlentities($quer ->type,ENT_QUOTES,'UTF-8');?> id="type">
                        </div>
                    <div class="col-md-5">
                    <label for="text">Onderwerp</label>
                    <p disabled type="text" class="form-control" id="ont"><?= htmlentities($quer ->onderwerp,ENT_QUOTES);?></p>
                        </div>
                </div>
            <div class="row">
                <div class="col-md-3">
                <label for="text">Status</label>
                <p disabled type="text" class="form-control" id="ont"><?= htmlentities($quer ->status,ENT_QUOTES);?></p>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-10">
                    <label for="text">Omschrijving:</label>
                    <textarea disabled class="form-control" rows="5" id="Omschrijving"> <?= htmlentities($quer ->omschrijving,ENT_QUOTES,'UTF-8');?></textarea>
</div>
                </div>
            <!--</br>-->
            <hr style="border-top: 1.5px dotted green"/>
<div class="row">
    <a href="#moreDetails" class="btn btn-success" data-toggle="collapse">Meer</a>
</div>


                <div id="moreDetails" class="collapse">

            <h4>Locatie</h4>
            <div class="row">
                <div class="col-md-5">
                    <label for="text">Campus</label>
                    <p disabled type="txt" class="form-control" id="ont">
                        <?=htmlentities($quer ->naam,ENT_QUOTES,'UTF-8');?></p>
                </div>


                <div class="col-md-5">
                    <label for="text">Blok en lokaal</label>
                    <p disabled type="txt" class="form-control" id="ont">
                        <?=htmlentities($quer ->blokLetter,ENT_QUOTES,'UTF-8'), htmlentities($quer ->lokaalNummer,ENT_QUOTES,'UTF-8');?></p>
                </div>
            </div>
            </br>


            <div class="row">
                <div class="col-md-5">
                    <label for="text">Aanmaker</label>
                    <input disabled type="email" class="form-control" id="ont" value=<?= htmlentities($quer ->email,ENT_QUOTES,'UTF-8');?>>
                </div>
                <div class="col-md-5">
                    <label for="text">Meldingdatum:</label>
                    <input disabled type="date" class="form-control"  value=<?= htmlentities($quer ->datum,ENT_QUOTES,'UTF-8');?> id="datum">
                </div>
            </div>


                    </br>
            <div class="row">
                <div class="col-md-4">
                    <label for="text">Prioriteit:</label>
                    <input disabled type="text" class="form-control" id="ont" value=<?= htmlentities($quer ->prioriteit,ENT_QUOTES,'UTF-8');?>>
                    </div>
                <div class="col-md-3">
                    <label for="text">Deadline:</label>
                    <input disabled type="date" class="form-control" id="ont" value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8');?>>
                </div>
                <div class="col-md-3">
                    <label for="text">Herstellingdatum:</label>
                    <input disabled type="date" class="form-control" id="ont" value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8');?>>
                </div>
                </div>


 </div>
            </br>
                <?php endforeach;?>
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