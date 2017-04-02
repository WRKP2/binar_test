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
        <h2 style="margin-top:0px">Detailprodukkategori Read</h2>
        <table class="table">
	    <tr><td>Iddetailproduk</td><td><?php echo $iddetailproduk; ?></td></tr>
	    <tr><td>Idkategori</td><td><?php echo $idkategori; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailprodukkategori') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>