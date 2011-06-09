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
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class CRMS extends Activity {
    /** Called when the activity is first created. */
    //@Override
    
    private user currentUser;
    private server currentServer = new server();
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
   
/*  final Button button = (Button) findViewById(R.id.button2);
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
/*		        setContentView(R.layout.menu);
		        /*go to query*/
/*		        final Button buttonQ = (Button) findViewById(R.id.button1);
		        buttonQ.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.query);
		            }
		   
		        });
		        /*go to new*/
 /*		        final Button buttonN = (Button) findViewById(R.id.button2);
		        buttonN.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.newitem);
		            }
		   
		        });
		        /*go to remove*/
        /*		        final Button buttonR = (Button) findViewById(R.id.button3);
		        buttonR.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.remove);
		            }
		   
		        });
		        /*logout*/
        /*		        final Button buttonH = (Button) findViewById(R.id.button4);
		        buttonH.setOnClickListener(new Button.OnClickListener(){
		            	public void onClick(View v) {
				        setContentView(R.layout.main);
		            }
		   
		        });
		        
            }
      
        });
*/
    }
    /*Login*/
    public void login(View cvView){
    	EditText uidin = (EditText) findViewById(R.id.uid); 
    	EditText passwdin = (EditText) findViewById(R.id.pw);
    	String inuid =  uidin.getText().toString();
    	String inpasswd =  passwdin.getText().toString();
    	currentUser = new user(inuid,inpasswd);
    	try {
			if(currentUser.login(currentServer))
				setContentView(R.layout.menu);
			else{
				uidin.setText("fail!");
				passwdin.setText("");
				currentUser = null;
			}
		} catch (ClientProtocolException e) {
			uidin.setText("�����s�u���~");
			e.printStackTrace();
		} catch (IOException e) {
			uidin.setText("IO���~");
			e.printStackTrace();
		}
    }
    /*Sign*/
    public void sign(View cvView){
    	setContentView(R.layout.newid);
    }
    public void newidcancel(View cvView){
    	setContentView(R.layout.main);
    }
    /*query*/
    public void goquery(View cvView){
    	setContentView(R.layout.query);
    }
    public void queryenter(View cvView){
    	setContentView(R.layout.equipment);
    }
    public void queryback(View cvView){
    	setContentView(R.layout.menu);
    }
    /*equipment*/
    public void equipexit(View cvView){
    	setContentView(R.layout.menu);
    }
    /*new item*/
    public void gonew(View cvView){
    	setContentView(R.layout.newitem);
    }
    public void neweqback(View cvView){
    	setContentView(R.layout.menu);
    }
    /*remove*/
    public void gorm(View cvView){
    	setContentView(R.layout.remove);
    }
    public void rmback(View cvView){
    	setContentView(R.layout.menu);
    }
    public void gotomain(View cvView){
    	setContentView(R.layout.main);
    }
    
}