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
        <h2 style="margin-top:0px">Produkpromo Read</h2>
        <table class="table">
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Tglawalpromo</td><td><?php echo $tglawalpromo; ?></td></tr>
	    <tr><td>Tglakhirpromo</td><td><?php echo $tglakhirpromo; ?></td></tr>
	    <tr><td>Isaktif</td><td><?php echo $isaktif; ?></td></tr>
	    <tr><td>Idmemberpengaju</td><td><?php echo $idmemberpengaju; ?></td></tr>
	    <tr><td>Isbayarpromo</td><td><?php echo $isbayarpromo; ?></td></tr>
	    <tr><td>Tglbayarpromo</td><td><?php echo $tglbayarpromo; ?></td></tr>
	    <tr><td>Ketpromo</td><td><?php echo $ketpromo; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('produkpromo') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>