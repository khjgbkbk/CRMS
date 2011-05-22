package crms.app;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.auth.AuthScope;
import org.apache.http.auth.UsernamePasswordCredentials;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.protocol.HTTP;
import org.apache.http.util.EntityUtils;

public class server {

	String URLs = "http://crmss.thepilabs.com/androidMain.php";
	
	
	public user userLogin(user u){
		
		
		return new user();
	}
	
	public String test(){
		return "test";
		
	}
	
	
	public String getServerTest(){
        HttpPost httpRequest = new HttpPost(URLs);
        /*
         * Post運作傳送變數必須用NameValuePair[]陣列儲存
         */
        List<NameValuePair> params = new ArrayList<NameValuePair>();

      //  params.add(new BasicNameValuePair("STUID", eText.getText().toString()));
       // params.add(new BasicNameValuePair("CLASS","2"));
        try
        {
            /* 發出HTTP request */

            httpRequest.setEntity(new UrlEncodedFormEntity(params, HTTP.UTF_8));

            /* 取得HTTP response */
            DefaultHttpClient HttpClient = new DefaultHttpClient();
            HttpClient.getCredentialsProvider().setCredentials(
    		new AuthScope("crmss.thepilabs.com",80),
    		new UsernamePasswordCredentials("admin", "admin"));
             HttpResponse httpResponse = HttpClient.execute(httpRequest);

            /* 若狀態碼為200 ok */
            if (httpResponse.getStatusLine().getStatusCode() == 200)
            {
                /* 取出回應字串 */
				String strResult = EntityUtils.toString(httpResponse.getEntity(),"BIG5");
				  
				 // 回傳回應字串
				return strResult;
                
            }else if(httpResponse.getStatusLine().getStatusCode() == 401){
                /* 取出回應字串 */
				String strResult = EntityUtils.toString(httpResponse.getEntity(),"BIG5");
				  
				 // 回傳回應字串
				return "PWERROR" + strResult;
            	
            	
            }
 
        } catch (ClientProtocolException e)
        {
       //     Toast.makeText(this, e.getMessage().toString(), Toast.LENGTH_SHORT)
        //            .show();
            e.printStackTrace();
        } catch (IOException e)
        {
        //    Toast.makeText(this, e.getMessage().toString(), Toast.LENGTH_SHORT)
         //           .show();
            e.printStackTrace();
        } catch (Exception e)
        {
        //    Toast.makeText(this, e.getMessage().toString(), Toast.LENGTH_SHORT)
        //            .show();
            e.printStackTrace();

        }
		return "test";
		
	}
	
	//public User
	
}
