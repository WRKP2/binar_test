<!doctype html>
<html>
    <head>
        <title>Users Read</title>
        
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

    </head>
    <body>

<!-- ADMINLTE-->
    <?php
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
    ?>
    <div style="padding:15px">
<!-- ADMINLTE-->

        <h2 style="margin-top:0px">Users Read</h2>
        <table class="table table-bordered table-striped table-hover">
	    <tr><td>Ip Address</td><td><?php echo $ip_address; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Salt</td><td><?php echo $salt; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Activation Code</td><td><?php echo $activation_code; ?></td></tr>
	    <tr><td>Forgotten Password Code</td><td><?php echo $forgotten_password_code; ?></td></tr>
	    <tr><td>Forgotten Password Time</td><td><?php echo $forgotten_password_time; ?></td></tr>
	    <tr><td>Remember Code</td><td><?php echo $remember_code; ?></td></tr>
	    <tr><td>Created On</td><td><?php echo $created_on; ?></td></tr>
	    <tr><td>Last Login</td><td><?php echo $last_login; ?></td></tr>
	    <tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
	    <tr><td>Company</td><td><?php echo $company; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	</table>
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default" style="float: center;">Cancel</a>

<!-- ADMINLTE-->
    </div>

        <?php
            $this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

        </body>
</html>