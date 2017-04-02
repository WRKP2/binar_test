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
        <h2 style="margin-top:0px">Infowisata Read</h2>
        <table class="table">
	    <tr><td>Judulinfo</td><td><?php echo $judulinfo; ?></td></tr>
	    <tr><td>Deskripsihtml</td><td><?php echo $deskripsihtml; ?></td></tr>
	    <tr><td>Imgutama</td><td><?php echo $imgutama; ?></td></tr>
	    <tr><td>Mapadress</td><td><?php echo $mapadress; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('infowisata') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>