<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="idbooking">Idbooking <?php echo form_error('idbooking') ?></label>
            <textarea class="form-control" rows="3" name="idbooking" id="idbooking" placeholder="Idbooking"><?php echo $idbooking; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tglbooking <?php echo form_error('tglbooking') ?></label>
            <input type="text" class="form-control" name="tglbooking" id="tglbooking" placeholder="Tglbooking" value="<?php echo $tglbooking; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglbatalbooking <?php echo form_error('tglbatalbooking') ?></label>
            <input type="text" class="form-control" name="tglbatalbooking" id="tglbatalbooking" placeholder="Tglbatalbooking" value="<?php echo $tglbatalbooking; ?>" />
        </div>
	    <div class="form-group">
            <label for="keteranganbatal">Keteranganbatal <?php echo form_error('keteranganbatal') ?></label>
            <textarea class="form-control" rows="3" name="keteranganbatal" id="keteranganbatal" placeholder="Keteranganbatal"><?php echo $keteranganbatal; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="float">Harganormal <?php echo form_error('harganormal') ?></label>
            <input type="text" class="form-control" name="harganormal" id="harganormal" placeholder="Harganormal" value="<?php echo $harganormal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Hargadiscount <?php echo form_error('hargadiscount') ?></label>
            <input type="text" class="form-control" name="hargadiscount" id="hargadiscount" placeholder="Hargadiscount" value="<?php echo $hargadiscount; ?>" />
        </div>
	    <div class="form-group">
            <label for="idvoucher">Idvoucher <?php echo form_error('idvoucher') ?></label>
            <textarea class="form-control" rows="3" name="idvoucher" id="idvoucher" placeholder="Idvoucher"><?php echo $idvoucher; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpegawai <?php echo form_error('idpegawai') ?></label>
            <input type="text" class="form-control" name="idpegawai" id="idpegawai" placeholder="Idpegawai" value="<?php echo $idpegawai; ?>" />
        </div>
	    <div class="form-group">
            <label for="spesialrequest">Spesialrequest <?php echo form_error('spesialrequest') ?></label>
            <textarea class="form-control" rows="3" name="spesialrequest" id="spesialrequest" placeholder="Spesialrequest"><?php echo $spesialrequest; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tglupdate <?php echo form_error('tglupdate') ?></label>
            <input type="text" class="form-control" name="tglupdate" id="tglupdate" placeholder="Tglupdate" value="<?php echo $tglupdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idjenisbayar <?php echo form_error('idjenisbayar') ?></label>
            <input type="text" class="form-control" name="idjenisbayar" id="idjenisbayar" placeholder="Idjenisbayar" value="<?php echo $idjenisbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglbayar <?php echo form_error('tglbayar') ?></label>
            <input type="text" class="form-control" name="tglbayar" id="tglbayar" placeholder="Tglbayar" value="<?php echo $tglbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Hargadibayar <?php echo form_error('hargadibayar') ?></label>
            <input type="text" class="form-control" name="hargadibayar" id="hargadibayar" placeholder="Hargadibayar" value="<?php echo $hargadibayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isfinal <?php echo form_error('isfinal') ?></label>
            <input type="text" class="form-control" name="isfinal" id="isfinal" placeholder="Isfinal" value="<?php echo $isfinal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nominalvoucher <?php echo form_error('nominalvoucher') ?></label>
            <input type="text" class="form-control" name="nominalvoucher" id="nominalvoucher" placeholder="Nominalvoucher" value="<?php echo $nominalvoucher; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>