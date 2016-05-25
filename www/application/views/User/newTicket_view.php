<div class="col-md-7 col-md-offset-2 titel">
    <h1>Nieuw Ticket</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    <div class="col-md-12">
        <h3>Vul hier alle gegevens in voor je ticket</h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 center ">
            <?php
                echo validation_errors();
                echo form_open('newTicket_controller');
            ?>
                <fieldset>
                    <legend>
                        <label class="col-md-1">ID</label>
                        <label class="" id="ticketId" name="ticketId"><?php echo $ticket; ?></label>
                    </legend>
                    <div class="from-group row">
                        <label class="" for="onderwerp">Onderwerp</label>
                        <input class="form-control " type="text" name="onderwerp" id="onderwerp"/>
                    </div>
                    <div class="form-group row">
                        <label class="" for="type">Type</label>
                        <select class="form-control" name="type" id="type">
                            <option hidden >Kies een type</option>
                            <?php foreach ($type as $typ):?>
                                <option ><?php echo $typ;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="" for="prior">Prioriteit</label>
                        <select class="form-control" name="prior" id="prior">
                            <option hidden >Kies een prioriteit</option>
                            <?php foreach ($prio as $prior):?>
                                <option ><?php echo $prior;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="from-group row">
                        <label class="" for="campusId">Campus</label>
                        <select class="form-control" name="campusId" id="campusId">
                            <option hidden >Selecteer een campus</option>
                            <?php foreach ($campussen as $camp):?>
                                <option value=<?= htmlentities($camp -> campusID,ENT_QUOTES,'UTF-8');?>><?= htmlentities($camp ->naam,ENT_QUOTES);?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="" for="blokId">Blok</label>
                        <select class="form-control" name="blokId" id="blokId">
                        <option hidden >Selecteer een blok</option>
                        <?php foreach ($blokken as $blok):?>
                            <option value=<?= htmlentities($blok -> blokID,ENT_QUOTES,'UTF-8');?>><?= htmlentities($blok ->blokLetter,ENT_QUOTES);?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="from-group row">
                        <label class="" for="lokaal">Lokaal</label>
                        <input class="form-control " name="lokaal" id="lokaal" type="text"/>
                    </div>
                    <div class="form-group row">
                        <label class="" for="omschrijving">Omschrijving</label>
                        <textarea class="form-control" rows="3" name="omschrijving" id="omschrijving"></textarea>
                    </div>
                    <div class="form-group row">
                        <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
                    </div>
                </fieldset>
            <?php form_close(); ?>
        </div>
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