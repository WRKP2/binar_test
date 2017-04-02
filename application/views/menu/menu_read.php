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
        <h2 style="margin-top:0px">Menu Read</h2>
        <table class="table">
	    <tr><td>Nmmenu</td><td><?php echo $nmmenu; ?></td></tr>
	    <tr><td>Tipemenu</td><td><?php echo $tipemenu; ?></td></tr>
	    <tr><td>Idkomponen</td><td><?php echo $idkomponen; ?></td></tr>
	    <tr><td>Iduser</td><td><?php echo $iduser; ?></td></tr>
	    <tr><td>Parentmenu</td><td><?php echo $parentmenu; ?></td></tr>
	    <tr><td>Urlci</td><td><?php echo $urlci; ?></td></tr>
	    <tr><td>Urut</td><td><?php echo $urut; ?></td></tr>
	    <tr><td>Jmlgambar</td><td><?php echo $jmlgambar; ?></td></tr>
	    <tr><td>Settingform</td><td><?php echo $settingform; ?></td></tr>
	    <tr><td>Idaplikasi</td><td><?php echo $idaplikasi; ?></td></tr>
	    <tr><td>Isumum</td><td><?php echo $isumum; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>