<?php
/**
 * Gebruiker: Britt
 * Datum: 12/05/2016
 * Bron: /
 */
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2 titel">
        <h1>Hoe ervaarde u het gebruik</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2 main home ">
       <form>
           <?php foreach ($vragen as $vraag):?>
               <p><?= htmlentities($vraag ->userID, ENT_QUOTES, 'UTF-8'); ?></p>

           <?php endforeach; ?>
           <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
       </form>
    </div>
</div>

