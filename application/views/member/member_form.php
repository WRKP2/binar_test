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
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="Alamat">Alamat <?php echo form_error('Alamat') ?></label>
            <textarea class="form-control" rows="3" name="Alamat" id="Alamat" placeholder="Alamat"><?php echo $Alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">NoTelpon <?php echo form_error('NoTelpon') ?></label>
            <input type="text" class="form-control" name="NoTelpon" id="NoTelpon" placeholder="NoTelpon" value="<?php echo $NoTelpon; ?>" />
        </div>
	    <div class="form-group">
            <label for="idtoken">Idtoken <?php echo form_error('idtoken') ?></label>
            <textarea class="form-control" rows="3" name="idtoken" id="idtoken" placeholder="Idtoken"><?php echo $idtoken; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglinsert <?php echo form_error('tglinsert') ?></label>
            <input type="text" class="form-control" name="tglinsert" id="tglinsert" placeholder="Tglinsert" value="<?php echo $tglinsert; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isblokir <?php echo form_error('isblokir') ?></label>
            <input type="text" class="form-control" name="isblokir" id="isblokir" placeholder="Isblokir" value="<?php echo $isblokir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idjenismember <?php echo form_error('idjenismember') ?></label>
            <input type="text" class="form-control" name="idjenismember" id="idjenismember" placeholder="Idjenismember" value="<?php echo $idjenismember; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="photoUrl">PhotoUrl <?php echo form_error('photoUrl') ?></label>
            <textarea class="form-control" rows="3" name="photoUrl" id="photoUrl" placeholder="PhotoUrl"><?php echo $photoUrl; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Tokenmember <?php echo form_error('tokenmember') ?></label>
            <input type="text" class="form-control" name="tokenmember" id="tokenmember" placeholder="Tokenmember" value="<?php echo $tokenmember; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
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