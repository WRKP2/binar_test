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
        <h2 style="margin-top:0px">Fasilitasproduk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idjenisfasilitas <?php echo form_error('idjenisfasilitas') ?></label>
            <input type="text" class="form-control" name="idjenisfasilitas" id="idjenisfasilitas" placeholder="Idjenisfasilitas" value="<?php echo $idjenisfasilitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglinsert <?php echo form_error('tglinsert') ?></label>
            <input type="text" class="form-control" name="tglinsert" id="tglinsert" placeholder="Tglinsert" value="<?php echo $tglinsert; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmemberinsert <?php echo form_error('idmemberinsert') ?></label>
            <input type="text" class="form-control" name="idmemberinsert" id="idmemberinsert" placeholder="Idmemberinsert" value="<?php echo $idmemberinsert; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fasilitasproduk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>