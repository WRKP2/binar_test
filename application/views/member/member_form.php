<!doctype html>
<html>
    <head>
        <title>Member Create</title>
        
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

        <h2 style="margin-top:0px">Member <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Member <?php echo form_error('nama_member') ?></label>
            <input type="text" class="form-control" name="nama_member" id="nama_member" placeholder="Nama Member" value="<?php echo $nama_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Member <?php echo form_error('alamat_member') ?></label>
            <input type="text" class="form-control" name="alamat_member" id="alamat_member" placeholder="Alamat Member" value="<?php echo $alamat_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TglLahir Member <?php echo form_error('tglLahir_member') ?></label>
            <input type="text" class="form-control" name="tglLahir_member" id="tglLahir_member" placeholder="TglLahir Member" value="<?php echo $tglLahir_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email Member <?php echo form_error('email_member') ?></label>
            <input type="text" class="form-control" name="email_member" id="email_member" placeholder="Email Member" value="<?php echo $email_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoTelp Member <?php echo form_error('noTelp_member') ?></label>
            <input type="text" class="form-control" name="noTelp_member" id="noTelp_member" placeholder="NoTelp Member" value="<?php echo $noTelp_member; ?>" />
        </div>
	    <input type="hidden" name="id_member" value="<?php echo $id_member; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('member') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>