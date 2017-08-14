<h2 style="margin-top:0px">Data List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('data/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('data/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="data"value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('data'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID</th>
		<th>Nama</th>
		<th>Asal</th>
		<th>Gabung</th>
		<th>Action</th>
            </tr><?php
            foreach ($data_data as $data)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data->ID ?></td>
			<td><?php echo $data->nama ?></td>
			<td><?php echo $data->asal ?></td>
			<td><?php echo $data->gabung ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data/read/'.$data->no),'Read'); 
				echo ' | '; 
				echo anchor(site_url('data/update/'.$data->no),'Update'); 
				echo ' | '; 
				echo anchor(site_url('data/delete/'.$data->no),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
   