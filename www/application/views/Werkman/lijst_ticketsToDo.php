<?php
/* @author = Nida Ilyas
 * Date = 17/05/2016
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Overzicht to-do tickets</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    </br>
    <div class="row">
        <h4 class="col-md-1"> <span class="label label-success"> <a style="color: white" href="<?php echo site_url('ticket_controller/showAllTickets')?>">Overzicht tickets</a>
    </div>
    <?php if(count($tickets)>0 &&$tickets[0]!=null){?>
        <table class="table table-striped" id="table" > <!-- class="table table-striped"  class="sortable" -->
            <thead>
                <tr>
                    <!-- <th>TicketId</th> -->
                    <th>Onderwerp</th>
                    <th class="hidden-sm hidden-xs">Prioriteit</th>
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
                        <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('Werkman','updateTicketStatus',$ticketid,"noupdate")),'Details');?></button></td>
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