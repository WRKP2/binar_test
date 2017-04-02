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
        <h2 style="margin-top:0px">Memberproduk Read</h2>
        <table class="table">
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Tgljadimember</td><td><?php echo $tgljadimember; ?></td></tr>
	    <tr><td>Isfromrekomendasi</td><td><?php echo $isfromrekomendasi; ?></td></tr>
	    <tr><td>Idreveral</td><td><?php echo $idreveral; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('memberproduk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>