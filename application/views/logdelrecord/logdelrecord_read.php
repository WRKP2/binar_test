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
        <h2 style="margin-top:0px">Logdelrecord Read</h2>
        <table class="table">
	    <tr><td>Idxhapus</td><td><?php echo $idxhapus; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Nmtable</td><td><?php echo $nmtable; ?></td></tr>
	    <tr><td>Tgllog</td><td><?php echo $tgllog; ?></td></tr>
	    <tr><td>Ideksekusi</td><td><?php echo $ideksekusi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('logdelrecord') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>