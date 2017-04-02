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
        <h2 style="margin-top:0px">Logdelrecord <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Idxhapus <?php echo form_error('idxhapus') ?></label>
            <input type="text" class="form-control" name="idxhapus" id="idxhapus" placeholder="Idxhapus" value="<?php echo $idxhapus; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Nmtable <?php echo form_error('nmtable') ?></label>
            <input type="text" class="form-control" name="nmtable" id="nmtable" placeholder="Nmtable" value="<?php echo $nmtable; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgllog <?php echo form_error('tgllog') ?></label>
            <input type="text" class="form-control" name="tgllog" id="tgllog" placeholder="Tgllog" value="<?php echo $tgllog; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ideksekusi <?php echo form_error('ideksekusi') ?></label>
            <input type="text" class="form-control" name="ideksekusi" id="ideksekusi" placeholder="Ideksekusi" value="<?php echo $ideksekusi; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('logdelrecord') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>