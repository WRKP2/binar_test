<h2 style="margin-top:0px">User_app <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NAMA <?php echo form_error('NAMA') ?></label>
            <input type="text" class="form-control" name="NAMA" id="NAMA" placeholder="NAMA" value="<?php echo $NAMA; ?>" />
        </div>
	    <div class="form-group">
            <label for="ALAMAT">ALAMAT <?php echo form_error('ALAMAT') ?></label>
            <textarea class="form-control" rows="3" name="ALAMAT" id="ALAMAT" placeholder="ALAMAT"><?php echo $ALAMAT; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">EMAIL <?php echo form_error('EMAIL') ?></label>
            <input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL" value="<?php echo $EMAIL; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PASWORD <?php echo form_error('PASWORD') ?></label>
            <input type="text" class="form-control" name="PASWORD" id="PASWORD" placeholder="PASWORD" value="<?php echo $PASWORD; ?>" />
        </div>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user_app') ?>" class="btn btn-default">Cancel</a>
	</form>
