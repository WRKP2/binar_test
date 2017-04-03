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
        <h2 style="margin-top:0px">Detailprodukkategori <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Iddetailproduk <?php echo form_error('iddetailproduk') ?></label>
            <input type="text" class="form-control" name="iddetailproduk" id="iddetailproduk" placeholder="Iddetailproduk" value="<?php echo $iddetailproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkategori <?php echo form_error('idkategori') ?></label>
            <input type="text" class="form-control" name="idkategori" id="idkategori" placeholder="Idkategori" value="<?php echo $idkategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglinsert <?php echo form_error('tglinsert') ?></label>
            <input type="text" class="form-control" name="tglinsert" id="tglinsert" placeholder="Tglinsert" value="<?php echo $tglinsert; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpegawai <?php echo form_error('idpegawai') ?></label>
            <input type="text" class="form-control" name="idpegawai" id="idpegawai" placeholder="Idpegawai" value="<?php echo $idpegawai; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailprodukkategori') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>