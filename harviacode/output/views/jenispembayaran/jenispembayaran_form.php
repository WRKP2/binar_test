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
        <h2 style="margin-top:0px">Jenispembayaran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenispembayaran <?php echo form_error('jenispembayaran') ?></label>
            <input type="text" class="form-control" name="jenispembayaran" id="jenispembayaran" placeholder="Jenispembayaran" value="<?php echo $jenispembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">JenispembayaranING <?php echo form_error('jenispembayaranING') ?></label>
            <input type="text" class="form-control" name="jenispembayaranING" id="jenispembayaranING" placeholder="JenispembayaranING" value="<?php echo $jenispembayaranING; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenispembayaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>