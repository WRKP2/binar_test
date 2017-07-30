<?php 

$string = "<h2 style=\"margin-top:0px\">".ucfirst($table_name)." Read</h2>
        <table class=\"table table-bordered table-striped table-hover\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}

$string .= "\n\t</table>";

$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\" style=\"float: center;\">Cancel</a>";

$string .= "\n";
$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>