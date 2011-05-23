package crms.app;

import java.io.IOException;
import java.text.ParseException;

import org.apache.http.client.ClientProtocolException;
import org.json.JSONException;

import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

public class CRMS extends Activity {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        Log.v("test","aasd");
        TextView tv = new TextView(this);
        user Client = new user("admin","admina");
        server CRMSserver = new server();
        try {
			if(Client.login(CRMSserver) == true){
				tv.setText("SuccessA");
			}else{
				tv.setText("Fail");
				
			}
		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			 Toast.makeText(this, e.getMessage(), Toast.LENGTH_LONG).show();
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block

			 Toast.makeText(this, e.getMessage(), Toast.LENGTH_LONG).show();
			e.printStackTrace();
		}
		equipment Equip = null;

        Log.v("test","a");
		try {
			Equip = Client.getEquipment("123");
		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block

			 Toast.makeText(this, e.getMessage(), Toast.LENGTH_LONG).show();
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block

			 Toast.makeText(this, e.getMessage(), Toast.LENGTH_LONG).show();
			e.printStackTrace();
		} catch (JSONException e) {
			// TODO Auto-generated catch block

			 Toast.makeText(this, e.getMessage(), Toast.LENGTH_LONG).show();
			e.printStackTrace();
		} catch (ParseException e) {
			// TODO Auto-generated catch block

			 Toast.makeText(this, e.getMessage(), Toast.LENGTH_LONG).show();
			e.printStackTrace();
		}
		if(Equip != null){
			tv.setText(Equip.getLocation().toString());
		}

        Log.v("test","a");
        setContentView(tv);

        Log.v("test","c");
    }
}