<?php

$string = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<LinearLayout xmlns:android=\"http://schemas.android.com/apk/res/android\"
    xmlns:tools=\"http://schemas.android.com/tools\"
    android:layout_width=\"match_parent\"
    android:layout_height=\"match_parent\"
    android:paddingBottom=\"@dimen/activity_vertical_margin\"
    android:paddingLeft=\"@dimen/activity_horizontal_margin\"
    android:paddingRight=\"@dimen/activity_horizontal_margin\"
    android:paddingTop=\"@dimen/activity_vertical_margin\"
    android:orientation=\"vertical\"
    tools:context=\".". $c_url . "/" .$filejava_layout_list."\">";

$string .= "\n\n <android.support.v7.widget.RecyclerView
            android:id=\"@+id/rv_recycler\"
            android:layout_width=\"match_parent\"
            android:layout_height=\"wrap_content\">
        </android.support.v7.widget.RecyclerView>";

$string .= "\n\n <Button
        android:layout_width=\"match_parent\"
        android:layout_height=\"wrap_content\"
        android:text=\"Tambah\"
        android:id=\"@+id/input\"/>";

$string .= "\n\n </LinearLayout>";

//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_java_layout_list = createFile($string, $target."java/" . $c_url . "/" . $filejava_layout_list);
?>