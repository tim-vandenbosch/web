
<div class="col-md-7 col-md-offset-2 titel">
    <h1>Persoonlijk profiel</h1>
</div>



    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-4 left">
           <h2><?php echo $email;?></h2>
        </div>


            <div class="col-md-12 center">
                <h4><?php echo $rol;?></h4>
                <?php if($active == 1){ $status = 'Activated';}else{$status = 'Not activated';} ?>
                <h2><?php echo $status?></h2>
            </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn btn-default">Nieuw wachtword aanvragen</button>
            </div>
        </div>

</div>