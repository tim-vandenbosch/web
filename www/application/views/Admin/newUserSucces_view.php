<?php
/**
 * Created by PhpStorm.
 * User: tim_v
 * Date: 24/05/2016
 * Time: 10:15
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Nieuwe user</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    <div class="col-md-4 left">
        <h2>Succes!</h2>
    </div>
    <div class="col-md-7 right">
        <p>Je user is met succes aangemaakt, Hij/Zij zal nu te zien zijn in je overzicht.</p>
    </div>
    <div class="row">
        <div class="col-md-12 center">
            <p>
                <?php echo anchor(site_url(array('Admin','NewUser')),'Nog een user aanmaken?');?>
            </p>
        </div>
    </div>
</div>