<!doctype html>
<html>
    <head>
        <title>Logdelrecord Read</title>
        
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

        <h2 style="margin-top:0px">Logdelrecord Read</h2>
        <table class="table table-bordered table-striped table-hover">
	    <tr><td>Idxhapus</td><td><?php echo $idxhapus; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Nmtable</td><td><?php echo $nmtable; ?></td></tr>
	    <tr><td>Tgllog</td><td><?php echo $tgllog; ?></td></tr>
	    <tr><td>Ideksekusi</td><td><?php echo $ideksekusi; ?></td></tr>
	</table>
	    <a href="<?php echo site_url('logdelrecord') ?>" class="btn btn-default" style="float: center;">Cancel</a>

<!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

        </body>
</html>