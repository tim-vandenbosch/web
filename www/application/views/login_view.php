<?php
    /* @author = Britt & Tim
     * Date = 03/05/2016
     * Bron = http://www.iluv2code.com/login-with-codeigniter-php.html
     */
?>
<!DOCTYPE html>
    <div class="col-md-7 col-md-offset-2 titel">
        <h1>HOGESCHOOL PXL</h1>
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
                <div class="col-md-1"></div>
                <div style="margin-bottom: 25px" class="input-group col-md-5">
                <!-- <label for="email">Gebruiker:</label> -->
                <!-- <input class="form-control" name="user" id="user" type="text" value="<?php echo set_value('email'); ?>"/> -->
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" size="40" id="email" name="email" placeholder="Email: "/>
                    </div>
            </div>
            <div class="form-group">
                <div class="col-md-1"></div>
                <div style="margin-bottom: 25px" class="input-group col-md-5">
                    <!-- <label for="password">Wachtwoord:</label> -->
                   <!-- <input class="form-control" name="password" id="password" type="password" value="<?php echo set_value('password'); ?>"/> -->
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" size="40" id="password" name="password" placeholder="Password: "/>
                    </div>
                </div>

    <div class="form-group">
        <div class="col-md-1"></div>
                <a href="">wachtwoord vergeten?</a><br>
        <div class="col-md-1"></div>
    <button type="submit" value="login" class="btn btn-secondary" > <span class="glyphicon glyphicon-log-in"></span> Login</button>
    </div>


</div>
</div>

<!-- 
    BRONVERMELDING:
        Deze volledige login is gebaseerd op de login van:
            http://www.iluv2code.com/login-with-codeigniter-php.html
-->