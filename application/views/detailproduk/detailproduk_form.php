<!doctype html>
<html>
    <head>
        <title>Detailproduk Create</title>
        
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

        <h2 style="margin-top:0px">Detailproduk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkategoriproduk <?php echo form_error('idkategoriproduk') ?></label>
            <input type="text" class="form-control" name="idkategoriproduk" id="idkategoriproduk" placeholder="Idkategoriproduk" value="<?php echo $idkategoriproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Juduldetailproduk <?php echo form_error('juduldetailproduk') ?></label>
            <input type="text" class="form-control" name="juduldetailproduk" id="juduldetailproduk" placeholder="Juduldetailproduk" value="<?php echo $juduldetailproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="diskripsiproduk">Diskripsiproduk <?php echo form_error('diskripsiproduk') ?></label>
            <textarea class="form-control" rows="3" name="diskripsiproduk" id="diskripsiproduk" placeholder="Diskripsiproduk"><?php echo $diskripsiproduk; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="float">Rate <?php echo form_error('rate') ?></label>
            <input type="text" class="form-control" name="rate" id="rate" placeholder="Rate" value="<?php echo $rate; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ratediscount <?php echo form_error('ratediscount') ?></label>
            <input type="text" class="form-control" name="ratediscount" id="ratediscount" placeholder="Ratediscount" value="<?php echo $ratediscount; ?>" />
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
            <label for="int">Kapasitas <?php echo form_error('kapasitas') ?></label>
            <input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Standartpemakaian <?php echo form_error('standartpemakaian') ?></label>
            <input type="text" class="form-control" name="standartpemakaian" id="standartpemakaian" placeholder="Standartpemakaian" value="<?php echo $standartpemakaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Standart <?php echo form_error('standart') ?></label>
            <input type="text" class="form-control" name="standart" id="standart" placeholder="Standart" value="<?php echo $standart; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idsatuan <?php echo form_error('idsatuan') ?></label>
            <input type="text" class="form-control" name="idsatuan" id="idsatuan" placeholder="Idsatuan" value="<?php echo $idsatuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isfavorit <?php echo form_error('isfavorit') ?></label>
            <input type="text" class="form-control" name="isfavorit" id="isfavorit" placeholder="Isfavorit" value="<?php echo $isfavorit; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailproduk') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>