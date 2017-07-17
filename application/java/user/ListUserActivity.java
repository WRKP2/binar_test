
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

public class ListUserActivity extends AppCompatActivity { 
 private ArrayList<UserCLASS> xLsItem = null;
    private AdapterListUserActivity adapter;
    private RecyclerView rv;
    private Boolean isStarted = false;
    private Boolean isVisible = false;
    private Boolean isAfterDetail = false;
    private LinearLayoutManager llm;
    private GridLayoutManager llmG;
    public ProgressDialog progress;
    public int iStart = 0;
    public int iLimit = 100;
    public String xSearch = "";
    private Menu mMenu;
    public int posisiOnLOngClick=-1;
    public String idproduk;
 @Override
        protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.userlist);
        progress = new ProgressDialog(this);
        progress.setMessage("Tunggu Sedang Memproses ...");
        progress.setProgressStyle(ProgressDialog.STYLE_SPINNER);
        progress.setIndeterminate(true);
 Bundle b = getIntent().getExtras();
            if(b!=null) {
            String jsonListUserActivity = b.getString("jsonListUserActivity");
            Gson gson = new Gson();UserCLASS ListUserActivity = gson.fromJson(jsonListUserActivity, UserCLASS.class);
}


            rv = (RecyclerView) findViewById(R.id.rv_recycler);
            rv.setHasFixedSize(true);
            xLsItem = new ArrayList<UserCLASS>();
            llm = new LinearLayoutManager(this);
 new listListUserActivity("").execute(); 
            rv.addOnItemTouchListener(new RecyclerTouchListener(this, rv, new ClickListener() {
            @Override
            public void onClick(View view, int position) {
                
UserCLASS userclass = xLsItem.get(position);
                if (!userclass.getIdx().trim().equals("")) {
                    Intent intent = new Intent(ListUserActivity.this, IsiUserActivity.class);
                    Gson gson=new Gson();
                    String jsonIsiUserActivity = gson.toJson(userclass);
                    intent.putExtra("jsonIsiUserActivity", jsonIsiUserActivity);
                    Toast.makeText(getApplication(), "OnKlik", Toast.LENGTH_LONG).show();

                    Log.d("jsonIsiUserActivity", jsonIsiUserActivity.toString());
                    startActivity(intent);

                } else{
                    Toast.makeText(getApplication(), "Data Not Found", Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onLongClick(View view, int position) {

            }
        }));
        handleIntent(getIntent());
        }
@Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.

        return true;
    }
    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {

        return super.onPrepareOptionsMenu(menu);
    } 
@Override
    public void onPause() {
        super.onPause();
        if ((progress != null) && progress.isShowing())
            progress.dismiss();
        progress = null;
    }
    @Override
    protected void onNewIntent(Intent intent) {
        handleIntent(intent);
    }

    private void handleIntent(Intent intent) {

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
        if(requestCode==11 && data!=null)
        {
            String message=data.getStringExtra("MESSAGE");
            if(message.equals("Y")){
                new listListUserActivity("").execute();
            }

        }
    }
 public class listListUserActivity extends AsyncTask<Void, Void, ArrayList<UserCLASS>> {

        private ArrayList<UserCLASS> listdataCombo;
            private String isearch;

        listListUserActivity(String search) {
            this.isearch = search;
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
            url = new URL(Config.SERVER_PHP + "User/readuserAndroid/");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod("POST");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);
                    
                    Uri.Builder builder = new Uri.Builder()
                    .appendQueryParameter("search", isearch + "");

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
             if ((progress != null) && progress.isShowing())
                progress.dismiss();
                posisiOnLOngClick=-1;
            
            if (xlistDataCombo != null) {
                if (xlistDataCombo.size() > 0) {
                    xLsItem.clear();
                    xLsItem.addAll(xlistDataCombo);

                   SetListListUserActivity();

                }
            }

        }


        @Override
        protected void onCancelled() {

            progress.dismiss();
        }
    }  
public void SetListListUserActivity() {
        adapter = new AdapterListUserActivity(xLsItem); 
        rv.setAdapter(adapter);
        rv.setLayoutManager(llm);

    } public class DeleteListUserActivity extends AsyncTask<Void, Void, ArrayList<UserCLASS>> {
        private ArrayList<UserCLASS> Listproduk;
        private String iidx;

        DeleteListUserActivity(String xidx) {
            iidx = xidx;
        }
        @Override
        protected void onPreExecute() {
            super.onPreExecute();


            progress.show();
        }

        @Override
        protected ArrayList<UserCLASS> doInBackground(Void... params) {
            // TODO: attempt authentication against a network service.


            URL url = null;


            try {

                url = new URL(Config.SERVER_PHP + "User/deletuserAndroid/");
                HttpURLConnection urlConnection = null;
                try {
                    urlConnection = (HttpURLConnection) url.openConnection();
//                    urlConnection.setReadTimeout(30000);
//                    urlConnection.setConnectTimeout(35000);
//                    urlConnection.setRequestMethod("POST");
                    urlConnection.setDoInput(true);
                    urlConnection.setDoOutput(true);


                    Uri.Builder builder = new Uri.Builder()
                            .appendQueryParameter("edidx", iidx);
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
                    BufferedReader bufreader = null;
                    //List<ItemHasilSearch> buflistitemSearch= new ArrayList<>();
                    bufreader = new BufferedReader(new InputStreamReader(
                            urlConnection.getInputStream()));

                    @SuppressWarnings("serial")
                    Gson gson = new Gson();

//
//                    String  line;
//                    String Sresponse="";
//
//
//                    while ((line=bufreader.readLine()) != null) {
//                        Sresponse+=line;
//                    }
//                    Log.d("Data hasil Search ", "> " + Sresponse+"\n");





                } catch (IOException e) {
                    e.printStackTrace();
                }
            } catch (MalformedURLException e) {
                e.printStackTrace();
            }


            return null;
        }

        @Override
        protected void onPostExecute(final ArrayList<UserCLASS> listSize) {
            if ((progress != null) && progress.isShowing())
                progress.dismiss();
            
            new listListUserActivity("").execute();

        }


        @Override
        protected void onCancelled() {
            if ((progress != null) && progress.isShowing())
                progress.dismiss();

        }
    }    @Override
    public void onBackPressed() {
        Intent intent=new Intent();
        intent.putExtra("MESSAGE","Y");
                intent.putExtra("isfromprodukfasilitas","Y");
        setResult(2,intent);
        finish();

    }
}
