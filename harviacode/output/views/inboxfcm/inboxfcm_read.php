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
        <h2 style="margin-top:0px">Inboxfcm Read</h2>
        <table class="table">
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
	    <tr><td>Tglmessage</td><td><?php echo $tglmessage; ?></td></tr>
	    <tr><td>Isterbaca</td><td><?php echo $isterbaca; ?></td></tr>
	    <tr><td>Idmenuandroid</td><td><?php echo $idmenuandroid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('inboxfcm') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>