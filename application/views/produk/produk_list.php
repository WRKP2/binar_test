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
        <h2 style="margin-top:0px">Produk List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('produk/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('produk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('produk'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>JudulProduk</th>
		<th>IdKategoriProduk</th>
		<th>Idmember</th>
		<th>Keterangan</th>
		<th>Phonekontak</th>
		<th>NamaKontak</th>
		<th>DiskripsiProduk</th>
		<th>Mapaddress</th>
		<th>Buka</th>
		<th>Tutup</th>
		<th>Rate</th>
		<th>Ratediscount</th>
		<th>Rancode</th>
		<th>Tglinsert</th>
		<th>Tglupdate</th>
		<th>Idpegawai</th>
		<th>Kapasitas</th>
		<th>Standartpemakaian</th>
		<th>Idsatuan</th>
		<th>Token</th>
		<th>City</th>
		<th>Kabupaten</th>
		<th>State</th>
		<th>Isberbayar</th>
		<th>Tglterakhirbayar</th>
		<th>Star</th>
		<th>Isverifikasi</th>
		<th>Tglverifikasi</th>
		<th>Idpemverifikasi</th>
		<th>Isaktif</th>
		<th>Lskategori</th>
		<th>Menutext</th>
		<th>Kategoritext</th>
		<th>Action</th>
            </tr><?php
            foreach ($produk_data as $produk)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $produk->JudulProduk ?></td>
			<td><?php echo $produk->idKategoriProduk ?></td>
			<td><?php echo $produk->idmember ?></td>
			<td><?php echo $produk->Keterangan ?></td>
			<td><?php echo $produk->phonekontak ?></td>
			<td><?php echo $produk->NamaKontak ?></td>
			<td><?php echo $produk->DiskripsiProduk ?></td>
			<td><?php echo $produk->mapaddress ?></td>
			<td><?php echo $produk->buka ?></td>
			<td><?php echo $produk->tutup ?></td>
			<td><?php echo $produk->rate ?></td>
			<td><?php echo $produk->ratediscount ?></td>
			<td><?php echo $produk->rancode ?></td>
			<td><?php echo $produk->tglinsert ?></td>
			<td><?php echo $produk->tglupdate ?></td>
			<td><?php echo $produk->idpegawai ?></td>
			<td><?php echo $produk->kapasitas ?></td>
			<td><?php echo $produk->standartpemakaian ?></td>
			<td><?php echo $produk->idsatuan ?></td>
			<td><?php echo $produk->Token ?></td>
			<td><?php echo $produk->city ?></td>
			<td><?php echo $produk->kabupaten ?></td>
			<td><?php echo $produk->state ?></td>
			<td><?php echo $produk->isberbayar ?></td>
			<td><?php echo $produk->tglterakhirbayar ?></td>
			<td><?php echo $produk->star ?></td>
			<td><?php echo $produk->isverifikasi ?></td>
			<td><?php echo $produk->tglverifikasi ?></td>
			<td><?php echo $produk->idpemverifikasi ?></td>
			<td><?php echo $produk->isaktif ?></td>
			<td><?php echo $produk->lskategori ?></td>
			<td><?php echo $produk->menutext ?></td>
			<td><?php echo $produk->kategoritext ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('produk/read/'.$produk->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('produk/update/'.$produk->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('produk/delete/'.$produk->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>