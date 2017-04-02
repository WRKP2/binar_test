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
        <h2 style="margin-top:0px">Userproduk Read</h2>
        <table class="table">
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Idjenisuser</td><td><?php echo $idjenisuser; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Idpengadd</td><td><?php echo $idpengadd; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('userproduk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>