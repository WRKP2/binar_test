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
        <h2 style="margin-top:0px">Jenisfasilitas <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenisfasilitas <?php echo form_error('jenisfasilitas') ?></label>
            <input type="text" class="form-control" name="jenisfasilitas" id="jenisfasilitas" placeholder="Jenisfasilitas" value="<?php echo $jenisfasilitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="imgfasilitas">Imgfasilitas <?php echo form_error('imgfasilitas') ?></label>
            <textarea class="form-control" rows="3" name="imgfasilitas" id="imgfasilitas" placeholder="Imgfasilitas"><?php echo $imgfasilitas; ?></textarea>
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenisfasilitas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>