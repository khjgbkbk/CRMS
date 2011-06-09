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
    @Override
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
    public void login(View cvView){
    	String tmp1 = new String("1234");
    	String tmp2 = new String("0000");
    	EditText uidin = (EditText) findViewById(R.id.uid); 
    	EditText passwdin = (EditText) findViewById(R.id.pw); 
    	//TextView uidout= (TextView) findViewById(R.id.uid);
    	//String outid =  passwdin.getText().toString();
    	//uidout.setText(outid);
    	String inuid =  uidin.getText().toString();
    	String inpasswd =  passwdin.getText().toString();
    	if(inuid.equals(tmp1)&&inpasswd.equals(tmp2))
    		setContentView(R.layout.menu);
    	else{
    		uidin.setText("fail!");
    		passwdin.setText("");
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
    public void queryback(View cvView){
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