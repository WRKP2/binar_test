
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
public class IsiUserActivity extends AppCompatActivity {
private EditText edidx;
private String sidx;
private EditText ednama;
private String snama;
private EditText edalamat;
private String salamat;
private EditText eduser;
private String suser;
private EditText edpassword;
private String spassword;
 private Button btnsimpanIsiUserActivity;
            
 private ProgressDialog progress;
 @Override
        protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.userisi);
        progress = new ProgressDialog(this);
        progress.setMessage("Tunggu Sedang Memproses ...");
        progress.setProgressStyle(ProgressDialog.STYLE_SPINNER);
        progress.setIndeterminate(true);
 ednama= (EditText) findViewById(R.id.ednama);
 edalamat= (EditText) findViewById(R.id.edalamat);
 eduser= (EditText) findViewById(R.id.eduser);
 edpassword= (EditText) findViewById(R.id.edpassword);
 Bundle b = getIntent().getExtras();
            if(b!=null) {
            String jsonIsiUserActivity = b.getString("jsonIsiUserActivity");
            Log.d(" jsonIsiUserActivity", jsonIsiUserActivity );  
            Gson gson = new Gson();
UserCLASS IsiUserActivity = gson.fromJson(jsonIsiUserActivity, UserCLASS.class);
sidx= IsiUserActivity.getIdx ;


 ednama.setText(IsiUserActivity.getNama());


 edalamat.setText(IsiUserActivity.getAlamat());


 eduser.setText(IsiUserActivity.getUser());


 edpassword.setText(IsiUserActivity.getPassword());



}btnsimpanIsiUserActivity = (Button) findViewById(R.id.btnsimpan);
           btnsimpanIsiUserActivity.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

 snama= ednama.getText().toString();
 salamat= edalamat.getText().toString();
 suser= eduser.getText().toString();
 spassword= edpassword.getText().toString();
 new SimpanIsiUserActivity(null).execute(); 
          }
         }); 
        }
 public class SimpanIsiUserActivity extends AsyncTask<Void, Void, ArrayList<UserCLASS>> {

        private ArrayList<UserCLASS> listdataCombo;

        SimpanIsiUserActivity(ArrayList<UserCLASS> xListIsiUserActivity) {
            listdataCombo = xListIsiUserActivity;
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            progress.show();
        }

        @Override
        protected ArrayList<UserCLASS> doInBackground(Void... params) {
            // TODO: attempt authentication against a network service.

            Gson gson = new Gson();

            BufferedReader bufreader = null;
            URL url = null;
            try {
            url = new URL(Config.SERVER_PHP + "User/simpanupdateuserAndroid/");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod("POST");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);
                    
                    Uri.Builder builder = new Uri.Builder()
 .appendQueryParameter("edidx", sidx+"")
 .appendQueryParameter("ednama", snama+"")
 .appendQueryParameter("edalamat", salamat+"")
 .appendQueryParameter("eduser", suser+"")
 .appendQueryParameter("edpassword", spassword+"");
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

                    listdataCombo = gson.fromJson(bufreader, new TypeToken<List<UserCLASS>>() {
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
        protected void onPostExecute(final ArrayList<UserCLASS> xlistDataCombo) {
            progress.dismiss();
            if(xlistDataCombo!=null){
                UserCLASS xdataCombo = xlistDataCombo.get(0);
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