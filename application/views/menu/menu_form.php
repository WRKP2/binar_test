<!doctype html>
<html>
    <head>
        <title>Menu Create</title>
        
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

        <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nmmenu <?php echo form_error('nmmenu') ?></label>
            <input type="text" class="form-control" name="nmmenu" id="nmmenu" placeholder="Nmmenu" value="<?php echo $nmmenu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tipemenu <?php echo form_error('tipemenu') ?></label>
            <input type="text" class="form-control" name="tipemenu" id="tipemenu" placeholder="Tipemenu" value="<?php echo $tipemenu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkomponen <?php echo form_error('idkomponen') ?></label>
            <input type="text" class="form-control" name="idkomponen" id="idkomponen" placeholder="Idkomponen" value="<?php echo $idkomponen; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Iduser <?php echo form_error('iduser') ?></label>
            <input type="text" class="form-control" name="iduser" id="iduser" placeholder="Iduser" value="<?php echo $iduser; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Parentmenu <?php echo form_error('parentmenu') ?></label>
            <input type="text" class="form-control" name="parentmenu" id="parentmenu" placeholder="Parentmenu" value="<?php echo $parentmenu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Urlci <?php echo form_error('urlci') ?></label>
            <input type="text" class="form-control" name="urlci" id="urlci" placeholder="Urlci" value="<?php echo $urlci; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Urut <?php echo form_error('urut') ?></label>
            <input type="text" class="form-control" name="urut" id="urut" placeholder="Urut" value="<?php echo $urut; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jmlgambar <?php echo form_error('jmlgambar') ?></label>
            <input type="text" class="form-control" name="jmlgambar" id="jmlgambar" placeholder="Jmlgambar" value="<?php echo $jmlgambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="settingform">Settingform <?php echo form_error('settingform') ?></label>
            <textarea class="form-control" rows="3" name="settingform" id="settingform" placeholder="Settingform"><?php echo $settingform; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Idaplikasi <?php echo form_error('idaplikasi') ?></label>
            <input type="text" class="form-control" name="idaplikasi" id="idaplikasi" placeholder="Idaplikasi" value="<?php echo $idaplikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isumum <?php echo form_error('isumum') ?></label>
            <input type="text" class="form-control" name="isumum" id="isumum" placeholder="Isumum" value="<?php echo $isumum; ?>" />
        </div>
	    <input type="hidden" name="idmenu" value="<?php echo $idmenu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>