<h2 style="margin-top:0px">Resto <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="Nama_Resto">Nama Resto <?php echo form_error('Nama_Resto') ?></label>
            <textarea class="form-control" rows="3" name="Nama_Resto" id="Nama_Resto" placeholder="Nama Resto"><?php echo $Nama_Resto; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="Alamat">Alamat <?php echo form_error('Alamat') ?></label>
            <textarea class="form-control" rows="3" name="Alamat" id="Alamat" placeholder="Alamat"><?php echo $Alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">No Tlp <?php echo form_error('no_tlp') ?></label>
            <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="No Tlp" value="<?php echo $no_tlp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('resto') ?>" class="btn btn-default">Cancel</a>
	</form>
