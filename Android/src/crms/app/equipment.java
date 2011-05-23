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
	public String toString(){
		return _name;
	}
	public location location(){
		return _Location;
	}
	public equipment location(location L){
		_Location = L;
		return this;
	}
	
	public String id(){return _id;}
	public equipment id(String s){_id = s;return this;}
	
	public String name(){return _name;}
	public equipment name(String s){_name=s;return this;}
	
	public int price(){return _price;}
	public equipment price(int s){_price=s;return this;}
	
	
	public Date date(){return _date;}
	public equipment date(String s) throws ParseException{
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
		_date= sdf.parse(s);
		return this;
	}
	public equipment date(Date d){_date=d;return this;}
	
	
	
	
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
