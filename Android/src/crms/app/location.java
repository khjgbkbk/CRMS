package crms.app;

import org.json.JSONException;
import org.json.JSONObject;

public class location {
	int _id;
	String _name;
	String _desc;
	
	
	
	
	
	public location(String string) {
		_name = string;
	}
	
	public location(JSONObject jsonObject) throws JSONException {
		_id = jsonObject.getInt("index");
		_name = jsonObject.getString("building");
		_desc = jsonObject.getString("desc");
	}


	public String toString(){
		return _name;
	}
	

}
