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
        <h2 style="margin-top:0px">Detailproduk List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('detailproduk/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('detailproduk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('detailproduk'); ?>" class="btn btn-default">Reset</a>
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
		<th>Idproduk</th>
		<th>Idkategoriproduk</th>
		<th>Juduldetailproduk</th>
		<th>Diskripsiproduk</th>
		<th>Rate</th>
		<th>Ratediscount</th>
		<th>Rancode</th>
		<th>Tglinsert</th>
		<th>Tglupdate</th>
		<th>Idpegawai</th>
		<th>Kapasitas</th>
		<th>Standartpemakaian</th>
		<th>Standart</th>
		<th>Idsatuan</th>
		<th>Isfavorit</th>
		<th>Idmember</th>
		<th>Action</th>
            </tr><?php
            foreach ($detailproduk_data as $detailproduk)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $detailproduk->idproduk ?></td>
			<td><?php echo $detailproduk->idkategoriproduk ?></td>
			<td><?php echo $detailproduk->juduldetailproduk ?></td>
			<td><?php echo $detailproduk->diskripsiproduk ?></td>
			<td><?php echo $detailproduk->rate ?></td>
			<td><?php echo $detailproduk->ratediscount ?></td>
			<td><?php echo $detailproduk->rancode ?></td>
			<td><?php echo $detailproduk->tglinsert ?></td>
			<td><?php echo $detailproduk->tglupdate ?></td>
			<td><?php echo $detailproduk->idpegawai ?></td>
			<td><?php echo $detailproduk->kapasitas ?></td>
			<td><?php echo $detailproduk->standartpemakaian ?></td>
			<td><?php echo $detailproduk->standart ?></td>
			<td><?php echo $detailproduk->idsatuan ?></td>
			<td><?php echo $detailproduk->isfavorit ?></td>
			<td><?php echo $detailproduk->idmember ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('detailproduk/read/'.$detailproduk->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('detailproduk/update/'.$detailproduk->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('detailproduk/delete/'.$detailproduk->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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