<h2 style="margin-top:0px">Foto <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Foto <?php echo form_error('nama_foto') ?></label>
            <input type="text" class="form-control" name="nama_foto" id="nama_foto" placeholder="Nama Foto" value="<?php echo $nama_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Token <?php echo form_error('token') ?></label>
            <input type="text" class="form-control" name="token" id="token" placeholder="Token" value="<?php echo $token; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('foto') ?>" class="btn btn-default">Cancel</a>
	</form>
