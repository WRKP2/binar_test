<?php 

$string = "<!doctype html>
<html>
    <head>
        <title>".ucfirst($table_name)." List</title>
        
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
        
        <!-- AUTOCOMPLETE-->
        <link href=\"<?php echo base_url('assets/jquery-ui-1.12.1.custom/jquery-ui.css') ?>\" rel=\"stylesheet\" type=\"text/css\" />
        <script src=\"<?php echo base_url('assets/js/jquery-3.2.1.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/jquery-ui-1.12.1.custom/jquery-ui.js') ?>\"></script>

    </head>
    <body>

    <!-- ADMINLTE-->
    <?php
        \$this->load->view('template/topbar');
        \$this->load->view('template/sidebar');
    ?>
    <div style=\"padding:15px\">
    <!-- ADMINLTE-->

        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." List</h2>
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <?php echo anchor(site_url('".$c_url."/create'),'Create', 'class=\"btn btn-primary\"'); ?>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-1 text-right\">
            </div>
            <div class=\"col-md-3 text-right\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control\" name=\"q\" id=\"".$table_name."\"value=\"<?php echo \$q; ?>\">
                        <span class=\"input-group-btn\">
                            <?php 
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-default\">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class=\"btn btn-primary\" type=\"submit\">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered table-striped table-hover\" style=\"margin-bottom: 10px\">
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Read'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Update'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-primary\">Total Record : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>

    <!-- ADMINLTE-->
    </div>

        <?php
            \$this->load->view('template/js');
            \$this->load->view('". $c_url ."/".$v_autocomplete."');

        ?>
    <!-- ADMINLTE-->

    </body>
</html>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>