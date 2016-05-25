<div class="col-md-7 col-md-offset-2 titel">
     <h1>Overzicht</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    <div class="col-md-4 left">
        <h2>Tickets</h2>
    </div>
    <div class="row">
        <div class="col-md-12 center">
            <?php if(count($tickets)>0){ ?>
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th   class="hidden-sm hidden-xs">ID</th>
                            <th>Onderwerp</th>
                            <th  class="hidden-sm hidden-xs">Prioriteit</th>
                            <th  class="hidden-sm hidden-xs">Type</th>
                            <th  class="hidden-sm hidden-xs">Campus</th>
                            <th  class="hidden-sm hidden-xs">Blok</th>
                            <th  class="hidden-sm hidden-xs">lokaalNr</th>
                            <th>Herstellings datum</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tickets as $ticket):?>
                            <tr>
                                <td  class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->ticketID,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                                <td  class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                                <td  class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>
                                <td  class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->naam,ENT_QUOTES,'UTF-8');?></td>
                                <td  class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->blokLetter,ENT_QUOTES,'UTF-8');?></td>
                                <td  class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->herstellingDatum,ENT_QUOTES,'UTF-8');?></td>
                                <td> <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php }?>
        </div>
    </div>
</div>