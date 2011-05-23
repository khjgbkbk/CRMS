package crms.app;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

import org.json.JSONException;
import org.json.JSONObject;


public class equipment {
	String _id;
	String _name;
	location _Location = null;
	int _price;
	Date _date;
	
	public equipment(JSONObject jsonObject) throws JSONException, ParseException {
		// TODO Auto-generated constructor stub
		//try{
		_id = jsonObject.getString("id");
		_name = jsonObject.getString("name");
		_Location = new location(jsonObject.getString("dorm"));
		String dateString = jsonObject.getString("date");
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
		//¶i¦æÂà´«
		_date = sdf.parse(dateString);
	}

}
