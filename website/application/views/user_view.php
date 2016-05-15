
    <div class="col-md-7 col-md-offset-2 titel">
        <h1>Overzicht</h1>
    </div>




    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h2>Tickets</h2>
        </div>
        <div class="col-md-7 right">
            <!-- hier kan nog eventuele uitleg over overzicht-->
        </div>
        <div class="row">
            <div class="col-md-12 center">
                    <?php if(count($tickets)>0){ ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Onderwerp</th>
                                <th>Prioriteit</th>
                                <th>Type</th>
                                <th>Campus</th>
                                <th>Blok</th>
                                <th>lokaalNr</th>
                                <th>Herstellings datum</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tickets as $ticket):?>
                                <tr>
                                    <td> <?= htmlentities($ticket ->ticketID,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->naam,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->blokLetter,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->herstellingDatum,ENT_QUOTES,'UTF-8');?></td>
                                    <td> <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn-default">
                   <?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?>
                </button>
            </div>
        </div>
    </div>

