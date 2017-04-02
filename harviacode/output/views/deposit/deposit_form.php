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
        <h2 style="margin-top:0px">Deposit <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tgltrx <?php echo form_error('tgltrx') ?></label>
            <input type="text" class="form-control" name="tgltrx" id="tgltrx" placeholder="Tgltrx" value="<?php echo $tgltrx; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Saldoawal <?php echo form_error('saldoawal') ?></label>
            <input type="text" class="form-control" name="saldoawal" id="saldoawal" placeholder="Saldoawal" value="<?php echo $saldoawal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Saldomasuk <?php echo form_error('saldomasuk') ?></label>
            <input type="text" class="form-control" name="saldomasuk" id="saldomasuk" placeholder="Saldomasuk" value="<?php echo $saldomasuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Saldokeluar <?php echo form_error('saldokeluar') ?></label>
            <input type="text" class="form-control" name="saldokeluar" id="saldokeluar" placeholder="Saldokeluar" value="<?php echo $saldokeluar; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Saldoakhir <?php echo form_error('saldoakhir') ?></label>
            <input type="text" class="form-control" name="saldoakhir" id="saldoakhir" placeholder="Saldoakhir" value="<?php echo $saldoakhir; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangansistem">Keterangansistem <?php echo form_error('keterangansistem') ?></label>
            <textarea class="form-control" rows="3" name="keterangansistem" id="keterangansistem" placeholder="Keterangansistem"><?php echo $keterangansistem; ?></textarea>
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('deposit') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>