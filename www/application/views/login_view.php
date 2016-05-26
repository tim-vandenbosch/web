<?php
    /* @author = Britt & Tim
     * Date = 03/05/2016
     * Bron = http://www.iluv2code.com/login-with-codeigniter-php.html
     */
?>
<!DOCTYPE html>
<div class="row">
    <div class="col-md-7 col-md-offset-2 titel">
        <h1>HOGESCHOOL PXL</h1>
    </div>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
<div class="row">
        <div class="col-md-4 left">
            <h2>Ticketingsysteem</h2>
        </div>
    </div>
        <?php echo validation_errors(); ?>
        <?php echo form_open('verifylogin'); ?>
            <div class="form-group">
                <label for="email">Gebruiker:</label>
                <!-- <input class="form-control" name="user" id="user" type="text" value="<?php echo set_value('email'); ?>"/> -->
                <input type="text" class="form-control" size="40" id="email" name="email"/>
            </div>
            <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                   <!-- <input class="form-control" name="password" id="password" type="password" value="<?php echo set_value('password'); ?>"/> -->
                    <input type="password" class="form-control" size="40" id="password" name="password" />
                    <br/>
                </div>
                <a href="">wachtwoord vergeten?</a><br>
                <input type="submit" value="login" />
        </div>
</div>

<!-- 
    BRONVERMELDING:
        Deze volledige login is gebaseerd op de login van:
            http://www.iluv2code.com/login-with-codeigniter-php.html
-->