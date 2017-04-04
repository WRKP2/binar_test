<!doctype html>
<html>
    <head>
        <title>Transaksi Read</title>
        
        <!-- ADMINLTE-->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- ADMINLTE-->

    </head>
    <body>

<!-- ADMINLTE-->
    <?php
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
    ?>
    <div style="padding:15px">
<!-- ADMINLTE-->

        <h2 style="margin-top:0px">Transaksi Read</h2>
        <table class="table table-bordered table-striped table-hover">
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
	</table>
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default" style="float: center;">Cancel</a>

<!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

        </body>
</html>