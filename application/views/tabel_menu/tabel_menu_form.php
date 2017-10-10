<h2 style="margin-top:0px">Tabel_menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul Menu <?php echo form_error('judul_menu') ?></label>
            <input type="text" class="form-control" name="judul_menu" id="judul_menu" placeholder="Judul Menu" value="<?php echo $judul_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Link <?php echo form_error('link') ?></label>
            <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Is Main Menu <?php echo form_error('is_main_menu') ?></label>
            <input type="text" class="form-control" name="is_main_menu" id="is_main_menu" placeholder="Is Main Menu" value="<?php echo $is_main_menu; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tabel_menu') ?>" class="btn btn-default">Cancel</a>
	</form>
