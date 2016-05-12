<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 13:19
 */
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <h1>Nieuw Ticket</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h2><!--titel--></h2>
        </div>
        <div class="col-md-8 right">
            <!-- hier kan nog eventuele uitleg over overzicht-->
        </div>
        <div class="col-md-12 center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Onderwerp</th>
                    <th>Type</th>
                    <th>Prioriteit</th>
                    <th>Status</th>
                    <!--            <th>Locatie </th>-->

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td><?php echo $onderwerp;?></td>
                    <td><?php echo $type;?></td>
                    <td> <?php echo $prioriteit;?></td>
                    <td><?php echo $status;?></td>
                    <!--            <td>--><?php //echo $naam ;?><!--</td>-->
                    <td> <button type="button" class="btn btn-link" onclick=<?php echo base_url()?>"Dispatcher/details" >Details</button></td>


                </tr>

                </tbody>
            </table
        </div>
</div>
