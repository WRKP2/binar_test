<!doctype html>
<html>
    <head>
        <title>Tabel_menu List</title>
        
        <!-- ADMINLTE-->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- ADMINLTE-->
        
        <!-- AUTOCOMPLETE-->
        <link href="<?php echo base_url('assets/jquery-ui-1.12.1.custom/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.js') ?>"></script>
        <script src="<?php echo base_url('assets/jquery-ui-1.12.1.custom/jquery-ui.js') ?>"></script>

    </head>
    <body>

    <!-- ADMINLTE-->
    <?php
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
    ?>
    <div style="padding:15px">
    <!-- ADMINLTE-->

        <h2 style="margin-top:0px">Tabel_menu List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('getmenu/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('getmenu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="tabel_menu"value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('getmenu'); ?>" class="btn btn-default">Reset</a>
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
            foreach ($getmenu_data as $getmenu)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $getmenu->judul_menu ?></td>
			<td><?php echo $getmenu->link ?></td>
			<td><?php echo $getmenu->icon ?></td>
			<td><?php echo $getmenu->is_main_menu ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('getmenu/read/'.$getmenu->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('getmenu/update/'.$getmenu->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('getmenu/delete/'.$getmenu->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

    <!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
            $this->load->view('getmenu/tabel_menu_autocomplete');

        ?>
    <!-- ADMINLTE-->

    </body>
</html>