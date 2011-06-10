package crms.app;

import java.io.IOException;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.client.ClientProtocolException;
import org.json.JSONException;

import android.R.string;
import android.app.Activity;
import android.app.AlertDialog.Builder;
import android.content.Intent;
import android.content.res.Configuration;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.Spinner;

public class CRMS extends Activity {
    /** Called when the activity is first created. */
    //
    
    private user currentUser;
    private server currentServer = new server();
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
    @Override 
    public void onConfigurationChanged(Configuration newConfig){ 
    	super.onConfigurationChanged(newConfig); 
    	if (this.getResources().getConfiguration().orientation == Configuration.ORIENTATION_LANDSCAPE){
    		//land
    	}
    	else if (this.getResources().getConfiguration().orientation == Configuration.ORIENTATION_PORTRAIT){
    		//port
    	}
    }
    
    public boolean onKeyDown(int keyCode, KeyEvent msg) {
    	if (keyCode == KeyEvent.KEYCODE_BACK) {
        //向左
        //  Builder alertDialog = new Builder(CRMS.this) ;
        //   alertDialog.setMessage("TEST").show();
    		setContentView(R.layout.menu);
            return (true);
        }
        if (keyCode == KeyEvent.KEYCODE_MENU) {
        //向左
        	   
        	setContentView(R.layout.menu);
            return (true);
        }   
        return super.onKeyDown(keyCode, msg);
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

    		Builder alertDialog = new Builder(CRMS.this) ;
     	    alertDialog.setMessage("網路連線錯誤").show();
			e.printStackTrace();
		} catch (IOException e) {

    		Builder alertDialog = new Builder(CRMS.this) ;
     	    alertDialog.setMessage("IO錯誤").show();
			e.printStackTrace();
		} catch (org.apache.http.ParseException e) {
    		Builder alertDialog = new Builder(CRMS.this) ;
     	    alertDialog.setMessage("封包解析錯誤").show();
			e.printStackTrace();
		} catch (JSONException e) {
    		Builder alertDialog = new Builder(CRMS.this) ;
     	    alertDialog.setMessage("JSON解析錯誤").show();
			e.printStackTrace();
		}
    }
    /*Sign*/
    public void sign(View cvView){
    	setContentView(R.layout.newid);
    }
    public void newID_Cancel(View cvView){
    	setContentView(R.layout.main);
    }
    /*query*/
    public void goQuery(View cvView){
    	setContentView(R.layout.query);
    }
    public void queryEnter(View cvView){

    	EditText uidin = (EditText) findViewById(R.id.queEqid);

    	setContentView(R.layout.equipment);
		EditText eT1 = (EditText) findViewById(R.id.editText1);
    	try {
    		eT1.setText("IN");
			equipment currentEquip = currentUser.getEquipment(uidin.getText().toString());
			if(currentEquip != null){
				EditText eT2 = (EditText) findViewById(R.id.editText2);
				EditText eT3 = (EditText) findViewById(R.id.editText3);
				EditText eT4 = (EditText) findViewById(R.id.editText4);
				eT1.setText(currentEquip.id());
				eT2.setText(currentEquip.name());
				eT3.setText(currentEquip.location().toString());
				eT4.setText(Integer.toString(currentEquip.price()));
				
			}else{
				//EditText eT1 = (EditText) findViewById(R.id.editText1);

	    		Builder alertDialog = new Builder(CRMS.this) ;
	     	    alertDialog.setMessage("找不到機器").show();
				
			}
			currentEquip = null;
    	
    	} catch (ClientProtocolException e) {
    		Builder alertDialog = new Builder(CRMS.this) ;
     	    alertDialog.setMessage("連線錯誤").show();
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
    		eT1.setText("IN2");
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (JSONException e) {
    		eT1.setText("IN2");
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (ParseException e) {
    		eT1.setText("IN2");
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
    	
    	
    	
    }
    public void queryQR(View cvView){
    	Intent intent = new Intent("com.google.zxing.client.android.SCAN");
        intent.putExtra("SCAN_MODE", "QR_CODE_MODE");
        startActivityForResult(intent, 1); 
    }
    public void queryBack(View cvView){
    	setContentView(R.layout.menu);
    }
    /*equipment*/
    public void equipExit(View cvView){
    	setContentView(R.layout.menu);
    }
    /*new item*/
    public void goNew(View cvView){
    	setContentView(R.layout.newitem);
    	Spinner spinner_d = (Spinner) findViewById(R.id.newItemDorm);
    	List<String> list = new ArrayList<String>();
    	location[] tmpLList;
		try {
			tmpLList = currentUser.getLocationList();
		
    	int tmp = tmpLList.length;
    	for(int i=0;i<tmp;++i){
    		list.add(tmpLList[i].toString());
    	}
    	ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,list);
    	adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
    	spinner_d.setAdapter(adapter);
		} catch (org.apache.http.ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    }
    public void newSubmit(View cvView){
    	equipment currentEquip = new equipment();
    	EditText newItemName = (EditText) findViewById(R.id.newItemName);
    	EditText newItemDorm = (EditText) findViewById(R.id.newItemDorm);
    	EditText newItemEqid = (EditText) findViewById(R.id.newItemEqid);
    	EditText newItemPrice = (EditText) findViewById(R.id.newItemPrice);
    	
    	currentEquip.name(newItemName.getText().toString())
    				.location(new location(newItemDorm.getText().toString()))
    				.price(Integer.parseInt(newItemPrice.getText().toString()));
    	
    	try {
    		equipment newEquip = currentUser.newEquipment(currentEquip);
			if( newEquip != null ){

	    		Builder alertDialog = new Builder(CRMS.this) ;
	     	    alertDialog.setMessage("新增成功").show();
				newItemEqid.setText(newEquip.id());
				
			}
			currentEquip = null;
			
		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	
    	
    }
    public void newEqBack(View cvView){
    	setContentView(R.layout.menu);
    }
    /*remove*/
    public void goRm(View cvView){
    	setContentView(R.layout.remove);
    }
    public void rmBack(View cvView){
    	setContentView(R.layout.menu);
    }
    public void removeQR(View cvView){
    	Intent intent = new Intent("com.google.zxing.client.android.SCAN");
        intent.putExtra("SCAN_MODE", "QR_CODE_MODE");
        startActivityForResult(intent, 2);
    }
    public void logout(View cvView){
    	setContentView(R.layout.main);
    }
    /*?????*/
    public void qbout(View cvView){
    	setContentView(R.layout.qbout);
    }
    /*Zxing QRcode scan*/
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		// TODO Auto-generated method stub
		super.onActivityResult(requestCode, resultCode, data);super.onActivityResult(requestCode, resultCode, data);
		/*startActivityForResult回傳值1*/
		/*query QR scan*/
		if (requestCode == 1) {	
			if (resultCode == RESULT_OK) {
				String contents = data.getStringExtra("SCAN_RESULT");	//取得QR Code內容
				setContentView(R.layout.query);
				EditText queryEqId = (EditText) findViewById(R.id.queEqid);
				queryEqId.setText(contents);
			}
		}
		/*remove QR scan*/
		else if (requestCode == 2) {	
			if (resultCode == RESULT_OK) {
				String contents = data.getStringExtra("SCAN_RESULT");	//取得QR Code內容
				setContentView(R.layout.remove);
				EditText removeEqId = (EditText) findViewById(R.id.rmEqId);
				removeEqId.setText(contents);
			}
		}
	}
    
}