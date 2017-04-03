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
        <h2 style="margin-top:0px">Produkkategori List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('produkkategori/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('produkkategori/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('produkkategori'); ?>" class="btn btn-default">Reset</a>
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
		<th>Idkategori</th>
		<th>Tglinsert</th>
		<th>Idpegawai</th>
		<th>Iddetailproduk</th>
		<th>Action</th>
            </tr><?php
            foreach ($produkkategori_data as $produkkategori)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $produkkategori->idproduk ?></td>
			<td><?php echo $produkkategori->idkategori ?></td>
			<td><?php echo $produkkategori->tglinsert ?></td>
			<td><?php echo $produkkategori->idpegawai ?></td>
			<td><?php echo $produkkategori->iddetailproduk ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('produkkategori/read/'.$produkkategori->idx),'Read'); 
				echo ' | '; 
				echo anchor(site_url('produkkategori/update/'.$produkkategori->idx),'Update'); 
				echo ' | '; 
				echo anchor(site_url('produkkategori/delete/'.$produkkategori->idx),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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