
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
public class IsiDataActivity extends AppCompatActivity {
private EditText edno;
private String sno;
private EditText edID;
private String sID;
private EditText ednama;
private String snama;
private EditText edasal;
private String sasal;
private EditText edgabung;
private String sgabung;
 private Button btnsimpanIsiDataActivity;
            
 private ProgressDialog progress;
 @Override
        protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dataisi);
        progress = new ProgressDialog(this);
        progress.setMessage("Tunggu Sedang Memproses ...");
        progress.setProgressStyle(ProgressDialog.STYLE_SPINNER);
        progress.setIndeterminate(true);
 edID= (EditText) findViewById(R.id.edID);
 ednama= (EditText) findViewById(R.id.ednama);
 edasal= (EditText) findViewById(R.id.edasal);
 edgabung= (EditText) findViewById(R.id.edgabung);
 Bundle b = getIntent().getExtras();
            if(b!=null) {
            String jsonIsiDataActivity = b.getString("jsonIsiDataActivity");
            Log.d(" jsonIsiDataActivity", jsonIsiDataActivity );  
            Gson gson = new Gson();
DataCLASS IsiDataActivity = gson.fromJson(jsonIsiDataActivity, DataCLASS.class);
sno= IsiDataActivity.getNo();


 edID.setText(IsiDataActivity.getID());


 ednama.setText(IsiDataActivity.getNama());


 edasal.setText(IsiDataActivity.getAsal());


 edgabung.setText(IsiDataActivity.getGabung());



}btnsimpanIsiDataActivity = (Button) findViewById(R.id.btnsimpan);
           btnsimpanIsiDataActivity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

 sID= edID.getText().toString();
 snama= ednama.getText().toString();
 sasal= edasal.getText().toString();
 sgabung= edgabung.getText().toString();
 new SimpanIsiDataActivity(null).execute(); 
          }
         }); 
        }
 public class SimpanIsiDataActivity extends AsyncTask<Void, Void, ArrayList<DataCLASS>> {

        private ArrayList<DataCLASS> listdataCombo;

        SimpanIsiDataActivity(ArrayList<DataCLASS> xListIsiDataActivity) {
            listdataCombo = xListIsiDataActivity;
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            progress.show();
        }

        @Override
        protected ArrayList<DataCLASS> doInBackground(Void... params) {
            // TODO: attempt authentication against a network service.

            Gson gson = new Gson();

            BufferedReader bufreader = null;
            URL url = null;
            try {
            url = new URL(Config.SERVER_PHP + "Data/simpanupdatedataAndroid/");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod("POST");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);
                    
                    Uri.Builder builder = new Uri.Builder()
 .appendQueryParameter("edno", sno+"")
 .appendQueryParameter("edID", sID+"")
 .appendQueryParameter("ednama", snama+"")
 .appendQueryParameter("edasal", sasal+"")
 .appendQueryParameter("edgabung", sgabung+"");
 String query = builder.build().getEncodedQuery();

                    OutputStream os = urlConnection.getOutputStream();
                    BufferedWriter writer = new BufferedWriter(
                            new OutputStreamWriter(os, "UTF-8"));
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
//                    String Sresponse="";
//
//                    while ((line=bufreader.readLine()) != null) {
//                        Sresponse+=line;
//                    }
//                    Log.d("Data hasil Search ", "> " + Sresponse+"");

                    listdataCombo = gson.fromJson(bufreader, new TypeToken<List<DataCLASS>>() {
                    }.getType());

                } catch (IOException e) {
                    e.printStackTrace();
                }
            } catch (MalformedURLException e) {
                e.printStackTrace();
            }


            return listdataCombo;
        }
 @Override
        protected void onPostExecute(final ArrayList<DataCLASS> xlistDataCombo) {
            progress.dismiss();
            if(xlistDataCombo!=null){
                DataCLASS xdataCombo = xlistDataCombo.get(0);
                Intent intent=new Intent();
                intent.putExtra("MESSAGE","Y");
                intent.putExtra("isfromprodukfasilitas","Y");
                setResult(2,intent);
                finish();


            }else{
                Toast.makeText(getApplication(), "PENYIMPANAN produkfasilitas GAGAL", Toast.LENGTH_LONG).show();
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
        intent.putExtra("MESSAGE","Y");
                intent.putExtra("isfromprodukfasilitas","Y");
        setResult(2,intent);
        finish();

    }
}