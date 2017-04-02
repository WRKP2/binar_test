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
        <h2 style="margin-top:0px">Produkpromo List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('produkpromo/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('produkpromo/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('produkpromo'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tglawalpromo</th>
		<th>Tglakhirpromo</th>
		<th>Isaktif</th>
		<th>Idmemberpengaju</th>
		<th>Isbayarpromo</th>
		<th>Tglbayarpromo</th>
		<th>Ketpromo</th>
		<th>Tglinsert</th>
		<th>Tglupdate</th>
		<th>Idpegawai</th>
		<th>Action</th>
            </tr><?php
            foreach ($produkpromo_data as $produkpromo)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $produkpromo->idproduk ?></td>
			<td><?php echo $produkpromo->tglawalpromo ?></td>
			<td><?php echo $produkpromo->tglakhirpromo ?></td>
			<td><?php echo $produkpromo->isaktif ?></td>
			<td><?php echo $produkpromo->idmemberpengaju ?></td>
			<td><?php echo $produkpromo->isbayarpromo ?></td>
			<td><?php echo $produkpromo->tglbayarpromo ?></td>
			<td><?php echo $produkpromo->ketpromo ?></td>
			<td><?php echo $produkpromo->tglinsert ?></td>
			<td><?php echo $produkpromo->tglupdate ?></td>
			<td><?php echo $produkpromo->idpegawai ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('produkpromo/read/'.$produkpromo->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('produkpromo/update/'.$produkpromo->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('produkpromo/delete/'.$produkpromo->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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