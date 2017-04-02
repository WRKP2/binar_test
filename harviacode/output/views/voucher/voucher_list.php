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
        <h2 style="margin-top:0px">Voucher List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('voucher/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('voucher/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('voucher'); ?>" class="btn btn-default">Reset</a>
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
		<th>Voucher</th>
		<th>Nominal</th>
		<th>Prosentase</th>
		<th>Tglberlakudari</th>
		<th>Tglberlakusampai</th>
		<th>Idmember</th>
		<th>Isterpakai</th>
		<th>Tglpakai</th>
		<th>Linkimage</th>
		<th>Idproduk</th>
		<th>Jumlahmaxpengguna</th>
		<th>Penjelasan</th>
		<th>Idjenisvoucher</th>
		<th>Aktifjmlrekomendasi</th>
		<th>Dayvoucher</th>
		<th>Action</th>
            </tr><?php
            foreach ($voucher_data as $voucher)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $voucher->voucher ?></td>
			<td><?php echo $voucher->nominal ?></td>
			<td><?php echo $voucher->prosentase ?></td>
			<td><?php echo $voucher->tglberlakudari ?></td>
			<td><?php echo $voucher->tglberlakusampai ?></td>
			<td><?php echo $voucher->idmember ?></td>
			<td><?php echo $voucher->isterpakai ?></td>
			<td><?php echo $voucher->tglpakai ?></td>
			<td><?php echo $voucher->linkimage ?></td>
			<td><?php echo $voucher->idproduk ?></td>
			<td><?php echo $voucher->jumlahmaxpengguna ?></td>
			<td><?php echo $voucher->penjelasan ?></td>
			<td><?php echo $voucher->idjenisvoucher ?></td>
			<td><?php echo $voucher->aktifjmlrekomendasi ?></td>
			<td><?php echo $voucher->dayvoucher ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('voucher/read/'.$voucher->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('voucher/update/'.$voucher->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('voucher/delete/'.$voucher->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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