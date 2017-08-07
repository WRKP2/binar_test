<?php

$string = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<RelativeLayout xmlns:android=\"http://schemas.android.com/apk/res/android\"
    android:layout_width=\"match_parent\"
    android:layout_height=\"wrap_content\"
    xmlns:app=\"http://schemas.android.com/apk/res-auto\">

    <android.support.v7.widget.CardView
        android:id=\"@+id/card_view\"
        android:layout_width=\"match_parent\"
        android:layout_height=\"wrap_content\"
        app:cardCornerRadius=\"4dp\"
        app:elevation=\"4dp\"
        android:layout_marginLeft=\"0dp\"
        android:layout_marginRight=\"0dp\"
        android:layout_alignParentTop=\"true\"
        android:layout_alignParentStart=\"true\"
        android:layout_marginBottom=\"2dp\">

        <RelativeLayout
            android:layout_width=\"match_parent\"
            android:layout_height=\"wrap_content\"
            android:background=\"?android:attr/selectableItemBackground\"
            android:clickable=\"true\"
            android:focusable=\"true\"> 
            <LinearLayout
                android:orientation=\"horizontal\"
                android:layout_width=\"match_parent\"
                android:layout_height=\"wrap_content\">

                <ImageView
                    android:id=\"@+id/iv_image\"
                    android:layout_width=\"match_parent\"
                    android:layout_height=\"wrap_content\"
                    android:scaleType=\"centerInside\"
                    android:src=\"@android:drawable/ic_menu_info_details\"
                    android:layout_weight=\"10\"
                    android:layout_gravity=\"center_vertical\"
                    android:layout_marginLeft=\"5dp\"
                    android:layout_marginRight=\"5dp\" />

                <LinearLayout
                    android:orientation=\"vertical\"
                    android:layout_width=\"match_parent\"
                    android:layout_height=\"wrap_content\"
                    android:layout_weight=\"1\">";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= " \n\n <TextView
            android:layout_width=\"match_parent\"
            android:layout_height=\"wrap_content\"
            android:gravity=\"left\"
            android:text=\"" . $row['column_name'] . "\"
            android:id=\"@+id/txt" . $row['column_name'] . "\" />";
    }
}

$string .= "\n\n  </LinearLayout>
            </LinearLayout>

        </RelativeLayout>
    </android.support.v7.widget.CardView>

</RelativeLayout>";

//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_java_layout_adapter = createFile($string, $target."java/" . $c_url . "/" . $filejava_layout_adapter);
?>