<h2 style="margin-top:0px">Files <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Filename <?php echo form_error('filename') ?></label>
            <input type="text" class="form-control" name="filename" id="filename" placeholder="Filename" value="<?php echo $filename; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('files') ?>" class="btn btn-default">Cancel</a>
	</form>
