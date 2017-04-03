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
        <h2 style="margin-top:0px">Kritiksaran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="Saran">Saran <?php echo form_error('Saran') ?></label>
            <textarea class="form-control" rows="3" name="Saran" id="Saran" placeholder="Saran"><?php echo $Saran; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tglsaran <?php echo form_error('tglsaran') ?></label>
            <input type="text" class="form-control" name="tglsaran" id="tglsaran" placeholder="Tglsaran" value="<?php echo $tglsaran; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kritiksaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>