<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 15:15
 */?>
<html>
<head>
    <title>User ticket</title>
    <?= link_tag('/assets/bootstrap/css/bootstrap.css') ?>
    <?= link_tag('/assets/bootstrap/css/customStyle.css') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="background">
<header class="container hoofding">
    <div id="pxlLine"></div>
    <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
    <nav class="nav">
        <ul class="nav navbar-nav navbar-style">
            <li><?php echo anchor(site_url(array('Dispatcher','index')),'Terug naar overzicht'); ?></li>
        </ul>
    </nav>
    <div class="col-md-2"></div>
</header>
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2 center ">
<!--<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">-->
            <h1>Details van de ticket</h1>
            <form role="form">
                <div class="form-group">
                    <label for="text">Onderwerp</label>
                    <input disabled type="email" class="form-control" id="ont" value=<?php echo $onderwerp;?>>
                </div>
                <div class="form-group">
                    <label for="text">Prioriteit:</label>
                    <input type="text" class="form-control" value=<?php echo $prioriteit ;?> id="prio">
                </div>
                <div class="form-group">
                    <label for="text">Type:</label>
                    <input disabled type="text" class="form-control"  value=<?php echo $type;?> id="type">
                </div>
                <div class="form-group">
                    <label for="text">Datum:</label>
                    <input disabled type="date" class="form-control"  value=<?php echo $datum ;?> id="datum">
                </div>
                <div class="form-group">
                    <label for="text">Omschrijving:</label>
                    <textarea disabled class="form-control" rows="5" id="Omschrijving"> <?php echo $omschrijving ;?></textarea>
                </div>
                <div class="form-group">
                    <label for="text">Herstellingdatum:</label>
                    <input type="date" class="form-control"  value=<?php echo $Hdatum ;?> id="Hdate">
                </div>
                <div class="form-group">
                    <label for="text">Deadline:</label>
                    <input type="date" class="form-control"  value=<?php echo $deadline ;?> id="deadline">
                </div>
                <div class="form-group">
                    <label for="sel1">Selecteer een status</label>
                    <select class="form-control" id="satus" name="satus">
                        <option hidden > <?php echo $status ;?></option>
                        <?php foreach ($stat as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>


</body>
</html>
