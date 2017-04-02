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
        <h2 style="margin-top:0px">Detailproduk Read</h2>
        <table class="table">
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Idkategoriproduk</td><td><?php echo $idkategoriproduk; ?></td></tr>
	    <tr><td>Juduldetailproduk</td><td><?php echo $juduldetailproduk; ?></td></tr>
	    <tr><td>Diskripsiproduk</td><td><?php echo $diskripsiproduk; ?></td></tr>
	    <tr><td>Rate</td><td><?php echo $rate; ?></td></tr>
	    <tr><td>Ratediscount</td><td><?php echo $ratediscount; ?></td></tr>
	    <tr><td>Rancode</td><td><?php echo $rancode; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td>Kapasitas</td><td><?php echo $kapasitas; ?></td></tr>
	    <tr><td>Standartpemakaian</td><td><?php echo $standartpemakaian; ?></td></tr>
	    <tr><td>Standart</td><td><?php echo $standart; ?></td></tr>
	    <tr><td>Idsatuan</td><td><?php echo $idsatuan; ?></td></tr>
	    <tr><td>Isfavorit</td><td><?php echo $isfavorit; ?></td></tr>
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailproduk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>