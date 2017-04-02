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
        <h2 style="margin-top:0px">Usersistem Read</h2>
        <table class="table">
	    <tr><td>Npp</td><td><?php echo $npp; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>NoTelpon</td><td><?php echo $NoTelpon; ?></td></tr>
	    <tr><td>User</td><td><?php echo $user; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Statuspeg</td><td><?php echo $statuspeg; ?></td></tr>
	    <tr><td>Photo</td><td><?php echo $photo; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Ym</td><td><?php echo $ym; ?></td></tr>
	    <tr><td>Isaktif</td><td><?php echo $isaktif; ?></td></tr>
	    <tr><td>Idusergroup</td><td><?php echo $idusergroup; ?></td></tr>
	    <tr><td>Idkabupaten</td><td><?php echo $idkabupaten; ?></td></tr>
	    <tr><td>Idpropinsi</td><td><?php echo $idpropinsi; ?></td></tr>
	    <tr><td>Imehp</td><td><?php echo $imehp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('usersistem') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>