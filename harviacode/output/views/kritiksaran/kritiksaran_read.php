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
        <h2 style="margin-top:0px">Kritiksaran Read</h2>
        <table class="table">
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Saran</td><td><?php echo $Saran; ?></td></tr>
	    <tr><td>Tglsaran</td><td><?php echo $tglsaran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kritiksaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>