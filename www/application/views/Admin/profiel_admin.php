<?php

/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 26/05/2016
 * Time: 13:34
 */
?>
<div class="col-md-7 col-md-offset-2 titel" xmlns="http://www.w3.org/1999/html">
    <h1>Persoonlijk profiel</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">

    <br/>
<div>
    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input value="<?php echo $email; ?>" type="text" class="form-control" disabled="disabled">
        </div>
    </div>


    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input value="<?php echo $rol; ?>" type="text" class="form-control" disabled="disabled">
        </div>
    </div>
    <div class="col-md-1"></div>

        <button class="btn btn-default" onclick="window.location='<?php echo site_url("profiel_controller/aanvraagNewPw");?>'">Wachtwoord wijzigen</button>

</div>
    
<div class="row">
    <div class="pull-right col-md-1">
        <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
            <i class="glyphicon glyphicon-chevron-up"> </i>
        </a>
    </div>
</div>
<br>
</div>