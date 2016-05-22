<?php
    /* @author = Marnix
     * Date =
     */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Nieuw ticket</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    <div class="col-md-4 left">
        <h2>Succes!</h2>
    </div>
    <div class="col-md-7 right">
        <p>Je ticket is met succes aangemaakt, Het zal nu te zien zijn in je overzicht.</p>
    </div>
    <div class="row">
        <div class="col-md-12 center">
            <p>
                <?php echo anchor(site_url(array('newTicket_controller','index')),'Nog een ticket?');                ?>
            </p>
        </div>
    </div>
</div>