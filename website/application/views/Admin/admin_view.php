<?php
/**
 * Gebruiker: Britt & Tim
 * Datum: 13/05/2016
 * Bron: /
 */
?>
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Welkom Admin</h1>
</div>

<div class="col-md-7 col-md-offset-2 main home ">
    <table class="table table-striped">
        <thead>
            <!-- Ik wil van deze headers sorters maken waarbij de data gesorteerd word (eventuele functies heb ik al ingebouwd in user_model) -->
            <th>UserID</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Actief</th>
            <th>Pas aan</th>
        </thead>
        <?php foreach ($users as $user):?>
           <tbody>
               <td><?= htmlentities($user ->userID, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user ->email, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user ->rol, ENT_QUOTES, 'UTF-8'); ?></td>
               <td><?= htmlentities($user ->active, ENT_QUOTES, 'UTF-8'); ?></td>
               <td> <button type="button" class="btn btn-link" onclick=><?php echo anchor(site_url(array('Admin','Bewerk')),'Bewerk');?></button></td>
           </tbody>
        <?php endforeach; ?>
    </table>
</div>

