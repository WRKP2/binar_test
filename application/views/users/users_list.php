<!doctype html>
<html>
    <head>
        <title>Users List</title>
        
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

        <h2 style="margin-top:0px">Users List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('users/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="users"value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('users'); ?>" class="btn btn-default">Reset</a>
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
		<th>Ip Address</th>
		<th>Username</th>
		<th>Password</th>
		<th>Salt</th>
		<th>Email</th>
		<th>Activation Code</th>
		<th>Forgotten Password Code</th>
		<th>Forgotten Password Time</th>
		<th>Remember Code</th>
		<th>Created On</th>
		<th>Last Login</th>
		<th>Active</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Company</th>
		<th>Phone</th>
		<th>Action</th>
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $users->ip_address ?></td>
			<td><?php echo $users->username ?></td>
			<td><?php echo $users->password ?></td>
			<td><?php echo $users->salt ?></td>
			<td><?php echo $users->email ?></td>
			<td><?php echo $users->activation_code ?></td>
			<td><?php echo $users->forgotten_password_code ?></td>
			<td><?php echo $users->forgotten_password_time ?></td>
			<td><?php echo $users->remember_code ?></td>
			<td><?php echo $users->created_on ?></td>
			<td><?php echo $users->last_login ?></td>
			<td><?php echo $users->active ?></td>
			<td><?php echo $users->first_name ?></td>
			<td><?php echo $users->last_name ?></td>
			<td><?php echo $users->company ?></td>
			<td><?php echo $users->phone ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('users/read/'.$users->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('users/update/'.$users->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('users/delete/'.$users->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('users/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('users/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

    <!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
            $this->load->view('users/users_autocomplete');

        ?>
    <!-- ADMINLTE-->

    </body>
</html>