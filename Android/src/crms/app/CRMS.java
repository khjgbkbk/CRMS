package crms.app;

import java.io.IOException;
import java.text.ParseException;

import org.apache.http.client.ClientProtocolException;
import org.json.JSONException;
import android.app.Activity;
import android.app.AlertDialog.Builder;
import android.content.Intent;
import android.content.res.Configuration;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;
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
    	//	Spinner spinner_d = (Spinner) findViewById(R.id.newItemDorm);
        //	location tmp = (location) spinner_d.getSelectedItem();
        //  Builder alertDialog = new Builder(CRMS.this) ;
        //       alertDialog.setMessage(tmp.toString()).show();
    		if(currentUser.isLogined()){
    			setContentView(R.layout.menu);
    		}else{
    			setContentView(R.layout.main);
    			
    		}
            return (true);
        }
        if (keyCode == KeyEvent.KEYCODE_MENU) {
        //向左
        	if(currentUser.isLogined()){
    			setContentView(R.layout.menu);
    		}
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
				uidin.setText("");
				passwdin.setText("");
				currentUser = null;
				Builder alertDialog = new Builder(CRMS.this) ;
	     	    alertDialog.setMessage("帳號密碼錯誤").show();
	     	   
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
    
    /*query*/
    public void goQuery(View cvView){
    	setContentView(R.layout.query);
    }
    public void queryEnter(View cvView){

    	EditText uidin = (EditText) findViewById(R.id.queEqid);
    	
    	/*Set spinner*/
    	setContentView(R.layout.equipment);
    	Spinner spinnerDormList = (Spinner) findViewById(R.id.eqDorm);
		ArrayAdapter<location> adapter;
		try {
			adapter = new ArrayAdapter<location>(this,android.R.layout.simple_spinner_item,currentUser.getLocationList());
			adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			spinnerDormList.setAdapter(adapter);
		} catch (org.apache.http.ParseException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (JSONException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		
    	
		EditText eT1 = (EditText) findViewById(R.id.editText1);  //id
    	try {
    		eT1.setText("IN");
			equipment currentEquip = currentUser.getEquipment(uidin.getText().toString());
			if(currentEquip != null){
				EditText eT2 = (EditText) findViewById(R.id.editText2);	//name
				//EditText eT3 = (EditText) findViewById(R.id.editText3);	//dorm
				EditText eT4 = (EditText) findViewById(R.id.editText4);	//price
				eT1.setText(currentEquip.id());
				eT2.setText(currentEquip.name());
				//eT3.setText(currentEquip.location().toString());
				location [] tmpLocal = currentUser.getLocationList();
				int tmpLength = tmpLocal.length;
				int spinnerNum = 0;
				for(int i = 0;i<tmpLength;i++){
					if (currentEquip.location()._id == tmpLocal[i]._id){
						spinnerNum = i;
						break;
					}
				}
				spinnerDormList.setSelection(spinnerNum);
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
    public void equipEdit(View cvView){
    	
    	equipment currentEquip = new equipment();
    	
    	
    	EditText editItemName = (EditText) findViewById(R.id.editText2);
    	Spinner editItemDorm = (Spinner) findViewById(R.id.eqDorm);
    	EditText editItemEqid = (EditText) findViewById(R.id.editText1);
    	EditText editItemPrice = (EditText) findViewById(R.id.editText4);
    	currentEquip.id(editItemEqid.getText().toString())
    				.name(editItemName.getText().toString())
    				.location((location)editItemDorm.getSelectedItem())
    				.price(Integer.parseInt(editItemPrice.getText().toString()));
    	
    	try {
    		equipment newEquip = currentUser.putEquipment(currentEquip);
			if( newEquip != null ){

	    		Builder alertDialog = new Builder(CRMS.this) ;
	     	    alertDialog.setMessage("修改成功").show();
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
    public void equipExit(View cvView){
    	setContentView(R.layout.menu);
    }
    /*new item*/
    public void goNew(View cvView){
    	setContentView(R.layout.newitem);
    	
    	/*設定spinner*/
    	Spinner spinner_d = (Spinner) findViewById(R.id.newItemDorm);
		try {
	    	ArrayAdapter<location> adapter = new ArrayAdapter<location>(this,android.R.layout.simple_spinner_item,currentUser.getLocationList());
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
    	Spinner newItemDorm = (Spinner) findViewById(R.id.newItemDorm);
    	EditText newItemEqid = (EditText) findViewById(R.id.newItemEqid);
    	EditText newItemPrice = (EditText) findViewById(R.id.newItemPrice);
    	
    	currentEquip.name(newItemName.getText().toString())
    				.location((location)newItemDorm.getSelectedItem())
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
    public void rm(View cvView){
    	EditText rmEqId = (EditText) findViewById(R.id.rmEqId);
    	try {
			currentUser.deleteEquipment(rmEqId.getText().toString());
			Builder alertDialog = new Builder(CRMS.this) ;
     	    alertDialog.setMessage("刪除成功").show();
     	    rmEqId.setText("");
		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	
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
    /*listing*/
    public void goList(View cvView){
    	setContentView(R.layout.list);
    	
    	Spinner spinnerList = (Spinner) findViewById(R.id.spinner1);
		try {
			ArrayAdapter<location> adapter = new ArrayAdapter<location>(this,android.R.layout.simple_spinner_item,currentUser.getLocationList());
			adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			
			spinnerList.setAdapter(adapter);
			//spinner_d.getSelectedItemId();
			spinnerList.setOnItemSelectedListener(spinnerListener);
			
			//監聽下拉式選單 是否被選擇
			
    	
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
    public void listBack(View cvView){
    	setContentView(R.layout.menu);
    }

    public void onListSpinnerSelected() throws org.apache.http.ParseException, IOException, JSONException, ParseException{
    	Spinner spinnerList = (Spinner) findViewById(R.id.spinner1);
		ListView lvList = (ListView) findViewById(R.id.listView1);
		equipment [] eqList = currentUser.getEquipmentList((location)spinnerList.getSelectedItem());
		int eqLength = eqList.length;
		String str[] =new String[eqLength];
		for(int i=0;i<eqLength;i++){
			str[i] = eqList[i].name();			
		}
		
		ArrayAdapter<equipment> adapter = new ArrayAdapter<equipment>(this,android.R.layout.simple_list_item_1,eqList);
		//ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,str);
		
		lvList.setAdapter(adapter);	
    	
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
		/* remove QR scan */
		else if (requestCode == 2) {	
			if (resultCode == RESULT_OK) {
				String contents = data.getStringExtra("SCAN_RESULT");	//取得QR Code內容
				setContentView(R.layout.remove);
				EditText removeEqId = (EditText) findViewById(R.id.rmEqId);
				removeEqId.setText(contents);
			}
		}
	}
    
	private Spinner.OnItemSelectedListener spinnerListener= new Spinner.OnItemSelectedListener()
	{
	//如果被選擇
	public void onItemSelected(AdapterView<?>adapterView, View v, int position, long id)
	{
		try {
			onListSpinnerSelected();
		} catch (org.apache.http.ParseException e) {
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
		}
			
		
	}

	//若是沒有選擇任何項目
	public void onNothingSelected(AdapterView<?>adapterView)
	{
	}
	};
	
}