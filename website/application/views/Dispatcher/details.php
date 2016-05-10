<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 15:15
 */?>

<form role="form">
    <div class="form-group">
        <label for="text">Onderwerp</label>
        <input type="email" class="form-control" id="ont" value="">
    </div>
    <div class="form-group">
        <label for="text">Omschrijving:</label>
        <input type="password" class="form-control" id="om">
    </div>
    <div class="form-group">
        <label for="sel1">Selecteer een status</label>
        <select class="form-control" id="satus" name="satus">
            <?php
            foreach( $datastat as $stat)
            {

                <option>$stat</option>

            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
