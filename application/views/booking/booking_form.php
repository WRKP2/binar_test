<!doctype html>
<html>
    <head>
        <title>Booking Create</title>
        
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

        <h2 style="margin-top:0px">Booking <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="datetime">Tglbooking <?php echo form_error('tglbooking') ?></label>
            <input type="text" class="form-control" name="tglbooking" id="tglbooking" placeholder="Tglbooking" value="<?php echo $tglbooking; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Iddetailproduk <?php echo form_error('iddetailproduk') ?></label>
            <input type="text" class="form-control" name="iddetailproduk" id="iddetailproduk" placeholder="Iddetailproduk" value="<?php echo $iddetailproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkategoriproduk <?php echo form_error('idkategoriproduk') ?></label>
            <input type="text" class="form-control" name="idkategoriproduk" id="idkategoriproduk" placeholder="Idkategoriproduk" value="<?php echo $idkategoriproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglperuntukandari <?php echo form_error('tglperuntukandari') ?></label>
            <input type="text" class="form-control" name="tglperuntukandari" id="tglperuntukandari" placeholder="Tglperuntukandari" value="<?php echo $tglperuntukandari; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglperuntukansampai <?php echo form_error('tglperuntukansampai') ?></label>
            <input type="text" class="form-control" name="tglperuntukansampai" id="tglperuntukansampai" placeholder="Tglperuntukansampai" value="<?php echo $tglperuntukansampai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jmldewasa <?php echo form_error('jmldewasa') ?></label>
            <input type="text" class="form-control" name="jmldewasa" id="jmldewasa" placeholder="Jmldewasa" value="<?php echo $jmldewasa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jmlanak <?php echo form_error('jmlanak') ?></label>
            <input type="text" class="form-control" name="jmlanak" id="jmlanak" placeholder="Jmlanak" value="<?php echo $jmlanak; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jmlhewan <?php echo form_error('jmlhewan') ?></label>
            <input type="text" class="form-control" name="jmlhewan" id="jmlhewan" placeholder="Jmlhewan" value="<?php echo $jmlhewan; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangantambahn">Keterangantambahn <?php echo form_error('keterangantambahn') ?></label>
            <textarea class="form-control" rows="3" name="keterangantambahn" id="keterangantambahn" placeholder="Keterangantambahn"><?php echo $keterangantambahn; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="float">Jmltransfer <?php echo form_error('jmltransfer') ?></label>
            <input type="text" class="form-control" name="jmltransfer" id="jmltransfer" placeholder="Jmltransfer" value="<?php echo $jmltransfer; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idjenispembayaran <?php echo form_error('idjenispembayaran') ?></label>
            <input type="text" class="form-control" name="idjenispembayaran" id="idjenispembayaran" placeholder="Idjenispembayaran" value="<?php echo $idjenispembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomorkartu <?php echo form_error('nomorkartu') ?></label>
            <input type="text" class="form-control" name="nomorkartu" id="nomorkartu" placeholder="Nomorkartu" value="<?php echo $nomorkartu; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgltransfer <?php echo form_error('tgltransfer') ?></label>
            <input type="text" class="form-control" name="tgltransfer" id="tgltransfer" placeholder="Tgltransfer" value="<?php echo $tgltransfer; ?>" />
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
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Hargadiscount <?php echo form_error('hargadiscount') ?></label>
            <input type="text" class="form-control" name="hargadiscount" id="hargadiscount" placeholder="Hargadiscount" value="<?php echo $hargadiscount; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jmlhari <?php echo form_error('jmlhari') ?></label>
            <input type="text" class="form-control" name="jmlhari" id="jmlhari" placeholder="Jmlhari" value="<?php echo $jmlhari; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('booking') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>