<body id="background">
<header class="container hoofding">
    <div id="pxlLine"></div>


    <img class="col-md-2 " src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>

    <nav class="navbar">

        <ul class="nav navbar-nav navbar-style">
            <li class="active"><?php echo anchor(array('home','index'),'Overzicht'); ?></li>
            <li><?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?></li>
            <li><?php echo anchor(site_url(array('profiel_controller','index')),'Profiel');?></li>
            <li><?php echo anchor(site_url(array('home','logout')),'Afmelden'); ?></li>
        </ul>
    </nav>
    <div class="col-md-2"></div>
</header>

