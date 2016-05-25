<?php
/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 23/05/2016
 * Time: 19:32
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Password wijzigen</h1>
</div>

<div class="col-md-7 col-md-offset-2 main home ">
    </br>

    <?php echo form_open('profiel_controller/check_pass'); ?>
    <div class="errors">
            <?php echo validation_errors('<div class="error">', '</div>'); ?>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div style="margin-bottom: 25px" class="input-group col-md-5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input value="<?php echo set_value('email'); ?>" id="email" type="text" name="email" placeholder="Eamil: " class="form-control">
            </div>
            </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input value="<?php echo set_value('password'); ?>" type="password" id="password" name="password" placeholder="Current Password: " class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
        <input type="password" value="<?php echo set_value('newpassword'); ?>" id="newpassword" name="newpassword" placeholder="New Password:"class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div style="margin-bottom: 25px" class="input-group col-md-5">
            <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
    <input type="password" value="<?php echo set_value('re_password'); ?>" name="re_password" placeholder="Retype New Password: " class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <input type="submit" value="change password" class="btn btn-success"/>
    </div>
    </form>
</br>
    </div>