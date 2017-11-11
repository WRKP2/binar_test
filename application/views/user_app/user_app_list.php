<h2 style="margin-top:0px">User_app List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('user_app/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('user_app/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="user_app"value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('user_app'); ?>" class="btn btn-default">Reset</a>
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
		<th>NAMA</th>
		<th>ALAMAT</th>
		<th>EMAIL</th>
		<th>PASWORD</th>
		<th>Action</th>
            </tr><?php
            foreach ($user_app_data as $user_app)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $user_app->NAMA ?></td>
			<td><?php echo $user_app->ALAMAT ?></td>
			<td><?php echo $user_app->EMAIL ?></td>
			<td><?php echo $user_app->PASWORD ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user_app/read/'.$user_app->ID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('user_app/update/'.$user_app->ID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('user_app/delete/'.$user_app->ID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
   