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
        <h1>Welkom Dispatcher</h1>
        <h1>Overzicht tickets</h1>
    </div>
</div>

<div class="col-md-8 col-md-offset-2 main home ">

    <table class="table table-condensed">
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
    </table>
</div>
