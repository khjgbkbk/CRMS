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
        server servers = new server();
        TextView tv = new TextView(this);
        tv.setText(servers.getServerTest());
        setContentView(tv);

    }
}