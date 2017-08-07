<?php

$string = "public class " . $c . "CLASS
{";
foreach ($all as $row) {
    $string .= "\nString " . $row['column_name'] . ";";
}

foreach ($all as $row) {
    $string .= "\n\npublic String get" . $row['column_name'] . "(){ return " . $row['column_name'] . "};";
    $string .= "\n\npublic void set" . $row['column_name'] . "(String " . $row['column_name'] . "){ "
            . "this." . $row['column_name'] . " = " . $row['column_name'] . "};";
}

$string .= "\n\n}\n\n";




$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
?>