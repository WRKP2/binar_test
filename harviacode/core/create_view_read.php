<?php 

$string = "<!doctype html>
<html>
    <head>
        <title>".ucfirst($table_name)." Read</title>
        
        <!-- ADMINLTE-->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href=\"<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Font Awesome Icons -->
        <link href=\"<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Ionicons -->
        <link href=\"<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Theme style -->
        <link href=\"<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href=\"<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- ADMINLTE-->

    </head>
    <body>

<!-- ADMINLTE-->
    <?php
        \$this->load->view('template/topbar');
        \$this->load->view('template/sidebar');
    ?>
    <div style=\"padding:15px\">
<!-- ADMINLTE-->

        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <table class=\"table table-bordered table-striped table-hover\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}

$string .= "\n\t</table>";

$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\" style=\"float: center;\">Cancel</a>";

$string .= "\n
<!-- ADMINLTE-->
    </div>

        <?php
            \$this->load->view('template/js');
        ?>
<!-- ADMINLTE-->

        </body>
</html>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>