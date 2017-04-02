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
        <h2 style="margin-top:0px">Jeniskategoridetail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Namajeniskategoridetail <?php echo form_error('namajeniskategoridetail') ?></label>
            <input type="text" class="form-control" name="namajeniskategoridetail" id="namajeniskategoridetail" placeholder="Namajeniskategoridetail" value="<?php echo $namajeniskategoridetail; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jeniskategoridetail') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>