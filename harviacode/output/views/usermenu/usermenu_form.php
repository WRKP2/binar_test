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
        <h2 style="margin-top:0px">Usermenu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Iduser <?php echo form_error('iduser') ?></label>
            <input type="text" class="form-control" name="iduser" id="iduser" placeholder="Iduser" value="<?php echo $iduser; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmenu <?php echo form_error('idmenu') ?></label>
            <input type="text" class="form-control" name="idmenu" id="idmenu" placeholder="Idmenu" value="<?php echo $idmenu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idaplikasi <?php echo form_error('idaplikasi') ?></label>
            <input type="text" class="form-control" name="idaplikasi" id="idaplikasi" placeholder="Idaplikasi" value="<?php echo $idaplikasi; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usermenu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>