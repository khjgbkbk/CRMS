package crms.app;

import java.io.IOException;
import java.text.ParseException;

import org.apache.http.HttpResponse;
import org.apache.http.auth.UsernamePasswordCredentials;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.HttpParams;
import org.apache.http.util.EntityUtils;
import org.json.JSONException;
import org.json.JSONObject;


public class user {
	String _Username;
	String _Password;
	server _DefaultServer;
	Boolean _isLogined = false;

	public user() {
	}

	public user(String Username, String Password) {
		_Username = Username;
		_Password = Password;
	}

	public equipment getEquipment(String id) throws ClientProtocolException, IOException, JSONException, ParseException {
		HttpGet httpRequest 
			= new HttpGet(_DefaultServer.URLs + "/equipment/" + id);
			DefaultHttpClient HttpClient = new DefaultHttpClient();
			HttpClient.getCredentialsProvider().setCredentials(
					_DefaultServer._authScope,
					getUsernamePasswordCredentials());
			HttpResponse httpResponse = HttpClient.execute(httpRequest);

			/* 若狀態碼為200 ok */
			if (httpResponse.getStatusLine().getStatusCode() == 200) {
				/* 取出回應字串 */
				String strResult = EntityUtils.toString(httpResponse.getEntity());

		        return new equipment(new JSONObject(strResult));
			} else if (httpResponse.getStatusLine().getStatusCode() == 401) {
				return null;
			}else{
				return null;
			}
	}

	public equipment newEquipment(equipment equip) throws JSONException{
		if(equip == null){
			return null;
		}
		JSONObject json = new JSONObject();
		json.put("name", "value");
		
		
		
		return null;
	}
	
	public boolean login(server s) throws ClientProtocolException, IOException {
		HttpGet httpRequest = new HttpGet(s.URLs);
		/* 發出HTTP request */
			/* 取得HTTP response */
			DefaultHttpClient HttpClient = new DefaultHttpClient();
			HttpClient.getCredentialsProvider().setCredentials(
					s._authScope,
					getUsernamePasswordCredentials());
			HttpResponse httpResponse = HttpClient.execute(httpRequest);

			/* 若狀態碼為200 ok */
			if (httpResponse.getStatusLine().getStatusCode() == 200) {
				//登入成功
				_DefaultServer = s;
				_isLogined = true;

			} else if (httpResponse.getStatusLine().getStatusCode() == 401) {
				/* 取出回應字串 */
				// String strResult =
				// EntityUtils.toString(httpResponse.getEntity(),"BIG5");
				// 回傳回應字串
				_isLogined = false;
			}

		return _isLogined;
	}

	public Boolean isLogined() {
		return _isLogined;
	}

	public boolean newUser(user newer) throws ClientProtocolException, IOException, JSONException{
		HttpPost httpRequest = new HttpPost(_DefaultServer.URLs);
		/* 發出HTTP request */
			/* 取得HTTP response */
			DefaultHttpClient HttpClient = new DefaultHttpClient();
			HttpClient.getCredentialsProvider().setCredentials(
					_DefaultServer._authScope,
					getUsernamePasswordCredentials());
			
			JSONObject json = new JSONObject();
			json.put("username",newer._Username);
			json.put("Password",newer._Password);
			HttpParams params =new BasicHttpParams();
			params.setParameter("data", json.toString());
			httpRequest.setParams(params);
			HttpResponse httpResponse = HttpClient.execute(httpRequest);

			/* 若狀態碼為200 ok */
			if (httpResponse.getStatusLine().getStatusCode() == 200) {
				
				return true;

			} else if (httpResponse.getStatusLine().getStatusCode() == 401) {
				/* 取出回應字串 */
				// String strResult =
				// EntityUtils.toString(httpResponse.getEntity(),"BIG5");
				// 回傳回應字串
				return false;
			}
			return false;
	}
	
	private UsernamePasswordCredentials getUsernamePasswordCredentials() {
		return new UsernamePasswordCredentials(_Username, _Password);
	}

}
