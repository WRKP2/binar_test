<?php

$string = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<RelativeLayout xmlns:android=\"http://schemas.android.com/apk/res/android\"
    xmlns:tools=\"http://schemas.android.com/tools\"
    android:layout_width=\"match_parent\"
    android:layout_height=\"match_parent\"
    android:paddingBottom=\"@dimen/activity_vertical_margin\"
    android:paddingLeft=\"@dimen/activity_horizontal_margin\"
    android:paddingRight=\"@dimen/activity_horizontal_margin\"
    android:paddingTop=\"@dimen/activity_vertical_margin\"
    tools:context=\"." . $c_url . "/" . $filejava_layout . "\">";

$string .= "\n\n <ScrollView
        android:layout_width=\"match_parent\"
        android:layout_height=\"match_parent\">\"";

$string .= "\n\n <LinearLayout
            android:id=\"@+id/" . $c . "_form\"
            android:layout_width=\"match_parent\"
            android:layout_height=\"wrap_content\"
            android:orientation=\"vertical\">";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= " \n\n <EditText
            android:layout_width=\"match_parent\"
            android:layout_height=\"wrap_content\"
            android:hint=\"Isi " . $row['column_name'] . "\"
            android:id=\"@+id/ed" . $row['column_name'] . "\" />";
    }
}

$string .= "\n\n <Button
        android:layout_width=\"match_parent\"
        android:layout_height=\"wrap_content\"
        android:text=\"Submite\"
        android:id=\"@+id/btnsimpan\"/>";

$string .= "\n\n </LinearLayout>
    </ScrollView>
    </RelativeLayout>";

//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_java_layout_isi = createFile($string, $target . "java/" . $c_url . "/" . $filejava_layout_isi);
?>