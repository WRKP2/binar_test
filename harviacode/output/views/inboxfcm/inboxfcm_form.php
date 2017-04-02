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
        <h2 style="margin-top:0px">Inboxfcm <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="judul">Judul <?php echo form_error('judul') ?></label>
            <textarea class="form-control" rows="3" name="judul" id="judul" placeholder="Judul"><?php echo $judul; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="message">Message <?php echo form_error('message') ?></label>
            <textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"><?php echo $message; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tglmessage <?php echo form_error('tglmessage') ?></label>
            <input type="text" class="form-control" name="tglmessage" id="tglmessage" placeholder="Tglmessage" value="<?php echo $tglmessage; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isterbaca <?php echo form_error('isterbaca') ?></label>
            <input type="text" class="form-control" name="isterbaca" id="isterbaca" placeholder="Isterbaca" value="<?php echo $isterbaca; ?>" />
        </div>
	    <div class="form-group">
            <label for="idmenuandroid">Idmenuandroid <?php echo form_error('idmenuandroid') ?></label>
            <textarea class="form-control" rows="3" name="idmenuandroid" id="idmenuandroid" placeholder="Idmenuandroid"><?php echo $idmenuandroid; ?></textarea>
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('inboxfcm') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>