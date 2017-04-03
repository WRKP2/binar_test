<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Fasilitasproduk Read</h2>
        <table class="table">
	    <tr><td>Idjenisfasilitas</td><td><?php echo $idjenisfasilitas; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Idmemberinsert</td><td><?php echo $idmemberinsert; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fasilitasproduk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>