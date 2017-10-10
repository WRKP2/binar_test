<?php

$string = "
package ".$packageAndroid.".".$c_url.";
    
import android.content.Context;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;
import ".$packageAndroid.".R;


public class ".$filejavaActivityAdapter." extends RecyclerView.Adapter<".$filejavaActivityAdapter."." . ucfirst($table_name) . "Holder> {

    public Context context;
    private ArrayList<" . $filejavaCLASS . "> m" . ucfirst($table_name) . "set;
    private int lastCheckedPosition = -1;


    public ".$filejavaActivityAdapter."(ArrayList<".$filejavaCLASS."> my" . ucfirst($table_name) . "set) {
        m" . ucfirst($table_name) . "set = my" . ucfirst($table_name) . "set;
    }

    @Override
    public ".$filejavaActivityAdapter."." . ucfirst($table_name) . "Holder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.".$filejavalayoutadapter.", parent, false);
        // set the view's size, margins, paddings and layout parameters


        ".$filejavaActivityAdapter."." . ucfirst($table_name) . "Holder vh = new ".$filejavaActivityAdapter."." . ucfirst($table_name) . "Holder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(" . ucfirst($table_name) . "Holder holder, final int position) {
        final " . $filejavaCLASS . " item = m" . ucfirst($table_name) . "set.get(position);";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= "\n holder.m" . $row['column_name'] . ".setText(item.get" . ucfirst($row['column_name']) . "());";
    }
}
$string .= "\n
        //holder.imageView.getLayoutParams().height = 200;

    }

    @Override
    public int getItemCount() {
        return m" . ucfirst($table_name) . "set.size();
    }

    public class " . ucfirst($table_name) . "Holder extends RecyclerView.ViewHolder {

        public CardView mCardView;";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= "\n public TextView m" . $row['column_name'] . ";";
    }
}

$string .= "\n\t\t\t public ImageView imageView;
        public Context context;

         public " . ucfirst($table_name) . "Holder(View v) {
            super(v);
            context = v.getContext();

            mCardView = (CardView) v.findViewById(R.id.card_view);";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= "\n m". $row['column_name'] . " = (TextView) v.findViewById(R.id.txt".$row['column_name'].");";
    }
}

$string .= "\n//imageView = (ImageView) v . findViewById(R . id . iv_image);
    }
    \t}
}";
//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_java_actifity_adapter = createFile($string, $target . "java/" . $c_url . "/" . $filejava_activity_adapter);
?>