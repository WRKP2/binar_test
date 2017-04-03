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
        <h2 style="margin-top:0px">Infowisata <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="judulinfo">Judulinfo <?php echo form_error('judulinfo') ?></label>
            <textarea class="form-control" rows="3" name="judulinfo" id="judulinfo" placeholder="Judulinfo"><?php echo $judulinfo; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="deskripsihtml">Deskripsihtml <?php echo form_error('deskripsihtml') ?></label>
            <textarea class="form-control" rows="3" name="deskripsihtml" id="deskripsihtml" placeholder="Deskripsihtml"><?php echo $deskripsihtml; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="imgutama">Imgutama <?php echo form_error('imgutama') ?></label>
            <textarea class="form-control" rows="3" name="imgutama" id="imgutama" placeholder="Imgutama"><?php echo $imgutama; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Mapadress <?php echo form_error('mapadress') ?></label>
            <input type="text" class="form-control" name="mapadress" id="mapadress" placeholder="Mapadress" value="<?php echo $mapadress; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglinsert <?php echo form_error('tglinsert') ?></label>
            <input type="text" class="form-control" name="tglinsert" id="tglinsert" placeholder="Tglinsert" value="<?php echo $tglinsert; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglupdate <?php echo form_error('tglupdate') ?></label>
            <input type="text" class="form-control" name="tglupdate" id="tglupdate" placeholder="Tglupdate" value="<?php echo $tglupdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpegawai <?php echo form_error('idpegawai') ?></label>
            <input type="text" class="form-control" name="idpegawai" id="idpegawai" placeholder="Idpegawai" value="<?php echo $idpegawai; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('infowisata') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>