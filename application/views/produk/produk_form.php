<!doctype html>
<html>
    <head>
        <title>Produk Create</title>
        
        <!-- ADMINLTE-->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- ADMINLTE-->

    </head>
    <body>

<!-- ADMINLTE-->
     <?php
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
    ?>
    <div style="padding:15px">
<!-- ADMINLTE-->

        <h2 style="margin-top:0px">Produk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">JudulProduk <?php echo form_error('JudulProduk') ?></label>
            <input type="text" class="form-control" name="JudulProduk" id="JudulProduk" placeholder="JudulProduk" value="<?php echo $JudulProduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdKategoriProduk <?php echo form_error('idKategoriProduk') ?></label>
            <input type="text" class="form-control" name="idKategoriProduk" id="idKategoriProduk" placeholder="IdKategoriProduk" value="<?php echo $idKategoriProduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idmember <?php echo form_error('idmember') ?></label>
            <input type="text" class="form-control" name="idmember" id="idmember" placeholder="Idmember" value="<?php echo $idmember; ?>" />
        </div>
	    <div class="form-group">
            <label for="Keterangan">Keterangan <?php echo form_error('Keterangan') ?></label>
            <textarea class="form-control" rows="3" name="Keterangan" id="Keterangan" placeholder="Keterangan"><?php echo $Keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Phonekontak <?php echo form_error('phonekontak') ?></label>
            <input type="text" class="form-control" name="phonekontak" id="phonekontak" placeholder="Phonekontak" value="<?php echo $phonekontak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaKontak <?php echo form_error('NamaKontak') ?></label>
            <input type="text" class="form-control" name="NamaKontak" id="NamaKontak" placeholder="NamaKontak" value="<?php echo $NamaKontak; ?>" />
        </div>
	    <div class="form-group">
            <label for="DiskripsiProduk">DiskripsiProduk <?php echo form_error('DiskripsiProduk') ?></label>
            <textarea class="form-control" rows="3" name="DiskripsiProduk" id="DiskripsiProduk" placeholder="DiskripsiProduk"><?php echo $DiskripsiProduk; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Mapaddress <?php echo form_error('mapaddress') ?></label>
            <input type="text" class="form-control" name="mapaddress" id="mapaddress" placeholder="Mapaddress" value="<?php echo $mapaddress; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Buka <?php echo form_error('buka') ?></label>
            <input type="text" class="form-control" name="buka" id="buka" placeholder="Buka" value="<?php echo $buka; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Tutup <?php echo form_error('tutup') ?></label>
            <input type="text" class="form-control" name="tutup" id="tutup" placeholder="Tutup" value="<?php echo $tutup; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Rate <?php echo form_error('rate') ?></label>
            <input type="text" class="form-control" name="rate" id="rate" placeholder="Rate" value="<?php echo $rate; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ratediscount <?php echo form_error('ratediscount') ?></label>
            <input type="text" class="form-control" name="ratediscount" id="ratediscount" placeholder="Ratediscount" value="<?php echo $ratediscount; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rancode <?php echo form_error('rancode') ?></label>
            <input type="text" class="form-control" name="rancode" id="rancode" placeholder="Rancode" value="<?php echo $rancode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglinsert <?php echo form_error('tglinsert') ?></label>
            <input type="text" class="form-control" name="tglinsert" id="tglinsert" placeholder="Tglinsert" value="<?php echo $tglinsert; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglupdate <?php echo form_error('tglupdate') ?></label>
            <input type="text" class="form-control" name="tglupdate" id="tglupdate" placeholder="Tglupdate" value="<?php echo $tglupdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpegawai <?php echo form_error('idpegawai') ?></label>
            <input type="text" class="form-control" name="idpegawai" id="idpegawai" placeholder="Idpegawai" value="<?php echo $idpegawai; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kapasitas <?php echo form_error('kapasitas') ?></label>
            <input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Standartpemakaian <?php echo form_error('standartpemakaian') ?></label>
            <input type="text" class="form-control" name="standartpemakaian" id="standartpemakaian" placeholder="Standartpemakaian" value="<?php echo $standartpemakaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idsatuan <?php echo form_error('idsatuan') ?></label>
            <input type="text" class="form-control" name="idsatuan" id="idsatuan" placeholder="Idsatuan" value="<?php echo $idsatuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Token <?php echo form_error('Token') ?></label>
            <input type="text" class="form-control" name="Token" id="Token" placeholder="Token" value="<?php echo $Token; ?>" />
        </div>
	    <div class="form-group">
            <label for="city">City <?php echo form_error('city') ?></label>
            <textarea class="form-control" rows="3" name="city" id="city" placeholder="City"><?php echo $city; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="kabupaten">Kabupaten <?php echo form_error('kabupaten') ?></label>
            <textarea class="form-control" rows="3" name="kabupaten" id="kabupaten" placeholder="Kabupaten"><?php echo $kabupaten; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="state">State <?php echo form_error('state') ?></label>
            <textarea class="form-control" rows="3" name="state" id="state" placeholder="State"><?php echo $state; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="enum">Isberbayar <?php echo form_error('isberbayar') ?></label>
            <input type="text" class="form-control" name="isberbayar" id="isberbayar" placeholder="Isberbayar" value="<?php echo $isberbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tglterakhirbayar <?php echo form_error('tglterakhirbayar') ?></label>
            <input type="text" class="form-control" name="tglterakhirbayar" id="tglterakhirbayar" placeholder="Tglterakhirbayar" value="<?php echo $tglterakhirbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Star <?php echo form_error('star') ?></label>
            <input type="text" class="form-control" name="star" id="star" placeholder="Star" value="<?php echo $star; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isverifikasi <?php echo form_error('isverifikasi') ?></label>
            <input type="text" class="form-control" name="isverifikasi" id="isverifikasi" placeholder="Isverifikasi" value="<?php echo $isverifikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tglverifikasi <?php echo form_error('tglverifikasi') ?></label>
            <input type="text" class="form-control" name="tglverifikasi" id="tglverifikasi" placeholder="Tglverifikasi" value="<?php echo $tglverifikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idpemverifikasi <?php echo form_error('idpemverifikasi') ?></label>
            <input type="text" class="form-control" name="idpemverifikasi" id="idpemverifikasi" placeholder="Idpemverifikasi" value="<?php echo $idpemverifikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Isaktif <?php echo form_error('isaktif') ?></label>
            <input type="text" class="form-control" name="isaktif" id="isaktif" placeholder="Isaktif" value="<?php echo $isaktif; ?>" />
        </div>
	    <div class="form-group">
            <label for="lskategori">Lskategori <?php echo form_error('lskategori') ?></label>
            <textarea class="form-control" rows="3" name="lskategori" id="lskategori" placeholder="Lskategori"><?php echo $lskategori; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="menutext">Menutext <?php echo form_error('menutext') ?></label>
            <textarea class="form-control" rows="3" name="menutext" id="menutext" placeholder="Menutext"><?php echo $menutext; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="kategoritext">Kategoritext <?php echo form_error('kategoritext') ?></label>
            <textarea class="form-control" rows="3" name="kategoritext" id="kategoritext" placeholder="Kategoritext"><?php echo $kategoritext; ?></textarea>
        </div>
	    <input type="hidden" name="idx" value="<?php echo $idx; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- ADMINLTE-->
</div>
        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

    </body>
</html>