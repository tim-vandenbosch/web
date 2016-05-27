<?php
/* @author = Britt
 * Date: 12/05/2016
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Hoe ervaarde u het gebruik</h1>
</div>
<div class="col-md-7 col-md-offset-2 main home ">
    <div class="col-md-7 col-md-offset-2 center ">
        <?php
        echo validation_errors();
        echo form_open('enquete_controller/afmelden');
        ?>
        <div class="form-group row">
            <label> <?= htmlentities($vragen[0]->vraag_text, ENT_QUOTES, 'UTF-8'); ?></label>
            <div>
                <?php
                $vraag1 = array
                (
                    0 => htmlentities($vragen[0]->antw1_text, ENT_QUOTES, 'UTF-8'),
                    1 => htmlentities($vragen[0]->antw2_text, ENT_QUOTES, 'UTF-8'),
                    2 => htmlentities($vragen[0]->antw3_text, ENT_QUOTES, 'UTF-8')
                );
                for ($i = 0; $i < 3; $i++) {
                    // <label class="radio-inline"> <input type="radio" name="vraag1" value="<?= $vraag1[$i]; "><?php echo $vraag1[$i]; </label>
                    ?>
                    <div class="radio-inline">
                        <?php echo form_radio(array(
                            'name' => 'vraag1',
                            'value' => $vraag1[$i],
                            'checked' => set_radio('vraag1', $vraag1[$i]),
                            'required'       => 'required'
                        ));
                        echo form_label($vraag1[$i]);
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group row">
            <label><?= htmlentities($vragen[1]->vraag_text, ENT_QUOTES, 'UTF-8'); ?></label>
            <div>
                <?php
                $vraag2 = array
                (
                    0 => htmlentities($vragen[1]->antw1_text, ENT_QUOTES, 'UTF-8'),
                    1 => htmlentities($vragen[1]->antw2_text, ENT_QUOTES, 'UTF-8'),
                    2 => htmlentities($vragen[1]->antw3_text, ENT_QUOTES, 'UTF-8'),
                    3 => htmlentities($vragen[1]->antw4_text, ENT_QUOTES, 'UTF-8'),
                );
                for ($i = 0; $i < 4; $i++) {
                    // <label class="radio-inline"> <input type="radio" name="vraag2" value="<?= $vraag2[$i]; "><?php echo $vraag2[$i]; </label>
                    ?>
                    <div class="radio-inline">
                        <?php echo form_radio(array(
                            'name' => 'vraag2',
                            'value' => $vraag2[$i],
                            'checked' => set_radio('vraag2', $vraag2[$i]),
                            'required'       => 'required'
                        ));
                        echo form_label($vraag2[$i]);
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="feedback"><?= htmlentities($vragen[2]->vraag_text, ENT_QUOTES, 'UTF-8'); ?></label>
            <textarea class="form-control" rows="3" name="feedback" id="feedback" value="Feedback" required="required" lang="nl-BE" spellcheck="true"></textarea>
        </div>
        <div class="form-group row">
            <input class="btn btn-default" type="submit" value="Inzenden" name="submit" id="submit"/>
        </div>
        <?php echo form_close() ?>
    </div>
</div>