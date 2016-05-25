<div class="col-md-7 col-md-offset-2 titel" xmlns="http://www.w3.org/1999/html">
    <h1>Persoonlijk profiel</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">

    <br/>
<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input value="<?php echo $email; ?>" type="text" class="form-control" disabled="disabled">
        </div>
    </div>


    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input value="<?php echo $rol; ?>" type="text" class="form-control" disabled="disabled">
        </div>
    </div>
    <div class="col-md-1"></div>

        <button class="btn btn-default" onclick="window.location='<?php echo site_url("profiel_controller/aanvraagNewPw");?>'">Wachtwoord wijzigen</button>

</div>

    <hr style="border-top: 1px dotted gray"/>

    <div class="titel row">
        <h1>Overzicht toegevoegde tickets</h1>
    </div>
    <br/>
    <?php if(count($tickets)>0){?>
        <table class="table table-striped" id="table"  > <!-- class="table table-striped"  class="sortable" -->
            <thead>
                <tr>
                    <!-- <th>TicketId</th> -->
                    <th>Onderwerp</th>
                    <th class="hidden-sm hidden-xs"">Prioriteit</th>
                    <th class="hidden-sm hidden-xs">Type</th>
                    <th class="hidden-sm hidden-xs">Campus</th>
                    <th class="hidden-sm hidden-xs">Blok</th>
                    <th class="hidden-sm hidden-xs">Lokaal</th>
                    <th >Status</th>
                    <th>Beheren</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tickets as $ticket):?>
                    <tr>
                        <p hidden><?= $ticketid =  $ticket ->ticketID;?></p>
                        <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                        <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                        <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>

                        <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->naam,ENT_QUOTES,'UTF-8');?></td> <!-- campus naam-->
                        <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->blokLetter,ENT_QUOTES,'UTF-8');?></td>
                        <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                        <td > <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                        <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('ticket_controller','editOwnTicket',$ticketid,"noupdate")),'Details');?></button></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php }?>
    <div class="row">
        <div class="pull-right col-md-1">
            <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                <i class="glyphicon glyphicon-chevron-up"> </i>
            </a>
        </div>
    </div>
    <br>
</div>