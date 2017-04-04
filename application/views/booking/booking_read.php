<!doctype html>
<html>
    <head>
        <title>Booking Read</title>
        
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

        <h2 style="margin-top:0px">Booking Read</h2>
        <table class="table table-bordered table-striped table-hover">
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
	</table>
	    <a href="<?php echo site_url('booking') ?>" class="btn btn-default" style="float: center;">Cancel</a>

<!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

        </body>
</html>