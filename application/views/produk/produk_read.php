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
        <h2 style="margin-top:0px">Produk Read</h2>
        <table class="table">
	    <tr><td>JudulProduk</td><td><?php echo $JudulProduk; ?></td></tr>
	    <tr><td>IdKategoriProduk</td><td><?php echo $idKategoriProduk; ?></td></tr>
	    <tr><td>Idmember</td><td><?php echo $idmember; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $Keterangan; ?></td></tr>
	    <tr><td>Phonekontak</td><td><?php echo $phonekontak; ?></td></tr>
	    <tr><td>NamaKontak</td><td><?php echo $NamaKontak; ?></td></tr>
	    <tr><td>DiskripsiProduk</td><td><?php echo $DiskripsiProduk; ?></td></tr>
	    <tr><td>Mapaddress</td><td><?php echo $mapaddress; ?></td></tr>
	    <tr><td>Buka</td><td><?php echo $buka; ?></td></tr>
	    <tr><td>Tutup</td><td><?php echo $tutup; ?></td></tr>
	    <tr><td>Rate</td><td><?php echo $rate; ?></td></tr>
	    <tr><td>Ratediscount</td><td><?php echo $ratediscount; ?></td></tr>
	    <tr><td>Rancode</td><td><?php echo $rancode; ?></td></tr>
	    <tr><td>Tglinsert</td><td><?php echo $tglinsert; ?></td></tr>
	    <tr><td>Tglupdate</td><td><?php echo $tglupdate; ?></td></tr>
	    <tr><td>Idpegawai</td><td><?php echo $idpegawai; ?></td></tr>
	    <tr><td>Kapasitas</td><td><?php echo $kapasitas; ?></td></tr>
	    <tr><td>Standartpemakaian</td><td><?php echo $standartpemakaian; ?></td></tr>
	    <tr><td>Idsatuan</td><td><?php echo $idsatuan; ?></td></tr>
	    <tr><td>Token</td><td><?php echo $Token; ?></td></tr>
	    <tr><td>City</td><td><?php echo $city; ?></td></tr>
	    <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
	    <tr><td>State</td><td><?php echo $state; ?></td></tr>
	    <tr><td>Isberbayar</td><td><?php echo $isberbayar; ?></td></tr>
	    <tr><td>Tglterakhirbayar</td><td><?php echo $tglterakhirbayar; ?></td></tr>
	    <tr><td>Star</td><td><?php echo $star; ?></td></tr>
	    <tr><td>Isverifikasi</td><td><?php echo $isverifikasi; ?></td></tr>
	    <tr><td>Tglverifikasi</td><td><?php echo $tglverifikasi; ?></td></tr>
	    <tr><td>Idpemverifikasi</td><td><?php echo $idpemverifikasi; ?></td></tr>
	    <tr><td>Isaktif</td><td><?php echo $isaktif; ?></td></tr>
	    <tr><td>Lskategori</td><td><?php echo $lskategori; ?></td></tr>
	    <tr><td>Menutext</td><td><?php echo $menutext; ?></td></tr>
	    <tr><td>Kategoritext</td><td><?php echo $kategoritext; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>