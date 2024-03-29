<?php
/* @author = Nida Ilyas
 * Date = 17/05/2016
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <?php foreach($query as $quer):?>
        <h1>Details van ticket <?= htmlentities($quer ->ticketID,ENT_QUOTES,'UTF-8');?></h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    </br>
    <div class="row">
        <h4 class="col-md-1"> <span class="label label-success"> <a style="color: white" href="<?php echo site_url('Werkman/showTicketsToDo')?>">Terug naar tickets To-Do</a> </span></h4>
    </div>

    <div class="col-md-6 left">
        <h2><?= htmlentities($quer ->onderwerp,ENT_QUOTES,'UTF-8');?></h2>
    </div>

    <div class="col-md-6 right"></div>
    <div class="col-md-12">
        <!--<div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">-->
        <p hidden><?= $ticketid =  $quer ->ticketID;?></p>
        <form  role="form" method="post" action="<?php echo  site_url(array('Werkman','update', $ticketid))?>">
            <?php if($message != "") : ?>
                <h1><b><?php echo $message;?></b></h1>
            <?php endif; ?>
            <h4>Informatie ticket</h4>
            <div class="row">
                <div class="col-md-5">
                    <label for="text"><i class="glyphicon glyphicon-tags"> </i> Type</label>
                    <input disabled type="text" class="form-control"  value=<?= htmlentities($quer ->type,ENT_QUOTES,'UTF-8');?> id="type">
                </div>
                <div class="col-md-5">
                    <label for="text"><i class="glyphicon glyphicon-asterisk"> </i>Onderwerp</label>
                    <p disabled type="text" class="form-control" id="ont"><?= htmlentities($quer ->onderwerp,ENT_QUOTES);?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label label-danger" for="sel1"><i class="glyphicon glyphicon-flag"> </i>Selecteer een status</label>
                        <select class="form-control" id="satus" name="dstatus">
                            <option hidden > <?= htmlentities($quer ->status,ENT_QUOTES,'UTF-8');?></option>
                            <?php foreach ($stat as $item):?>
                                <option ><?php echo $item;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <label for="text"><i class="glyphicon glyphicon-pencil"> </i> Omschrijving</label>
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
                        <label for="text"><i class="glyphicon glyphicon-pushpin"> </i> Campus</label>
                        <p disabled type="txt" class="form-control" id="ont">
                            <?=htmlentities($quer ->naam,ENT_QUOTES,'UTF-8');?></p>
                    </div>
                    <div class="col-md-5">
                        <label for="text"><i class="glyphicon glyphicon-map-marker"> </i> Blok en lokaal</label>
                        <p disabled type="txt" class="form-control" id="ont">
                            <?=htmlentities($quer ->blokLetter,ENT_QUOTES,'UTF-8'), htmlentities($quer ->lokaalNummer,ENT_QUOTES,'UTF-8');?></p>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="col-md-5">
                        <label for="text"><i class="glyphicon glyphicon-user"> </i>Aanmaker</label>
                        <input disabled type="email" class="form-control" id="ont" value=<?= htmlentities($quer ->email,ENT_QUOTES,'UTF-8');?>>
                    </div>
                    <div class="col-md-5">
                        <label for="text"><i class="glyphicon glyphicon-calendar"> </i> Meldingdatum</label>
                        <input disabled type="date" class="form-control"  value=<?= htmlentities($quer ->datum,ENT_QUOTES,'UTF-8');?> id="datum">
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="text"><i class="glyphicon glyphicon-flash"> </i> Prioriteit</label>
                        <input disabled type="text" class="form-control" id="ont" value=<?= htmlentities($quer ->prioriteit,ENT_QUOTES,'UTF-8');?>>
                    </div>
                    <div class="col-md-3">
                        <label for="text"><i class="glyphicon glyphicon-bell"> </i> Deadline</label>
                        <input disabled type="date" class="form-control" id="ont" value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8');?>>
                    </div>
                    <div class="col-md-3">
                        <label for="text"><i class="glyphicon glyphicon-hourglass"> </i> Herstellingdatum</label>
                        <input disabled type="date" class="form-control" id="ont" value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8');?>>
                    </div>
                </div>
            </div>
            </br>
            <?php endforeach;?>
            <div class="form-group">
                <button type="submit" name="opslaan" class="btn btn-success">Opslaan</button>
            </div>
        </form>
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