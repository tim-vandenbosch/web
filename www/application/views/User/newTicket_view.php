<div class="col-md-7 col-md-offset-2 titel">
    <h1>Nieuw Ticket</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    <div class="col-md-4 left">
        <h2><!--titel--></h2>
    </div>
    <div class="col-md-8 right">
        <!-- hier kan nog eventuele uitleg over overzicht-->
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
                            <option>IT</option>
                            <option>Elektronica</option>
                            <option>Faciliteiten</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="" for="prior">prioriteit</label>
                        <select class="form-control" name="prior" id="prior">
                            <option value="1">Kritiek(1uur)</option>
                            <option value="2">Dringend(4uur)</option>
                            <option value="3">Hoog(2dagen)</option>
                            <option value="4">Gemiddeld(1week)</option>
                            <option value="5">Laag(3 maanden)</option>
                        </select>
                    </div>
                    <div class="from-group row">
                        <label class="" for="campusId">Locatie</label>
                        <select class="form-control" name="campusId" id="campusId">
                            <option value="1">Elfde Linie</option>
                            <option value="2">Diepenbeek</option>
                            <option value="3">VilderStraat</option>
                        </select>
                        <select class="form-control" name="blokId" id="blokId">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
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
                    <div class="from-group row">
                        <label class="" for="foto">Optioneel:foto</label>
                        <input class="form-control" id="foto" name="foto" type="file"/>
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