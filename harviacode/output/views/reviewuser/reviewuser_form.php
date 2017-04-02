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
        <h2 style="margin-top:0px">Reviewuser <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="review">Review <?php echo form_error('review') ?></label>
            <textarea class="form-control" rows="3" name="review" id="review" placeholder="Review"><?php echo $review; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Star <?php echo form_error('star') ?></label>
            <input type="text" class="form-control" name="star" id="star" placeholder="Star" value="<?php echo $star; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglreview <?php echo form_error('tglreview') ?></label>
            <input type="text" class="form-control" name="tglreview" id="tglreview" placeholder="Tglreview" value="<?php echo $tglreview; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('reviewuser') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>