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
        <h2 style="margin-top:0px">Transaksi Read</h2>
        <table class="table">
	    <tr><td>Idbooking</td><td><?php echo $idbooking; ?></td></tr>
	    <tr><td>Tglbooking</td><td><?php echo $tglbooking; ?></td></tr>
	    <tr><td>Tglbatalbooking</td><td><?php echo $tglbatalbooking; ?></td></tr>
	    <tr><td>Keteranganbatal</td><td><?php echo $keteranganbatal; ?></td></tr>
	    <tr><td>Harganormal</td><td><?php echo $harganormal; ?></td></tr>
	    <tr><td>Hargadiscount</td><td><?php echo $hargadiscount; ?></td></tr>
	    <tr><td>Idvoucher</td><td><?php echo $idvoucher; ?></td></tr>
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td>Spesialrequest</td><td><?php echo $spesialrequest; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idjenisbayar</td><td><?php echo $idjenisbayar; ?></td></tr>
	    <tr><td>Tglbayar</td><td><?php echo $tglbayar; ?></td></tr>
	    <tr><td>Hargadibayar</td><td><?php echo $hargadibayar; ?></td></tr>
	    <tr><td>Isfinal</td><td><?php echo $isfinal; ?></td></tr>
	    <tr><td>Nominalvoucher</td><td><?php echo $nominalvoucher; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>