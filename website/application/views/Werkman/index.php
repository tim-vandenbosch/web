 <div class="col-md-7 col-md-offset-2 titel">
        <h1>Overzicht tickets</h1>

</div>

<div class="col-md-7 col-md-offset-2 main home ">
    <?php if(count($tickets)>0){?>
        <table class="table table-striped"   > <!-- class="table table-striped"  class="sortable" -->
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
                    <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
                    <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->prioriteit,ENT_QUOTES,'UTF-8');?></td>
                    <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>

                    <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->naam,ENT_QUOTES,'UTF-8');?></td> <!-- campus naam-->
                    <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->blokLetter,ENT_QUOTES,'UTF-8');?></td>
                    <td class="hidden-sm hidden-xs"> <?= htmlentities($ticket ->lokaalNummer,ENT_QUOTES,'UTF-8');?></td>
                    <td > <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
                    <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('Dispatcher','details')),'Details');?></button></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php }?>
</div>

