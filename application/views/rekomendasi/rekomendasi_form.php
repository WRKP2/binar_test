<!doctype html>
<html>
    <head>
        <title>Rekomendasi Create</title>
        
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

        <h2 style="margin-top:0px">Rekomendasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idperekomendasi <?php echo form_error('idperekomendasi') ?></label>
            <input type="text" class="form-control" name="idperekomendasi" id="idperekomendasi" placeholder="Idperekomendasi" value="<?php echo $idperekomendasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmemberyangdirekomendasi <?php echo form_error('idmemberyangdirekomendasi') ?></label>
            <input type="text" class="form-control" name="idmemberyangdirekomendasi" id="idmemberyangdirekomendasi" placeholder="Idmemberyangdirekomendasi" value="<?php echo $idmemberyangdirekomendasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglrekomendassi <?php echo form_error('tglrekomendassi') ?></label>
            <input type="text" class="form-control" name="tglrekomendassi" id="tglrekomendassi" placeholder="Tglrekomendassi" value="<?php echo $tglrekomendassi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Longlatacept <?php echo form_error('longlatacept') ?></label>
            <input type="text" class="form-control" name="longlatacept" id="longlatacept" placeholder="Longlatacept" value="<?php echo $longlatacept; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Issetujurekom <?php echo form_error('issetujurekom') ?></label>
            <input type="text" class="form-control" name="issetujurekom" id="issetujurekom" placeholder="Issetujurekom" value="<?php echo $issetujurekom; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rekomendasi') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>