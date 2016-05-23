<?php
/* @author = Britt & Tim
 * Date = 13/05/2016
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Welkom Admin</h1>
</div>

<div class="col-md-7 col-md-offset-2 main home ">
    <table class="table table-striped" id="table">
        <thead>
            <th>UserID</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Actief</th>
            <th>activeer/blokkeer</th>
            <th>Reset Password</th>
        </thead>
        <?php foreach ($users as $user):?>
           <tbody>
               <td><?= $userid = htmlentities($user -> userID, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user -> email, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user -> rol, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user -> active, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?php echo anchor(site_url(array('Admin', 'changeStatus', $userid)),'Wijzig');?></td>
               <td><?php echo anchor(site_url(array('Admin', 'reset', $userid)),'Reset');?></td>
           </tbody>
        <?php endforeach; ?>
    </table>
</div>