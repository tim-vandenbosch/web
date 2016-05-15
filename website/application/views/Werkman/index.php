 <div class="col-md-7 col-md-offset-2 titel">
        <h1>Overzicht tickets</h1>

</div>

<div class="col-md-7 col-md-offset-2 main home ">
    <?php if(count($tickets)>0){?>
    <table class="table table-condensed table-responsive"">
        <thead>
        <tr>
            <th>Type</th>
            <th>Onderwerp</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($tickets as $ticket):?>
        <tr>
            <td> <?= htmlentities($ticket ->type,ENT_QUOTES,'UTF-8');?></td>
            <td> <?= htmlentities($ticket ->onderwerp,ENT_QUOTES,'UTF-8');?></td>
            <td> <?= htmlentities($ticket ->status,ENT_QUOTES,'UTF-8');?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <?php }?>
</div>

