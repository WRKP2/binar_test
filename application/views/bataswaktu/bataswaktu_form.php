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
        <h2 style="margin-top:0px">Bataswaktu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Bataswaktu <?php echo form_error('bataswaktu') ?></label>
            <input type="text" class="form-control" name="bataswaktu" id="bataswaktu" placeholder="Bataswaktu" value="<?php echo $bataswaktu; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bataswaktu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>