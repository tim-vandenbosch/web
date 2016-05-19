<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ticketing system</title>

    <?= link_tag('/assets/bootstrap/css/bootstrap.css') ?>
    <?= link_tag('/assets/bootstrap/css/customStyle.css') ?>

    <?= link_tag('/assets/bootstrap/js/customJavaScript.js') ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>


    <?= link_tag('assets/tablePlugin/css/vendor/bootstrap.min.css')?>
    <?= link_tag('assets/tablePlugin/css/vendor/font-awesome.min.css')?>
    <?= link_tag('assets/tablePlugin/css/jquery.bdt.css')?>
    <script src="<?php echo base_url() ?>/assets/tablePlugin/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/tablePlugin/js/jquery.sortelements.js"></script>
    <script src="<?php echo base_url() ?>/assets/tablePlugin/js/jquery.bdt.js"></script>

    <script>
        $(document).ready( function () {
            $('#userTable').bdt();
        });
    </script>
</head>