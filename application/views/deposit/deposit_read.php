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
        <h2 style="margin-top:0px">Deposit Read</h2>
        <table class="table">
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Tgltrx</td><td><?php echo $tgltrx; ?></td></tr>
	    <tr><td>Saldoawal</td><td><?php echo $saldoawal; ?></td></tr>
	    <tr><td>Saldomasuk</td><td><?php echo $saldomasuk; ?></td></tr>
	    <tr><td>Saldokeluar</td><td><?php echo $saldokeluar; ?></td></tr>
	    <tr><td>Saldoakhir</td><td><?php echo $saldoakhir; ?></td></tr>
	    <tr><td>Keterangansistem</td><td><?php echo $keterangansistem; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('deposit') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>