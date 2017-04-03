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
        <h2 style="margin-top:0px">Transaksi List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('transaksi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('transaksi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('transaksi'); ?>" class="btn btn-default">Reset</a>
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
		<th>Idbooking</th>
		<th>Tglbooking</th>
		<th>Tglbatalbooking</th>
		<th>Keteranganbatal</th>
		<th>Harganormal</th>
		<th>Hargadiscount</th>
		<th>Idvoucher</th>
		<th>Idmember</th>
		<th>Idpegawai</th>
		<th>Spesialrequest</th>
		<th>Tglupdate</th>
		<th>Idjenisbayar</th>
		<th>Tglbayar</th>
		<th>Hargadibayar</th>
		<th>Isfinal</th>
		<th>Nominalvoucher</th>
		<th>Action</th>
            </tr><?php
            foreach ($transaksi_data as $transaksi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $transaksi->idbooking ?></td>
			<td><?php echo $transaksi->tglbooking ?></td>
			<td><?php echo $transaksi->tglbatalbooking ?></td>
			<td><?php echo $transaksi->keteranganbatal ?></td>
			<td><?php echo $transaksi->harganormal ?></td>
			<td><?php echo $transaksi->hargadiscount ?></td>
			<td><?php echo $transaksi->idvoucher ?></td>
			<td><?php echo $transaksi->idmember ?></td>
			<td><?php echo $transaksi->idpegawai ?></td>
			<td><?php echo $transaksi->spesialrequest ?></td>
			<td><?php echo $transaksi->tglupdate ?></td>
			<td><?php echo $transaksi->idjenisbayar ?></td>
			<td><?php echo $transaksi->tglbayar ?></td>
			<td><?php echo $transaksi->hargadibayar ?></td>
			<td><?php echo $transaksi->isfinal ?></td>
			<td><?php echo $transaksi->nominalvoucher ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('transaksi/read/'.$transaksi->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('transaksi/update/'.$transaksi->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('transaksi/delete/'.$transaksi->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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