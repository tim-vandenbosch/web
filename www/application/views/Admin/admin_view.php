<?php
/* @author = Britt & Tim
 * Date = 13/05/2016
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Welkom Admin</h1>
</div>

<div class="col-md-7 col-md-offset-2 main home ">
    <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('Admin','ToevoegenView')),'Toevoegen');?></button></td>
    <table class="table table-striped" id="table">
        <thead>
            <th>UserID</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Actief</th>
            <th>Pas aan</th>
        </thead>
        <?php foreach ($users as $user):?>
           <tbody>
               <td><?= $userid = htmlentities($user ->userID, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user ->email, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user ->rol, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user ->active, ENT_QUOTES, 'UTF-8'); ?></td>
               <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('Admin','BewerkenView', $userid)),'Bewerk');?></button></td>
           </tbody>
        <?php endforeach; ?>
    </table>
</div>