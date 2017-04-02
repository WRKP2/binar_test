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
        <h2 style="margin-top:0px">Membervoucher List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('membervoucher/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('membervoucher/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('membervoucher'); ?>" class="btn btn-default">Reset</a>
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
		<th>Idmember</th>
		<th>Idvoucher</th>
		<th>Idproduk</th>
		<th>Tglpakai</th>
		<th>Isdipakai</th>
		<th>Idjenisvoucher</th>
		<th>Idreveral</th>
		<th>Isdipakaireveral</th>
		<th>Action</th>
            </tr><?php
            foreach ($membervoucher_data as $membervoucher)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $membervoucher->idmember ?></td>
			<td><?php echo $membervoucher->idvoucher ?></td>
			<td><?php echo $membervoucher->idproduk ?></td>
			<td><?php echo $membervoucher->tglpakai ?></td>
			<td><?php echo $membervoucher->isdipakai ?></td>
			<td><?php echo $membervoucher->idjenisvoucher ?></td>
			<td><?php echo $membervoucher->idreveral ?></td>
			<td><?php echo $membervoucher->isdipakaireveral ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('membervoucher/read/'.$membervoucher->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('membervoucher/update/'.$membervoucher->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('membervoucher/delete/'.$membervoucher->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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