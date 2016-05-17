
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Persoonlijk profiel</h1>
</div>



    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-4 left" row>
           <h2><?php echo $email;?></h2>
        </div>


            <div class="col-md-8 center" row>
                <h4><?php echo $rol;?></h4>
                <?php if($active == 1){ $status = 'Activated';}else{$status = 'Not activated';} ?>
                <h2><?php echo $status?></h2>
            </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn btn-default">Nieuw wachtword aanvragen</button>
            </div>
        </div>
</br>
        <hr style="border-top: 1px dotted gray"/>

        <div class="titel row">
            <h1>Overzicht toegevoegde tickets</h1>
        </div>
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
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        <?php }?>

</div>