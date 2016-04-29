<?php
 define('BASEPATH') OR exit('No direct script access allowed');
echo "
<html>
    <head>
        <title><?= $controller ?></title>
           <link href=\"<?php echo base_url();?>assets/bootstrap/css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\"/>       
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body id="background">
        <header class="container hoofding">
            <div id="pxlLine"></div>
            <img class="col-md-2" src="<?php echo base_url();?>assets/Pictures/Logo_PXL.png" alt="PXL logo"/>
            <nav class="nav">
                <ul class="nav navbar-nav navbar-style">
                    <li class="active"><a href="TemplateHome.html">Home</a></li>
                    <li><a href="#">Testscreen</a></li>
                </ul>                 
            </nav>
            <div class="col-md-2"></div>
        </header>
        <div class="col-lg-12 main home">
            <!-- HIER MOET JE CODE -->
        </div>   
        
    </body>
</html>
"
?>