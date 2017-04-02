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
        <h2 style="margin-top:0px">Produkpromo <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglawalpromo <?php echo form_error('tglawalpromo') ?></label>
            <input type="text" class="form-control" name="tglawalpromo" id="tglawalpromo" placeholder="Tglawalpromo" value="<?php echo $tglawalpromo; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglakhirpromo <?php echo form_error('tglakhirpromo') ?></label>
            <input type="text" class="form-control" name="tglakhirpromo" id="tglakhirpromo" placeholder="Tglakhirpromo" value="<?php echo $tglakhirpromo; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isaktif <?php echo form_error('isaktif') ?></label>
            <input type="text" class="form-control" name="isaktif" id="isaktif" placeholder="Isaktif" value="<?php echo $isaktif; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmemberpengaju <?php echo form_error('idmemberpengaju') ?></label>
            <input type="text" class="form-control" name="idmemberpengaju" id="idmemberpengaju" placeholder="Idmemberpengaju" value="<?php echo $idmemberpengaju; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isbayarpromo <?php echo form_error('isbayarpromo') ?></label>
            <input type="text" class="form-control" name="isbayarpromo" id="isbayarpromo" placeholder="Isbayarpromo" value="<?php echo $isbayarpromo; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglbayarpromo <?php echo form_error('tglbayarpromo') ?></label>
            <input type="text" class="form-control" name="tglbayarpromo" id="tglbayarpromo" placeholder="Tglbayarpromo" value="<?php echo $tglbayarpromo; ?>" />
        </div>
	    <div class="form-group">
            <label for="ketpromo">Ketpromo <?php echo form_error('ketpromo') ?></label>
            <textarea class="form-control" rows="3" name="ketpromo" id="ketpromo" placeholder="Ketpromo"><?php echo $ketpromo; ?></textarea>
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
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produkpromo') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>