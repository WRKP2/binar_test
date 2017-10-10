<h2 style="margin-top:0px">Tabel_menu List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('tabel_menu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('tabel_menu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="tabel_menu"value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tabel_menu'); ?>" class="btn btn-default">Reset</a>
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
		<th>Judul Menu</th>
		<th>Link</th>
		<th>Icon</th>
		<th>Is Main Menu</th>
		<th>Action</th>
            </tr><?php
            foreach ($tabel_menu_data as $tabel_menu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tabel_menu->judul_menu ?></td>
			<td><?php echo $tabel_menu->link ?></td>
			<td><?php echo $tabel_menu->icon ?></td>
			<td><?php echo $tabel_menu->is_main_menu ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('tabel_menu/read/'.$tabel_menu->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('tabel_menu/update/'.$tabel_menu->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('tabel_menu/delete/'.$tabel_menu->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
   