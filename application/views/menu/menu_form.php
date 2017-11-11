<h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="NAMA_MENU">NAMA MENU <?php echo form_error('NAMA_MENU') ?></label>
            <textarea class="form-control" rows="3" name="NAMA_MENU" id="NAMA_MENU" placeholder="NAMA MENU"><?php echo $NAMA_MENU; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">ID RESTORAN <?php echo form_error('ID_RESTORAN') ?></label>
            <input type="text" class="form-control" name="ID_RESTORAN" id="ID_RESTORAN" placeholder="ID RESTORAN" value="<?php echo $ID_RESTORAN; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">HARGA <?php echo form_error('HARGA') ?></label>
            <input type="text" class="form-control" name="HARGA" id="HARGA" placeholder="HARGA" value="<?php echo $HARGA; ?>" />
        </div>
	    <div class="form-group">
            <label for="FOTO_MENU">FOTO MENU <?php echo form_error('FOTO_MENU') ?></label>
            <textarea class="form-control" rows="3" name="FOTO_MENU" id="FOTO_MENU" placeholder="FOTO MENU"><?php echo $FOTO_MENU; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="KETERANGAN">KETERANGAN <?php echo form_error('KETERANGAN') ?></label>
            <textarea class="form-control" rows="3" name="KETERANGAN" id="KETERANGAN" placeholder="KETERANGAN"><?php echo $KETERANGAN; ?></textarea>
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>
