<?php
    /* @author = Britt & Tim
     * Date = 03/05/2016
     * Bron = http://www.iluv2code.com/login-with-codeigniter-php.html
     */
?>
<!DOCTYPE html>
<head>
    <?php echo link_tag('/assets/bootstrap/css/bootstrap.css') ?>
    <?php echo link_tag('/assets/bootstrap/css/customStyle.css') ?>
    <?= link_tag('/assets/bootstrap/js/customJavaScript.js') ?>
    <title>Tickets Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="background">
    <header class="container hoofding">
        <div id="pxlLine"></div>
        <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
        <h1 class="col-md-7">HOGESCHOOL PXL</h1>
        <div class="col-md-2"></div>
    </header>
    <div class="container main login">
        <h2 class="col-md-12 ">Ticketingsysteem</h2>
        <!--<form class="col-md-12" action="" id="myForm" method="post"> -->
        <?php echo validation_errors(); ?>
        <?php echo form_open('verifylogin'); ?>
            <div class="form-group">
                <label for="email">Gebruiker:</label>
                <!-- <input class="form-control" name="user" id="user" type="text" value="<?php echo set_value('email'); ?>"/> -->
                <input type="text" class="form-control" size="40" id="email" name="email"/>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                   <!-- <input class="form-control" name="password" id="password" type="password" value="<?php echo set_value('password'); ?>"/> -->
                    <input type="password" class="form-control" size="40" id="password" name="password" />
                    <br/>
                </div>
                <a href="">wachtwoord vergeten?</a><br>
                <input type="submit" value="login" />
        </div>
        </form>
    </div>
</body>
</html>
<!-- 
    BRONVERMELDING:
        Deze volledige login is gebaseerd op de login van:
            http://www.iluv2code.com/login-with-codeigniter-php.html
-->