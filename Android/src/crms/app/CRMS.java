package crms.app;

import android.app.Activity;
import android.os.Bundle;
import android.widget.TextView;

public class CRMS extends Activity {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        TextView tv = new TextView(this);
        user Client = new user("admin","admin");
        server CRMSserver = new server();
        if(Client.login(CRMSserver) == true){
        	tv.setText("Success");
        }else{
        	tv.setText("Fail");
        	
        }
        setContentView(tv);

    }
}