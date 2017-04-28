
import android.content.Context;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;


public class Adapterdata extends RecyclerView.Adapter<Adapterdata.DataHolder> {

    public Context context;
    private ArrayList<DataCLASS> mDataset;
    private int lastCheckedPosition = -1;


    public Adapterdata(ArrayList<DataCLASS> myDataset) {
        mDataset = myDataset;
    }

    @Override
    public Adapterdata.DataHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.dataadapter, parent, false);
        // set the view's size, margins, paddings and layout parameters


        Adapterdata.DataHolder vh = new Adapterdata.DataHolder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(DataHolder holder, final int position) {
        final DataCLASS item = mDataset.get(position);
 holder.mID.setText(item.getID());
 holder.mnama.setText(item.getNama());
 holder.masal.setText(item.getAsal());
 holder.mgabung.setText(item.getGabung());

        //holder.imageView.getLayoutParams().height = 200;

    }

    @Override
    public int getItemCount() {
        return mDataset.size();
    }

    public class DataHolder extends RecyclerView.ViewHolder {

        public CardView mCardView;
//            private SparseBooleanArray selectedItems = new SparseBooleanArray();
 public TextView mID;
 public TextView mnama;
 public TextView masal;
 public TextView mgabung;
			 public ImageView imageView;
        public Context context;

         public DataHolder(View v) {
            super(v);
            context = v.getContext();

            mCardView = (CardView) v.findViewById(R.id.card_view);
 mID = (TextView) v.findViewById(R.id.txtID;
 mnama = (TextView) v.findViewById(R.id.txtnama;
 masal = (TextView) v.findViewById(R.id.txtasal;
 mgabung = (TextView) v.findViewById(R.id.txtgabung;
\//imageView = (ImageView) v . findViewById(R . id . iv_image);
    }
    	}
}