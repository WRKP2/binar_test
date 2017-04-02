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
        <h2 style="margin-top:0px">Usergroup <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NmUserGroup <?php echo form_error('NmUserGroup') ?></label>
            <input type="text" class="form-control" name="NmUserGroup" id="NmUserGroup" placeholder="NmUserGroup" value="<?php echo $NmUserGroup; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usergroup') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>