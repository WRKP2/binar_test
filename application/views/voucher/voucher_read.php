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
        <h2 style="margin-top:0px">Voucher Read</h2>
        <table class="table">
	    <tr><td>Voucher</td><td><?php echo $voucher; ?></td></tr>
	    <tr><td>Nominal</td><td><?php echo $nominal; ?></td></tr>
	    <tr><td>Prosentase</td><td><?php echo $prosentase; ?></td></tr>
	    <tr><td>Tglberlakudari</td><td><?php echo $tglberlakudari; ?></td></tr>
	    <tr><td>Tglberlakusampai</td><td><?php echo $tglberlakusampai; ?></td></tr>
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Isterpakai</td><td><?php echo $isterpakai; ?></td></tr>
	    <tr><td>Tglpakai</td><td><?php echo $tglpakai; ?></td></tr>
	    <tr><td>Linkimage</td><td><?php echo $linkimage; ?></td></tr>
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Jumlahmaxpengguna</td><td><?php echo $jumlahmaxpengguna; ?></td></tr>
	    <tr><td>Penjelasan</td><td><?php echo $penjelasan; ?></td></tr>
	    <tr><td>Idjenisvoucher</td><td><?php echo $idjenisvoucher; ?></td></tr>
	    <tr><td>Aktifjmlrekomendasi</td><td><?php echo $aktifjmlrekomendasi; ?></td></tr>
	    <tr><td>Dayvoucher</td><td><?php echo $dayvoucher; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('voucher') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>