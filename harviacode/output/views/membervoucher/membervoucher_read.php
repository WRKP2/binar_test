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
        <h2 style="margin-top:0px">Membervoucher Read</h2>
        <table class="table">
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Idvoucher</td><td><?php echo $idvoucher; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Tglpakai</td><td><?php echo $tglpakai; ?></td></tr>
	    <tr><td>Isdipakai</td><td><?php echo $isdipakai; ?></td></tr>
	    <tr><td>Idjenisvoucher</td><td><?php echo $idjenisvoucher; ?></td></tr>
	    <tr><td>Idreveral</td><td><?php echo $idreveral; ?></td></tr>
	    <tr><td>Isdipakaireveral</td><td><?php echo $isdipakaireveral; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('membervoucher') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>