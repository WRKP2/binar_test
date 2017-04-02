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
        <h2 style="margin-top:0px">Kategoriproduk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('Kategori') ?></label>
            <input type="text" class="form-control" name="Kategori" id="Kategori" placeholder="Kategori" value="<?php echo $Kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="icon">Icon <?php echo form_error('icon') ?></label>
            <textarea class="form-control" rows="3" name="icon" id="icon" placeholder="Icon"><?php echo $icon; ?></textarea>
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategoriproduk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>