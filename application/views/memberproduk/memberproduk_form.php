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
        <h2 style="margin-top:0px">Memberproduk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgljadimember <?php echo form_error('tgljadimember') ?></label>
            <input type="text" class="form-control" name="tgljadimember" id="tgljadimember" placeholder="Tgljadimember" value="<?php echo $tgljadimember; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isfromrekomendasi <?php echo form_error('isfromrekomendasi') ?></label>
            <input type="text" class="form-control" name="isfromrekomendasi" id="isfromrekomendasi" placeholder="Isfromrekomendasi" value="<?php echo $isfromrekomendasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idreveral <?php echo form_error('idreveral') ?></label>
            <input type="text" class="form-control" name="idreveral" id="idreveral" placeholder="Idreveral" value="<?php echo $idreveral; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('memberproduk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>