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
            echo form_open('Admin/resetForm');
            ?>
            <fieldset>
                <legend>
                    <label class="col-md-1">ID</label>
                    <label class="" id="userID" name="userID"><?php echo $user;?></label>
                </legend>
                <div class="form-group row">
                    <label class="" for="userID">ID</label>
                    <input class="form-control" name="userID" id="userID" value="<?php echo $user; ?>" />
                </div>
                <div class="from-group row">
                    <label class="" for="pws">Nieuw wachtwoord</label>
                    <input class="form-control " type="pws" name="pws" id="pws"/>
                </div>
                <br/>
                <div class="form-group row">
                    <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
                </div>
            </fieldset>
            <?php form_close(); ?>
        </div>
    </div>
</div>
