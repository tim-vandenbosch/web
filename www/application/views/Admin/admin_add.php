<?php
/* @author = Britt & Tim
 * Date = 13/05/2016
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Een nieuw account maken</h1>
</div>

<div class="col-md-7 col-md-offset-2 main home ">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 center ">
            <?php
            echo validation_errors();
            echo form_open('Admin');
            ?>
            <fieldset>
                <legend>
                    <label class="col-md-1">ID</label>
                    <label class="" id="userID" name="userID"><?php echo $userID;?></label>
                </legend>
                <div class="from-group row">
                    <label class="" for="email">Email</label>
                    <input class="form-control " type="text" name="email" id="email"/>
                    <label class="" for="email">@pxl.be wordt automatisch toegevoegd</label>
                </div>
                <div class="form-group row">
                    <label class="" for="rol">Rol</label>
                    <select class="form-control" name="rol" id="rol">
                        <option>Docent</option>
                        <option>Dispatcher</option>
                        <option>Werkman</option>
                        <option>Medewerker</option>
                        <option>Schoonmaak medewerker</option>
                        <option>Admin</option>
                    </select>
                    <p></p> <!-- whitespacing -->
                <div class="form-group row">
                    <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
                </div>
            </fieldset>
            <?php form_close(); ?>
        </div>
    </div>
    <div class="row">
        <div class="pull-right col-md-1">
            <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                <i class="glyphicon glyphicon-chevron-up"> </i>
            </a>
        </div>
    </div>
</div>
