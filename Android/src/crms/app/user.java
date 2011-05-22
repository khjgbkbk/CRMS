package crms.app;

import org.apache.http.auth.UsernamePasswordCredentials;

public class user {
	String _Username;
	String _Password;
	public user(){}
	public user(String Username,String Password){
		_Username = Username;
		_Password = Password;
	}
	
	public UsernamePasswordCredentials getUsernamePasswordCredentials(){
		return new UsernamePasswordCredentials(_Username,_Password);
	}
	
}
