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
    </body>
</html>