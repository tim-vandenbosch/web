<?php
/**
 * Gebruiker: Britt
 * Datum: 12/05/2016
 * Bron: /
 */
?>

    <div class="col-md-7 col-md-offset-2 titel">
        <h1>Hoe ervaarde u het gebruik</h1>
    </div>
    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-7 col-md-offset-2 center ">
            <?php
                echo form_open();
            ?>
               <div class="form-group row">
                   <label> <?= htmlentities($vragen[0] -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></label></br>
                   <?php
                        $vraag1 = array
                        (
                            0 => htmlentities($vragen[0] -> antw1_text, ENT_QUOTES, 'UTF-8'),
                            1 => htmlentities($vragen[0] -> antw2_text, ENT_QUOTES, 'UTF-8'),
                            2 => htmlentities($vragen[0] -> antw3_text, ENT_QUOTES, 'UTF-8')
                        );
                   for ($i = 0; $i < 3; $i++)
                   { ?>
                        <label class="radio-inline"> <input type="radio" name="vraag1" value="<?= $vraag1[$i]; ?>"><?php echo $vraag1[$i]; ?></label>
                  <?php }
                   ?>
               </div>

               <div class="form-group row">
                    <label><?= htmlentities($vragen[1] -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></label></br>
                   <?php
                       $vraag2 = array
                       (
                           0 => htmlentities($vragen[1] -> antw1_text, ENT_QUOTES, 'UTF-8'),
                           1 => htmlentities($vragen[1] -> antw2_text, ENT_QUOTES, 'UTF-8'),
                           2 => htmlentities($vragen[1] -> antw3_text, ENT_QUOTES, 'UTF-8'),
                           3 => htmlentities($vragen[1] -> antw4_text, ENT_QUOTES, 'UTF-8'),
                       );
                        for($i = 0;$i<4;$i++)
                        {
                   ?>
                   <label class="radio-inline"> <input type="radio" name="vraag1" value="<?= $vraag1[$i]; ?>"><?php echo $vraag1[$i]; ?></label>
                   <?php } ?>

                   <input type="radio" name="vraag2"
                          value="<?php echo htmlentities($vragen[1] -> antw1_text, ENT_QUOTES, 'UTF-8') ;?>">
                   <input type="radio" name="vraag2"
                          value="<?php echo htmlentities($vragen[1] -> antw2_text, ENT_QUOTES, 'UTF-8') ;?>">
                   <input type="radio" name="vraag2"
                          value="<?php echo htmlentities($vragen[1] -> antw3_text, ENT_QUOTES, 'UTF-8') ;?>">
                   <input type="radio" name="vraag2"
                          value="<?php echo htmlentities($vragen[1] -> antw4_text, ENT_QUOTES, 'UTF-8') ;?>">
               </div>
               <div class="form-group row">
                   <p><?= htmlentities($vragen[2] -> vraag_text, ENT_QUOTES, 'UTF-8'); ?></p>
                   <textarea class="form-control" rows="3" name="feedback" id="feedback"></textarea>
                   <!-- Moet met css nog even tegoei maar tijdelijke oplossing -->
                   <p></p>
                   <input class="btn btn-default" type="submit" value="inzenden" name="submit" id="submit"/>
               </div>

           </form>
        </div>
    </div>


