<?php

$string = ""
        . "package ".$packageAndroid.".".$c_url.";"
        . "\npublic class " . $c . "CLASS
{";
foreach ($all as $row) {
    $string .= "\nString " . $row['column_name'] . ";";
}

foreach ($all as $row) {
    $string .= "\n\npublic String get" . ucfirst($row['column_name']) . "(){ return " . $row['column_name'] . ";}";
    $string .= "\n\npublic void set" . ucfirst($row['column_name']) . "(String " . $row['column_name'] . "){ "
            . "this." . $row['column_name'] . " = " . $row['column_name'] . ";}";
}

$string .= "\n\n}\n\n";




//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_view_form = createFile($string, $target."java/" . $c_url . "/" . $filejava_file_dataclass);
?>