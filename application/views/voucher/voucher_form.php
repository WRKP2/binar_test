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
        <h2 style="margin-top:0px">Voucher <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="voucher">Voucher <?php echo form_error('voucher') ?></label>
            <textarea class="form-control" rows="3" name="voucher" id="voucher" placeholder="Voucher"><?php echo $voucher; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="float">Nominal <?php echo form_error('nominal') ?></label>
            <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Prosentase <?php echo form_error('prosentase') ?></label>
            <input type="text" class="form-control" name="prosentase" id="prosentase" placeholder="Prosentase" value="<?php echo $prosentase; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglberlakudari <?php echo form_error('tglberlakudari') ?></label>
            <input type="text" class="form-control" name="tglberlakudari" id="tglberlakudari" placeholder="Tglberlakudari" value="<?php echo $tglberlakudari; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglberlakusampai <?php echo form_error('tglberlakusampai') ?></label>
            <input type="text" class="form-control" name="tglberlakusampai" id="tglberlakusampai" placeholder="Tglberlakusampai" value="<?php echo $tglberlakusampai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isterpakai <?php echo form_error('isterpakai') ?></label>
            <input type="text" class="form-control" name="isterpakai" id="isterpakai" placeholder="Isterpakai" value="<?php echo $isterpakai; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglpakai <?php echo form_error('tglpakai') ?></label>
            <input type="text" class="form-control" name="tglpakai" id="tglpakai" placeholder="Tglpakai" value="<?php echo $tglpakai; ?>" />
        </div>
	    <div class="form-group">
            <label for="linkimage">Linkimage <?php echo form_error('linkimage') ?></label>
            <textarea class="form-control" rows="3" name="linkimage" id="linkimage" placeholder="Linkimage"><?php echo $linkimage; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Idproduk <?php echo form_error('idproduk') ?></label>
            <input type="text" class="form-control" name="idproduk" id="idproduk" placeholder="Idproduk" value="<?php echo $idproduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlahmaxpengguna <?php echo form_error('jumlahmaxpengguna') ?></label>
            <input type="text" class="form-control" name="jumlahmaxpengguna" id="jumlahmaxpengguna" placeholder="Jumlahmaxpengguna" value="<?php echo $jumlahmaxpengguna; ?>" />
        </div>
	    <div class="form-group">
            <label for="penjelasan">Penjelasan <?php echo form_error('penjelasan') ?></label>
            <textarea class="form-control" rows="3" name="penjelasan" id="penjelasan" placeholder="Penjelasan"><?php echo $penjelasan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Idjenisvoucher <?php echo form_error('idjenisvoucher') ?></label>
            <input type="text" class="form-control" name="idjenisvoucher" id="idjenisvoucher" placeholder="Idjenisvoucher" value="<?php echo $idjenisvoucher; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Aktifjmlrekomendasi <?php echo form_error('aktifjmlrekomendasi') ?></label>
            <input type="text" class="form-control" name="aktifjmlrekomendasi" id="aktifjmlrekomendasi" placeholder="Aktifjmlrekomendasi" value="<?php echo $aktifjmlrekomendasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Dayvoucher <?php echo form_error('dayvoucher') ?></label>
            <input type="text" class="form-control" name="dayvoucher" id="dayvoucher" placeholder="Dayvoucher" value="<?php echo $dayvoucher; ?>" />
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('voucher') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>