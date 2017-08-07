<h2 style="margin-top:0px">Data <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">ID <?php echo form_error('ID') ?></label>
            <input type="text" class="form-control" name="ID" id="ID" placeholder="ID" value="<?php echo $ID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Asal <?php echo form_error('asal') ?></label>
            <input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" value="<?php echo $asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Gabung <?php echo form_error('gabung') ?></label>
            <input type="text" class="form-control" name="gabung" id="gabung" placeholder="Gabung" value="<?php echo $gabung; ?>" />
        </div>
	    <input type="hidden" name="no" value="<?php echo $no; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data') ?>" class="btn btn-default">Cancel</a>
	</form>
