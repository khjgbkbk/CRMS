package crms.app;

public class location {
	int _id;
	String _name;
	String _desc;
	
	
	
	public location(String string) {
		_name = string;
	}
	
	public String toString(){
		return _name;
	}
	

}
