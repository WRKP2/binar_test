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
        <h2 style="margin-top:0px">Tipemenu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">IdTipeMenu <?php echo form_error('idTipeMenu') ?></label>
            <input type="text" class="form-control" name="idTipeMenu" id="idTipeMenu" placeholder="IdTipeMenu" value="<?php echo $idTipeMenu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NmTipeMenu <?php echo form_error('NmTipeMenu') ?></label>
            <input type="text" class="form-control" name="NmTipeMenu" id="NmTipeMenu" placeholder="NmTipeMenu" value="<?php echo $NmTipeMenu; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tipemenu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>