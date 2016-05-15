<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 15:15
 */?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <h1>Details van de ticket</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
        <div class="col-md-6 left">
            <?php foreach($query as $query):?>
            <h2><?= htmlentities($query ->onderwerp,ENT_QUOTES,'UTF-8');?></h2>
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
                <div class="form-group">
                    <label for="text">Onderwerp</label>
                    <input disabled type="email" class="form-control" id="ont" value=<?= htmlentities($query ->onderwerp,ENT_QUOTES,'UTF-8');?>>
                </div>
                <div class="form-group">
                    <label for="text">Prioriteit:</label>
                    <select class="form-control" id="satus" name="satus">
                        <option hidden ><?= htmlentities($query ->prioriteit,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($prio as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Type:</label>
                    <input disabled type="text" class="form-control"  value=<?= htmlentities($query ->type,ENT_QUOTES,'UTF-8');?> id="type">
                </div>
                <div class="form-group">
                    <label for="text">Datum:</label>
                    <input disabled type="date" class="form-control"  value=<?= htmlentities($query ->datum,ENT_QUOTES,'UTF-8');?> id="datum">
                </div>
                <div class="form-group">
                    <label for="text">Omschrijving:</label>
                    <textarea disabled class="form-control" rows="5" id="Omschrijving"> <?= htmlentities($query ->omschrijving,ENT_QUOTES,'UTF-8');?></textarea>
                </div>
                <div class="form-group">
                    <label for="text">Werkman:</label>
                   <!-- <?php /*if(htmlentities($query ->hersteller,ENT_QUOTES,'UTF-8') ) : */?>
                    --><?php /*endif; */?>
                    <input type="text" class="form-control" value= <?= htmlentities($query ->hersteller,ENT_QUOTES,'UTF-8');?> id="type">
                </div>
                <div class="form-group">
                    <label for="text">Herstellingdatum:</label>
                    <input type="date" class="form-control"  value=<?= htmlentities($query ->herstellingDatum,ENT_QUOTES,'UTF-8');?> id="Hdate">
                </div>
                <div class="form-group">
                    <label for="text">Deadline:</label>
                    <input type="date" class="form-control"  value=<?= htmlentities($query ->deadline,ENT_QUOTES,'UTF-8');?> id="deadline">
                </div>
                <div class="form-group">
                    <label for="sel1">Selecteer een status</label>
                    <select class="form-control" id="satus" name="satus">
                        <option hidden > <?= htmlentities($query ->status,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($stat as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <?php endforeach;?>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
