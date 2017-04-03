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
        <h2 style="margin-top:0px">Reviewuser Read</h2>
        <table class="table">
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Review</td><td><?php echo $review; ?></td></tr>
	    <tr><td>Star</td><td><?php echo $star; ?></td></tr>
	    <tr><td>Tglreview</td><td><?php echo $tglreview; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('reviewuser') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>