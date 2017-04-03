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
        <h2 style="margin-top:0px">Komponen <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NmKomponen <?php echo form_error('NmKomponen') ?></label>
            <input type="text" class="form-control" name="NmKomponen" id="NmKomponen" placeholder="NmKomponen" value="<?php echo $NmKomponen; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Isshow <?php echo form_error('isshow') ?></label>
            <input type="text" class="form-control" name="isshow" id="isshow" placeholder="Isshow" value="<?php echo $isshow; ?>" />
        </div>
	    <input type="hidden" name="idkomponen" value="<?php echo $idkomponen; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('komponen') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>