<!doctype html>
<html>
    <head>
        <title><?php
            echo $this->config->item('site_title');
            if (isset($title))
                echo " " . $this->config->item('site_title_delimiter') . " " . $title;
            ?></title>

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

        <!--CSS-->
        <?php if (isset($css_file)){ $help="assets/css/".$css_file.".css";?> 
        
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link href="<?php echo base_url($help) ?>" rel="stylesheet" type="text/css" />
       
        <?php }?>

        <!-- AUTOCOMPLETE-->
        <link href="<?php echo base_url('assets/jquery-ui-1.12.1.custom/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.js') ?>"></script>
        <script src="<?php echo base_url('assets/jquery-ui-1.12.1.custom/jquery-ui.js') ?>"></script>
        
        <!--Ajax-->
        <?php if (isset($js)){$help="assets/ajax/".$js.".js"; ?>
        <script type="text/javascript"> var baseURL = "<?php echo base_url(); ?>";</script>
        <script script language="javascript" type="text/javascript" src="<?php echo base_url($help) ?>"></script>
        <?php }?>

    </head>
    <body class="skin-blue" <?php
    if (isset($onload)) {
        echo "onload=$onload";
    }
    ?>>
        <!-- ADMINLTE-->
        <?php
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        ?>
        <!-- ADMINLTE-->

        <div style="padding:15px">

            <div id="content">
                <?php echo $content; ?>
            </div> 

        </div>

        <!-- ADMINLTE-->
        <?php
        $this->load->view('template/js');
//        $this->load->view('user/user_autocomplete');
        ?>
        <!-- ADMINLTE-->

    </body>
</html>