<?php

$string = "
package " . $packageAndroid . "." . $c_url . ";

import android.app.ProgressDialog;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.content.res.Configuration;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.SearchView;
import android.widget.Toast;
import android.widget.Button;
import android.util.Log;

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
import " . $packageAndroid . ".R;
import testk24willybrodusrangga.org.testk24willybrodusrangga.RecyclerTouchListener;
import testk24willybrodusrangga.org.testk24willybrodusrangga.ClickListener;



public class " . $filejavaActivityList . " extends AppCompatActivity {";

//foreach ($all as $row) {
//        $string .= "\nprivate EditText ed" . $row['column_name'] . ";";
//        $string .= "\nprivate String s" . $row['column_name'] . ";";
//}

$string .= " \n private ArrayList<" . $filejavaCLASS . "> xLs".$table_name." = null;
    private " . $filejavaActivityAdapter . " " . $table_name . ";
    private RecyclerView rv;
    private LinearLayoutManager llm;
    private GridLayoutManager llmG;
    public ProgressDialog progress;
    public int posisiOnLOngClick=-1;
    private Button btnInput;";

$string .= "\n @Override
        protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout." . $filejavalayoutlist . ");
        progress = new ProgressDialog(this);
        progress.setMessage(\"Tunggu Sedang Memproses ...\");
        progress.setProgressStyle(ProgressDialog.STYLE_SPINNER);
        progress.setIndeterminate(true);";

$string .= "\n Bundle b = getIntent().getExtras();
            if(b!=null) {
            String json" . $filejavaActivityList . " = b.getString(\"json" . $filejavaActivityList . "\");
            Gson gson = new Gson();" .
        $filejavaCLASS . " " . $filejavaActivityList . " = gson.fromJson(json" . $filejavaActivityList . ", " . $filejavaCLASS . ".class);";

$string .= "\n}"
        . "\n\n
            rv = (RecyclerView) findViewById(R.id.rv_recycler);
            rv.setHasFixedSize(true);
            xLs".$table_name." = new ArrayList<" . $filejavaCLASS . ">();
            llm = new LinearLayoutManager(this);";

$string .= "\n new list" . $filejavaActivityList . "(\"\").execute(); 
            rv.addOnItemTouchListener(new RecyclerTouchListener(this, rv, new ClickListener() {
            @Override
            public void onClick(View view, int position) {
                \n" . $filejavaCLASS . " " . strtolower($filejavaCLASS) . " = xLs".$table_name.".get(position);
                if (!" . strtolower($filejavaCLASS) . ".getID().trim().equals(\"\")) {
                    Intent intent = new Intent(" . $filejavaActivityList . ".this, " . $filejavaActivityIsi . ".class);
                    Gson gson=new Gson();
                    String json" . $filejavaActivityIsi . " = gson.toJson(" . strtolower($filejavaCLASS) . ");
                    intent.putExtra(\"json" . $filejavaActivityIsi . "\", json" . $filejavaActivityIsi . ");
                    Toast.makeText(getApplication(), \"OnKlik\", Toast.LENGTH_LONG).show();

                    Log.d(\"json" . $filejavaActivityIsi . "\", json" . $filejavaActivityIsi . ".toString());
                    startActivity(intent);

                } else{
                    Toast.makeText(getApplication(), \"Data Not Found\", Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onLongClick(View view, int position) {

            }
        }));
    
            btnInput = (Button) findViewById(R.id.btnInput);    
            btnInput.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent=new Intent(" . $filejavaActivityList . ".this, " . $filejavaActivityIsi . ".class);
                startActivity(intent);
            }
        });
        }";

$string .= "\n@Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.

        return true;
    }
    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {

        return super.onPrepareOptionsMenu(menu);
    }";

$string .= " \n@Override
    public void onPause() {
        super.onPause();
        if ((progress != null) && progress.isShowing())
            progress.dismiss();
        progress = null;
    }
    
    @Override
    public boolean onOptionsItemSelected(final MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        
        return super.onOptionsItemSelected(item);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);

    }";

$string .= "//TODO AsyncTask GET list" . $filejavaActivityList . ""
        . "\n public class list" . $filejavaActivityList . " extends AsyncTask<Void, Void, ArrayList<" . $filejavaCLASS . ">> {

        private ArrayList<" . $filejavaCLASS . "> listdataCombo;
            private String isearch;

        list" . $filejavaActivityList . "(String search) {
            this.isearch = search;
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            progress.show();
        }

        @Override
        protected ArrayList<" . $filejavaCLASS . "> doInBackground(Void... params) {

            Gson gson = new Gson();

            BufferedReader bufreader = null;
            URL url = null;
            try {
            url = new URL(Config.SERVER_PHP + \"" . $c . "/read" . $table_name . "Android/\");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod(\"POST\");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);
                    
                    Uri.Builder builder = new Uri.Builder()
                    .appendQueryParameter(\"search\", isearch + \"\")";

$string .= ";"
        . "\n\n String query = builder.build().getEncodedQuery();

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

                    listdataCombo = gson.fromJson(bufreader, new TypeToken<List<" . $filejavaCLASS . ">>() {
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
        protected void onPostExecute(final ArrayList<" . $filejavaCLASS . "> xlistDataCombo) {
             if ((progress != null) && progress.isShowing())
                progress.dismiss();
                posisiOnLOngClick=-1;
            
            if (xlistDataCombo != null) {
                if (xlistDataCombo.size() > 0) {
                    xLs".$table_name.".clear();
                    xLs".$table_name.".addAll(xlistDataCombo);

                   SetList" . $filejavaActivityList . "();

                }
            }

        }


        @Override
        protected void onCancelled() {

            progress.dismiss();
        }
    } ";

$string .= " \npublic void SetList" . $filejavaActivityList . "() {
        " . $table_name . " = new " . $filejavaActivityAdapter . "(xLs".$table_name."); 
        rv.setAdapter(" . $table_name . ");
        rv.setLayoutManager(llm);

    }";

$string .= "//TODO AsyncTask Delet" . $filejavaActivityList . "\n"
        . "public class Delete" . $filejavaActivityList . " extends AsyncTask<Void, Void, ArrayList<" . $filejavaCLASS . ">> {
        private ArrayList<" . $filejavaCLASS . "> Listproduk;
        private String i" . $pk . ";

        Delete" . $filejavaActivityList . "(String x" . $pk . ") {
            i" . $pk . " = x" . $pk . ";
        }
        @Override
        protected void onPreExecute() {
            super.onPreExecute();


            progress.show();
        }

        @Override
        protected ArrayList<" . $filejavaCLASS . "> doInBackground(Void... params) {
            // TODO: attempt authentication against a network service.


            URL url = null;


            try {

                url = new URL(Config.SERVER_PHP + \"" . $c . "/delet" . $table_name . "Android/\");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod(\"POST\");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);


                    Uri.Builder builder = new Uri.Builder()
                            .appendQueryParameter(\"edidx\", i" . $pk . ");
                    String query = builder.build().getEncodedQuery();

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
                    BufferedReader bufreader = null;
                    //List<ItemHasilSearch> buflistitemSearch= new ArrayList<>();
                    bufreader = new BufferedReader(new InputStreamReader(
                            urlConnection.getInputStream()));

                    @SuppressWarnings(\"serial\")
                    Gson gson = new Gson();

//
//                    String  line;
//                    String Sresponse=\"\";
//
//
//                    while ((line=bufreader.readLine()) != null) {
//                        Sresponse+=line;
//                    }
//                    Log.d(\"Data hasil Search \", \"> \" + Sresponse+\"\\n\");

                } catch (IOException e) {
                    e.printStackTrace();
                }
            } catch (MalformedURLException e) {
                e.printStackTrace();
            }


            return null;
        }

        @Override
        protected void onPostExecute(final ArrayList<" . $filejavaCLASS . "> listSize) {
            if ((progress != null) && progress.isShowing())
                progress.dismiss();
            
            new list" . $filejavaActivityList . "(\"\").execute();

        }


        @Override
        protected void onCancelled() {
            if ((progress != null) && progress.isShowing())
                progress.dismiss();

        }
    }";

$string .= "@Override
    public void onBackPressed() {
    }
    
    @Override
    public void onStart(){
        super.onStart();
    }
    
    @Override
    public void onResume(){
        super.onResume();
    }
    
    @Override
    public void onStop(){
        super.onStop();
    }
    
    @Override
    public void onDestroy(){
        super.onDestroy();
    }
}
";
//$hasil_CLASS = createFile($string, $target . "controllers/" . $filejava_file);
$hasil_java_actifity_list = createFile($string, $target . "java/" . $c_url . "/" . $filejava_activity_list);
?>