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
           <div class="form-group row">
                <p><?= htmlentities($vragen[0] -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></p>
           </div>
           <div class="form-group row">
                <p><?= htmlentities($vragen[1] -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></p>
           </div>
           <div class="form-group row">
               <p><?= htmlentities($vragen[2] -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></p>
               <textarea class="form-control" rows="3" name="feedback" id="feedback"></textarea>
           </div>
           <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
       </form>
    </div>
</div>

