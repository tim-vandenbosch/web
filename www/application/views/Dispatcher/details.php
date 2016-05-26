<?php
/* @author = Daniela Carmelina
 * Date = 10/05/2016
 * Bron: http://www.w3schools.com/bootstrap/bootstrap_forms.asp
 */
?>
<div class="row">
    <div class="col-md-7 col-md-offset-2 titel">
        <?php foreach($query as $quer):?>
            <h1 name="ticketID">Details van ticket <?= $ticketid = htmlentities($quer ->ticketID,ENT_QUOTES,'UTF-8');?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-12">
            <br/>
            <p>Hier ziet u alle informatie over het gekozen ticket.
            Klik op beheren en stel de prioriteit en status in zoals gewenst.
            Selecteer vervolgens een werkman om deze herstelling te doen.
            Bepaal eveneens de deadline en herstellingsdatum</p>
        </div>
        <div class="col-lg-offset-4">
            <h3><?= htmlentities($quer ->onderwerp,ENT_QUOTES,'UTF-8');?></h3>
        </div>
         <!-- <div class="col-md-7 col-md-offset-2 center "> Nida -->
            <form  role="form" method="post" action="<?php echo  site_url(array('Dispatcher','update', $ticketid))?>">
                <h4><font color=red> <?php echo form_error('dherstellingsdatum'); ?> </font></h4>
                <h4><font color=red> <?php echo form_error('ddeadline'); ?> </font></h4>

                <?php if($message == "Ticket update is geslaagd") : ?>
                    <div style="background-color:lightyellow;" class="span12 pagination-centered">
                        <font color="#006400">
                            <h3>   <i class="glyphicon glyphicon-thumbs-up"> </i>
                              <b><?php echo $message;?></b>
                              <i class="glyphicon glyphicon-thumbs-up"> </i>
                          </h3></font>
                    </div>
                <?php elseif($message != "") : ?>
                <div style="background-color:lightyellow;" class="span12 pagination-centered">
                    <font color="#ff8c00">
                        <h3>   <i class=" glyphicon glyphicon-thumbs-down"> </i>
                            <b><?php echo $message;?></b>
                            <i class=" glyphicon glyphicon-thumbs-down"> </i>
                        </h3></font>
                </div>
                <?php endif; ?>

                <h4>Informatie ticket</h4>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="text"><i class="glyphicon glyphicon-asterisk"> </i> Onderwerp</label>
                        <p disabled type="text" class="form-control" id="ont"><?= htmlentities($quer ->onderwerp,ENT_QUOTES);?></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text"><i class="glyphicon glyphicon-tags"> </i> Type</label>
                        <input disabled type="text" class="form-control"  value=<?= htmlentities($quer ->type,ENT_QUOTES,'UTF-8');?> id="type">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="text"><i class="glyphicon glyphicon-pushpin"> </i> Campus</label>
                        <p disabled type="txt" class="form-control" id="ont">
                            <?=htmlentities($quer ->naam,ENT_QUOTES,'UTF-8');?></p>
                    </div>
                    <div class="form-group col-md-6">

                        <label for="text"><i class="glyphicon glyphicon-map-marker"> </i> Blok en lokaal</label>
                        <p disabled type="txt" class="form-control" id="ont">
                            <?=htmlentities($quer ->blokLetter,ENT_QUOTES,'UTF-8'), htmlentities($quer ->lokaalNummer,ENT_QUOTES,'UTF-8');?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="text"><i class="glyphicon glyphicon-user"> </i> Aanmaker</label>
                        <input disabled type="email" class="form-control" id="ont" value=<?= htmlentities($quer ->email,ENT_QUOTES,'UTF-8');?>>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text"><i class="glyphicon glyphicon-calendar"> </i> Meldingdatum</label>
                        <input type="date" name="dmeldingsdatum" class="form-control" value="<?= htmlentities( $quer ->datum ,ENT_QUOTES,'UTF-8');?>" id="datum">
                        </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="text"><i class="glyphicon glyphicon-pencil"> </i> Omschrijving</label>
                        <textarea disabled class="form-control" rows="5" id="Omschrijving"> <?= htmlentities($quer ->omschrijving,ENT_QUOTES,'UTF-8');?></textarea>
                        <hr style="border-top: 1.5px dotted green"/>
                    </div>
                </div>
<!--********************************************************************************-->
                <div class="row">
                    <div class="form-group col-md-2">
                        <a href="#moreDetails" class="btn btn-success" data-toggle="collapse">Beheren</a>
                    </div>
                    <div class="form-group col-md-2">
                        <?php echo anchor('home/index', 'Annuleren', 'class="btn btn-default"') ?>
                    </div>
                </div>
                <div id="moreDetails" class="collapse">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="sel1"><i class="glyphicon glyphicon-flag"> </i> Selecteer een status</label>
                            <select class="form-control" id="satus" name="dstatus">
                                <option hidden > <?= htmlentities($quer ->status,ENT_QUOTES,'UTF-8');?></option>
                                <?php foreach ($stat as $item):?>
                                    <option ><?php echo $item;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="text"><i class="glyphicon glyphicon-flash"> </i> Prioriteit</label>
                            <select class="form-control" id="satus" name="dprioriteit">
                                <option hidden ><?= htmlentities($quer ->prioriteit,ENT_QUOTES,'UTF-8');?></option>
                                <?php foreach ($prio as $item):?>
                                    <option ><?php echo $item;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text"> <i class="glyphicon glyphicon-wrench"> </i> Werkman</label>
                        <select class="form-control" id="satus" name="dwerkman">
                        <?php foreach ($werkmanEmail as $email):?>
                            <option hidden value=<?= htmlentities($quer ->hersteller,ENT_QUOTES);?> ><?php echo $email;?></option>
                        <?php endforeach;?>
                        <?php foreach ($werkmannen as $werkman):?>
                            <option value=<?= htmlentities($werkman -> userID,ENT_QUOTES,'UTF-8');?> ><?= htmlentities($werkman -> email,ENT_QUOTES,'UTF-8');?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <font color=red> <?php echo form_error('dherstellingsdatum'); ?> </font>
                            <label for="text"> <i class="glyphicon glyphicon-hourglass"> </i> Herstellingdatum</label>
                            <input type="date" name="dherstellingsdatum" class="form-control"  id="Hdate"  value=<?= htmlentities($quer ->herstellingDatum,ENT_QUOTES,'UTF-8');?>>
                        </div>

                        <div class="form-group col-md-6">
                            <font color=red> <?php echo form_error('ddeadline'); ?> </font>
                            <label for="text"> <i class="glyphicon glyphicon-bell"> </i> Deadline</label>
                            <input name="ddeadline" type="date" class="form-control"  value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8') ;?> id="deadline">
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <button type="submit" name="opslaan" class="btn btn-default">Opslaan</button>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-danger" onclick=><?php echo anchor(site_url(array('Dispatcher','deleteticket',$ticketid)),'Verwijderen');?></button>
                        </div>
                    </div>
                </div>
            </form>
       <!-- </div> <!-- Nida -->
    </div>
</div>


<!--/* @author = Daniela-->
<!--* Date = datum-->
<!--* http://www.w3schools.com/bootstrap/bootstrap_forms.asp-->
<!--* http://getbootstrap.com/components/-->
<!--*/-->