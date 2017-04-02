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
        <h2 style="margin-top:0px">Jenisfasilitas Read</h2>
        <table class="table">
	    <tr><td>Jenisfasilitas</td><td><?php echo $jenisfasilitas; ?></td></tr>
	    <tr><td>Imgfasilitas</td><td><?php echo $imgfasilitas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenisfasilitas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>