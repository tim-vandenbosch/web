<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 15:15
 */?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <?php foreach($query as $quer):?>
        <h1>Details van ticket <?= htmlentities($quer ->ticketID,ENT_QUOTES,'UTF-8');?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
        <div class="col-md-6 left">

            <h2><?= htmlentities($quer ->onderwerp,ENT_QUOTES,'UTF-8');?></h2>
        </div>
        <div class="col-md-6 right">
            <p>Hier ziet u alle informatie over de gekozen ticket.
            U kunt de prioriteit en status instellen als gewenst.
            Selecteer een werkman om deze herstelling te doen.</p>
        </div>
        <div class="col-md-12 center">
<!--<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">-->
            <form role="form">
                <h4>Informatie ticket</h4>
                <div class="form-group">
                    <label for="text">Type:</label>
                    <input disabled type="text" class="form-control"  value=<?= htmlentities($quer ->type,ENT_QUOTES,'UTF-8');?> id="type">
                </div>
                <div class="form-group">
                    <label for="text">Onderwerp</label>
                    <p disabled type="text" class="form-control" id="ont"><?= htmlentities($quer ->onderwerp,ENT_QUOTES);?></p>
                </div>
                <div class="form-group">
                    <label for="text">Aanmaker</label>
                    <input disabled type="email" class="form-control" id="ont" value=<?= htmlentities($quer ->email,ENT_QUOTES,'UTF-8');?>>
                </div>
                <div class="form-group">
                    <label for="text">Campus</label>
                    <p disabled type="txt" class="form-control" id="ont">
                        <?=htmlentities($quer ->naam,ENT_QUOTES,'UTF-8');?></p>
                </div>
                <div class="form-group">
                    <label for="text">Blok en lokaal</label>
                    <p disabled type="txt" class="form-control" id="ont">
                        <?=htmlentities($quer ->blokLetter,ENT_QUOTES,'UTF-8'), htmlentities($quer ->lokaalNummer,ENT_QUOTES,'UTF-8');?></p>
                </div>
                <div class="form-group">
                    <label for="text">Meldingdatum:</label>
                    <input disabled type="date" class="form-control"  value=<?= htmlentities($quer ->datum,ENT_QUOTES,'UTF-8');?> id="datum">
                </div>
                <div class="form-group">
                    <label for="text">Omschrijving:</label>
                    <textarea disabled class="form-control" rows="5" id="Omschrijving"> <?= htmlentities($quer ->omschrijving,ENT_QUOTES,'UTF-8');?></textarea>
                </div>

                <h4>In te stellen </h4>
                <div class="form-group">
                    <label for="text">Prioriteit:</label>
                    <select class="form-control" id="satus" name="satus">
                        <option hidden ><?= htmlentities($quer ->prioriteit,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($prio as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Werkman:</label>
                    <select class="form-control" id="satus" name="satus">
                        <option hidden ><?= htmlentities($werkmanEmail -> email,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($werkmannen as $werkman):?>
                            <option ><?= htmlentities($werkman -> email,ENT_QUOTES,'UTF-8');?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Herstellingdatum:</label>
                    <input type="date" class="form-control"  value=<?= htmlentities($quer ->herstellingDatum,ENT_QUOTES,'UTF-8');?> id="Hdate">
                </div>
                <div class="form-group">
                    <label for="text">Deadline:</label>
                    <input type="date" class="form-control"  value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8');?> id="deadline">
                </div>
                <div class="form-group">
                    <label for="sel1">Selecteer een status</label>
                    <select class="form-control" id="satus" name="satus">
                        <option hidden > <?= htmlentities($quer ->status,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($stat as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <?php endforeach;?>
                <button type="submit" class="btn btn-default">Opslaan</button>
            </form>
        </div>
    </div>


<!--    Bronnen: http://www.w3schools.com/bootstrap/bootstrap_forms.asp-->