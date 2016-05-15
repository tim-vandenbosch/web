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
                <p><?= htmlentities($vraag -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php
               for ($i = 0; $i <4; $i++)
               {
                   if($antwoorden[$i] != NULL)
                   {
                       echo "<input type='radio' name='antw1' value='$antwoorden[$i]'>";
                   }
               }
               ?>
           <?php endforeach; ?>
           <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
       </form>
    </div>
</div>

