<body id="background">
<header class="container hoofding">
    <div id="pxlLine"></div>

<div class="hidden-xs hidden-sm">
    <img class="col-md-2 " src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>

    <nav class="navbar">

        <ul class="nav navbar-nav navbar-style">
            <li class="active"><?php echo anchor(array('home','index'),'Overzicht'); ?></li>
            <li><?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?></li>
            <li><?php echo anchor(site_url(array('profiel_controller','index')),'Profiel');?></li>
            <!-- <li><?php // echo anchor(site_url(array('enquete_controller','index')),'Enquete');?></li> -->
            <li><?php echo anchor(site_url(array('home','logout')),'Afmelden'); ?></li>
        </ul>
    </nav>
</div>
    <div class="hidden-md hidden-lg">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PXL-Ticketing system</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><?php echo anchor(array('home','index'),'Overzicht'); ?></li>
                    <li><?php echo anchor(site_url(array('newTicket_controller','index')),'Nieuw ticket');?></li>
                    <li><?php echo anchor(site_url(array('profiel_controller','index')),'Profiel');?></li>
                    <li><?php echo anchor(site_url(array('home','logout')),'Afmelden'); ?></li>
                </ul>
            </div>
        </div>

</div>


    <div class="col-md-2"></div>

</header>

