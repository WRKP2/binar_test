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
        <h2 style="margin-top:0px">Booking Read</h2>
        <table class="table">
	    <tr><td>Tglbooking</td><td><?php echo $tglbooking; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Iddetailproduk</td><td><?php echo $iddetailproduk; ?></td></tr>
	    <tr><td>Idkategoriproduk</td><td><?php echo $idkategoriproduk; ?></td></tr>
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Tglperuntukandari</td><td><?php echo $tglperuntukandari; ?></td></tr>
	    <tr><td>Tglperuntukansampai</td><td><?php echo $tglperuntukansampai; ?></td></tr>
	    <tr><td>Jmldewasa</td><td><?php echo $jmldewasa; ?></td></tr>
	    <tr><td>Jmlanak</td><td><?php echo $jmlanak; ?></td></tr>
	    <tr><td>Jmlhewan</td><td><?php echo $jmlhewan; ?></td></tr>
	    <tr><td>Keterangantambahn</td><td><?php echo $keterangantambahn; ?></td></tr>
	    <tr><td>Jmltransfer</td><td><?php echo $jmltransfer; ?></td></tr>
	    <tr><td>Idjenispembayaran</td><td><?php echo $idjenispembayaran; ?></td></tr>
	    <tr><td>Nomorkartu</td><td><?php echo $nomorkartu; ?></td></tr>
	    <tr><td>Tgltransfer</td><td><?php echo $tgltransfer; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Hargadiscount</td><td><?php echo $hargadiscount; ?></td></tr>
	    <tr><td>Jmlhari</td><td><?php echo $jmlhari; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('booking') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>