<h2 style="margin-top:0px">Order_menu List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('order_menu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('order_menu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="order_menu"value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('order_menu'); ?>" class="btn btn-default">Reset</a>
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
		<th>ID RESTO</th>
		<th>ID MENU</th>
		<th>ID USERAPP</th>
		<th>JUMLAH</th>
		<th>ORDER DATE</th>
		<th>STATUS</th>
		<th>ALAMAT PENGIRIMAN</th>
		<th>Action</th>
            </tr><?php
            foreach ($order_menu_data as $order_menu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $order_menu->ID_RESTO ?></td>
			<td><?php echo $order_menu->ID_MENU ?></td>
			<td><?php echo $order_menu->ID_USERAPP ?></td>
			<td><?php echo $order_menu->JUMLAH ?></td>
			<td><?php echo $order_menu->ORDER_DATE ?></td>
			<td><?php echo $order_menu->STATUS ?></td>
			<td><?php echo $order_menu->ALAMAT_PENGIRIMAN ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('order_menu/read/'.$order_menu->ID),'Read'); 
				echo ' | '; 
				echo anchor(site_url('order_menu/update/'.$order_menu->ID),'Update'); 
				echo ' | '; 
				echo anchor(site_url('order_menu/delete/'.$order_menu->ID),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
   