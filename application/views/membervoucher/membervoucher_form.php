<!doctype html>
<html>
    <head>
        <title>Membervoucher Create</title>
        
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

        <h2 style="margin-top:0px">Membervoucher <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idvoucher <?php echo form_error('idvoucher') ?></label>
            <input type="text" class="form-control" name="idvoucher" id="idvoucher" placeholder="Idvoucher" value="<?php echo $idvoucher; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglpakai <?php echo form_error('tglpakai') ?></label>
            <input type="text" class="form-control" name="tglpakai" id="tglpakai" placeholder="Tglpakai" value="<?php echo $tglpakai; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isdipakai <?php echo form_error('isdipakai') ?></label>
            <input type="text" class="form-control" name="isdipakai" id="isdipakai" placeholder="Isdipakai" value="<?php echo $isdipakai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idjenisvoucher <?php echo form_error('idjenisvoucher') ?></label>
            <input type="text" class="form-control" name="idjenisvoucher" id="idjenisvoucher" placeholder="Idjenisvoucher" value="<?php echo $idjenisvoucher; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idreveral <?php echo form_error('idreveral') ?></label>
            <input type="text" class="form-control" name="idreveral" id="idreveral" placeholder="Idreveral" value="<?php echo $idreveral; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isdipakaireveral <?php echo form_error('isdipakaireveral') ?></label>
            <input type="text" class="form-control" name="isdipakaireveral" id="isdipakaireveral" placeholder="Isdipakaireveral" value="<?php echo $isdipakaireveral; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('membervoucher') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>