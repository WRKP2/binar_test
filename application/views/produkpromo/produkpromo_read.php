<!doctype html>
<html>
    <head>
        <title>Produkpromo Read</title>
        
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

        <h2 style="margin-top:0px">Produkpromo Read</h2>
        <table class="table table-bordered table-striped table-hover">
	    <tr><td>Idproduk</td><td><?php echo $idproduk; ?></td></tr>
	    <tr><td>Tglawalpromo</td><td><?php echo $tglawalpromo; ?></td></tr>
	    <tr><td>Tglakhirpromo</td><td><?php echo $tglakhirpromo; ?></td></tr>
	    <tr><td>Isaktif</td><td><?php echo $isaktif; ?></td></tr>
	    <tr><td>Idmemberpengaju</td><td><?php echo $idmemberpengaju; ?></td></tr>
	    <tr><td>Isbayarpromo</td><td><?php echo $isbayarpromo; ?></td></tr>
	    <tr><td>Tglbayarpromo</td><td><?php echo $tglbayarpromo; ?></td></tr>
	    <tr><td>Ketpromo</td><td><?php echo $ketpromo; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	</table>
	    <a href="<?php echo site_url('produkpromo') ?>" class="btn btn-default" style="float: center;">Cancel</a>

<!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

        </body>
</html>