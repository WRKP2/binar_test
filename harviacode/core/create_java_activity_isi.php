<?php

$string = "
import android.app.ProgressDialog;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;


import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
public class ".$filejavaActivityIsi." extends AppCompatActivity {";

foreach ($all as $row) {
        $string .= "\nprivate EditText ed" . $row['column_name'] . ";";
        $string .= "\nprivate String s" . $row['column_name'] . ";";
}
$string .= "\n private Button btnsimpan".$filejavaActivityIsi.";
            \n private ProgressDialog progress;";

$string .= "\n @Override
        protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.".$filejavalayoutisi.");
        progress = new ProgressDialog(this);
        progress.setMessage(\"Tunggu Sedang Memproses ...\");
        progress.setProgressStyle(ProgressDialog.STYLE_SPINNER);
        progress.setIndeterminate(true);";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= "\n ed" . $row['column_name'] . "= (EditText) findViewById(R.id.ed" . $row['column_name'] . ");";
    }
}

$string .= "\n Bundle b = getIntent().getExtras();
            if(b!=null) {
            String json".$filejavaActivityIsi." = b.getString(\"json".$filejavaActivityIsi."\");
            Log.d(\" json".$filejavaActivityIsi."\", json".$filejavaActivityIsi." );  
            Gson gson = new Gson();\n".
            $filejavaCLASS." ". $filejavaActivityIsi." = gson.fromJson(json".$filejavaActivityIsi.", ".$filejavaCLASS.".class);";

foreach ($all as $row) {
    if ($row['column_name'] != $pk) {
        $string .= "\n\n\n ed" . $row['column_name'] . ".setText(". $filejavaActivityIsi.".get" . ucfirst($row['column_name']) . "());";
    } else {
         $string .= "\ns" . $row['column_name'] . "= ". $filejavaActivityIsi.".get" . ucfirst($row['column_name']) . " ;";
    } 
}

$string .= "\n\n\n\n}"
        . "btnsimpan".$filejavaActivityIsi." = (Button) findViewById(R.id.btnsimpan);
           btnsimpan".$filejavaActivityIsi.".setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {\n";

foreach ($all as $row) {
        if ($row['column_name'] != $pk) {
        $string .= "\n s" . $row['column_name'] . "= ed" . $row['column_name'] . ".getText().toString();";
        }
}

$string .= "\n new Simpan".$filejavaActivityIsi."(null).execute(); 
          }
         }); 
        }";

$string .= "\n public class Simpan".$filejavaActivityIsi." extends AsyncTask<Void, Void, ArrayList<".$filejavaCLASS.">> {

        private ArrayList<".$filejavaCLASS."> listdataCombo;

        Simpan".$filejavaActivityIsi."(ArrayList<".$filejavaCLASS."> xList".$filejavaActivityIsi.") {
            listdataCombo = xList".$filejavaActivityIsi.";
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            progress.show();
        }

        @Override
        protected ArrayList<".$filejavaCLASS."> doInBackground(Void... params) {
            // TODO: attempt authentication against a network service.

            Gson gson = new Gson();

            BufferedReader bufreader = null;
            URL url = null;
            try {
            url = new URL(Config.SERVER_PHP + \"".$c."/simpanupdate" . $table_name . "Android/\");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod(\"POST\");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);
                    
                    Uri.Builder builder = new Uri.Builder()";

foreach ($all as $row) {
        $string .= "\n .appendQueryParameter(\"ed" . $row['column_name'] . "\", s" . $row['column_name'] . "+\"\")";
}

$string .= ";"
        . "\n String query = builder.build().getEncodedQuery();

                    OutputStream os = urlConnection.getOutputStream();
                    BufferedWriter writer = new BufferedWriter(
                            new OutputStreamWriter(os, \"UTF-8\"));
                    writer.write(query);
                    writer.flush();
                    writer.close();
                    os.close();

                    //urlConnection.connect();

                } catch (IOException e) {
                    e.printStackTrace();
                }
                try {
                    bufreader = new BufferedReader(new InputStreamReader(
                            urlConnection.getInputStream()));
//                    String  line;
//                    String Sresponse=\"\";
//
//                    while ((line=bufreader.readLine()) != null) {
//                        Sresponse+=line;
//                    }
//                    Log.d(\"Data hasil Search \", \"> \" + Sresponse+\"\");

                    listdataCombo = gson.fromJson(bufreader, new TypeToken<List<".$filejavaCLASS.">>() {
                    }.getType());

                } catch (IOException e) {
                    e.printStackTrace();
                }
            } catch (MalformedURLException e) {
                e.printStackTrace();
            }


            return listdataCombo;
        }";

$string .= "\n @Override
        protected void onPostExecute(final ArrayList<".$filejavaCLASS."> xlistDataCombo) {
            progress.dismiss();
            if(xlistDataCombo!=null){
                ".$filejavaCLASS." xdataCombo = xlistDataCombo.get(0);
                Intent intent=new Intent();
                intent.putExtra(\"MESSAGE\",\"Y\");
                intent.putExtra(\"isfromprodukfasilitas\",\"Y\");
                setResult(2,intent);
                finish();


            }else{
                Toast.makeText(getApplication(), \"PENYIMPANAN produkfasilitas GAGAL\", Toast.LENGTH_LONG).show();
            }

        }


        @Override
        protected void onCancelled() {

            progress.dismiss();
        }
    }

    @Override
    public void onBackPressed() {
        Intent intent=new Intent();
        intent.putExtra(\"MESSAGE\",\"Y\");
                intent.putExtra(\"isfromprodukfasilitas\",\"Y\");
        setResult(2,intent);
        finish();

    }
}";
//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_java_actifity_isi = createFile($string, $target . "java/" . $c_url . "/" . $filejava_activity_isi);
?>