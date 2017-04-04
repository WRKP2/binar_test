<!doctype html>
<html>
    <head>
        <title>Imagedetail Create</title>
        
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

        <h2 style="margin-top:0px">Imagedetail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Iddetailproduk <?php echo form_error('iddetailproduk') ?></label>
            <input type="text" class="form-control" name="iddetailproduk" id="iddetailproduk" placeholder="Iddetailproduk" value="<?php echo $iddetailproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkategoriproduk <?php echo form_error('idkategoriproduk') ?></label>
            <input type="text" class="form-control" name="idkategoriproduk" id="idkategoriproduk" placeholder="Idkategoriproduk" value="<?php echo $idkategoriproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="linkimage">Linkimage <?php echo form_error('linkimage') ?></label>
            <textarea class="form-control" rows="3" name="linkimage" id="linkimage" placeholder="Linkimage"><?php echo $linkimage; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="keteranganimage">Keteranganimage <?php echo form_error('keteranganimage') ?></label>
            <textarea class="form-control" rows="3" name="keteranganimage" id="keteranganimage" placeholder="Keteranganimage"><?php echo $keteranganimage; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Rancode <?php echo form_error('rancode') ?></label>
            <input type="text" class="form-control" name="rancode" id="rancode" placeholder="Rancode" value="<?php echo $rancode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglinsert <?php echo form_error('tglinsert') ?></label>
            <input type="text" class="form-control" name="tglinsert" id="tglinsert" placeholder="Tglinsert" value="<?php echo $tglinsert; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglupdate <?php echo form_error('tglupdate') ?></label>
            <input type="text" class="form-control" name="tglupdate" id="tglupdate" placeholder="Tglupdate" value="<?php echo $tglupdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpegawai <?php echo form_error('idpegawai') ?></label>
            <input type="text" class="form-control" name="idpegawai" id="idpegawai" placeholder="Idpegawai" value="<?php echo $idpegawai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isprofile <?php echo form_error('isprofile') ?></label>
            <input type="text" class="form-control" name="isprofile" id="isprofile" placeholder="Isprofile" value="<?php echo $isprofile; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('imagedetail') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>