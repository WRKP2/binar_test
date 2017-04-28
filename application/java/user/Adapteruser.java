
import android.content.Context;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;


public class Adapteruser extends RecyclerView.Adapter<Adapteruser.UserHolder> {

    public Context context;
    private ArrayList<UserCLASS> mUserset;
    private int lastCheckedPosition = -1;


    public Adapteruser(ArrayList<UserCLASS> myUserset) {
        mUserset = myUserset;
    }

    @Override
    public Adapteruser.UserHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.useradapter, parent, false);
        // set the view's size, margins, paddings and layout parameters


        Adapteruser.UserHolder vh = new Adapteruser.UserHolder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(UserHolder holder, final int position) {
        final UserCLASS item = mUserset.get(position);
 holder.mnama.setText(item.getNama());
 holder.malamat.setText(item.getAlamat());
 holder.muser.setText(item.getUser());
 holder.mpassword.setText(item.getPassword());

        //holder.imageView.getLayoutParams().height = 200;

    }

    @Override
    public int getItemCount() {
        return mUserset.size();
    }

    public class UserHolder extends RecyclerView.ViewHolder {

        public CardView mCardView;
//            private SparseBooleanArray selectedItems = new SparseBooleanArray();
 public TextView mnama;
 public TextView malamat;
 public TextView muser;
 public TextView mpassword;
			 public ImageView imageView;
        public Context context;

         public UserHolder(View v) {
            super(v);
            context = v.getContext();

            mCardView = (CardView) v.findViewById(R.id.card_view);
 mnama = (TextView) v.findViewById(R.id.txtnama;
 malamat = (TextView) v.findViewById(R.id.txtalamat;
 muser = (TextView) v.findViewById(R.id.txtuser;
 mpassword = (TextView) v.findViewById(R.id.txtpassword;
\//imageView = (ImageView) v . findViewById(R . id . iv_image);
    }
    	}
}