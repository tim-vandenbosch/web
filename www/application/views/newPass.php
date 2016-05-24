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

        <div class="row"><p class=" col-md-5 " ><input id="email" type="text" name="email" placeholder="Eamil: " class="form-control" required="required"></p></div>
        <div class="row"><p class=" col-md-5"><input type="password" id="password" name="password" placeholder="Current Password: " class="form-control" required="required"></p></div>
        <div class="row"><p class="col-md-5 "><input type="password" id="newpassword" name="newpassword" placeholder="New Password: " class="form-control" required="required"></p></div>
        <div class="row"><p class="col-md-5 "><input type="password" name="re_password" placeholder="Retype New Password: " class="form-control" required="required"></p></div>
        <div class="row"><div class="col-md-1">  <input type="submit" value="change password" class="btn btn-success" /> </div></div>
    </form>
</br>
    </div>
