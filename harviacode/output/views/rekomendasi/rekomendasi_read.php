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
        <h2 style="margin-top:0px">Rekomendasi Read</h2>
        <table class="table">
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Idperekomendasi</td><td><?php echo $idperekomendasi; ?></td></tr>
	    <tr><td>Idmemberyangdirekomendasi</td><td><?php echo $idmemberyangdirekomendasi; ?></td></tr>
	    <tr><td>Tglrekomendassi</td><td><?php echo $tglrekomendassi; ?></td></tr>
	    <tr><td>Longlatacept</td><td><?php echo $longlatacept; ?></td></tr>
	    <tr><td>Issetujurekom</td><td><?php echo $issetujurekom; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rekomendasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>