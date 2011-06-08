package crms.app;

import java.io.IOException;
import java.text.ParseException;

import org.apache.http.client.ClientProtocolException;
import org.json.JSONException;

import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class CRMS extends Activity {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        findViewById(R.id.textView1);
        Log.v("test","aasd");
        final TextView tv = (TextView) findViewById(R.id.textView1);
        //R.layout.main.tv;
        final user Client = new user("admin","admina");
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
			tv.setText(Equip.location().toString());
		}

        Log.v("test","a");
        //setContentView(tv);
        //setContentView()
        Log.v("test","c");
        final Button button = (Button) findViewById(R.id.button2);
        button.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                //final TextView tv = (TextView) findViewById(R.id.textView1);
                /*try {
					Client.getEquipment("123");
				} catch (ClientProtocolException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (ParseException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}*/
		        setContentView(R.layout.menu);
		        /*go to query*/
		        final Button buttonQ = (Button) findViewById(R.id.button1);
		        buttonQ.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.query);
		            }
		   
		        });
		        /*go to new*/
		        final Button buttonN = (Button) findViewById(R.id.button2);
		        buttonN.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.newitem);
		            }
		   
		        });
		        /*go to remove*/
		        final Button buttonR = (Button) findViewById(R.id.button3);
		        buttonR.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.remove);
		            }
		   
		        });
		        
            }
      
        });

    }
}