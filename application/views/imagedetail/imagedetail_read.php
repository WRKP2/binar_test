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
        <h2 style="margin-top:0px">Imagedetail Read</h2>
        <table class="table">
	    <tr><td>Iddetailproduk</td><td><?php echo $iddetailproduk; ?></td></tr>
	    <tr><td>Idkategoriproduk</td><td><?php echo $idkategoriproduk; ?></td></tr>
	    <tr><td>Linkimage</td><td><?php echo $linkimage; ?></td></tr>
	    <tr><td>Keteranganimage</td><td><?php echo $keteranganimage; ?></td></tr>
	    <tr><td>Rancode</td><td><?php echo $rancode; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Isprofile</td><td><?php echo $isprofile; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('imagedetail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>