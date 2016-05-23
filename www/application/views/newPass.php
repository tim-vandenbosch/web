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
    <form action="<?php echo base_url().'profiel_controller/changePass'?>" method="post">
        <div class="errors">
            <?php echo validation_errors('<div class="error">', '</div>'); ?>
        </div>
        <p><input type="password" name="old_password" placeholder="Current Password: " class="form-control" required="required"></p><br />
        <p><input type="password" name="newpassword" placeholder="New Password: " class="form-control" required="required"></p><br />
        <p><input type="password" name="re_password" placeholder="Retype New Password: " class="form-control" required="required"></p><br />
        <input type="submit" value="change password" class="btn btn-primary" />
    </form>
</br>
    </div>
