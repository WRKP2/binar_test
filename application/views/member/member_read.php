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
        <h2 style="margin-top:0px">Member Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
	    <tr><td>NoTelpon</td><td><?php echo $NoTelpon; ?></td></tr>
	    <tr><td>Idtoken</td><td><?php echo $idtoken; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Isblokir</td><td><?php echo $isblokir; ?></td></tr>
	    <tr><td>Idjenismember</td><td><?php echo $idjenismember; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>PhotoUrl</td><td><?php echo $photoUrl; ?></td></tr>
	    <tr><td>Tokenmember</td><td><?php echo $tokenmember; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('member') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>