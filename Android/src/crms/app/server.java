package crms.app;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Pattern;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.protocol.HTTP;
import org.apache.http.util.EntityUtils;

public class server {
	public String test(){
		return "test";
		
	}
	public String getServerTest(){
		String URLs = "http://crmss.thepilabs.com/androidMain.php";
        HttpPost httpRequest = new HttpPost(URLs);
        /*
         * Post�B�@�ǰe�ܼƥ�����NameValuePair[]�}�C�x�s
         */
        List<NameValuePair> params = new ArrayList<NameValuePair>();

      //  params.add(new BasicNameValuePair("STUID", eText.getText().toString()));
       // params.add(new BasicNameValuePair("CLASS","2"));
        try
        {
            /* �o�XHTTP request */

            httpRequest.setEntity(new UrlEncodedFormEntity(params, HTTP.UTF_8));

            /* ���oHTTP response */
            HttpResponse httpResponse = new DefaultHttpClient()
                    .execute(httpRequest);

            /* �Y���A�X��200 ok */
            if (httpResponse.getStatusLine().getStatusCode() == 200)
            {
                /* ���X�^���r�� */
				String strResult = EntityUtils.toString(httpResponse.getEntity(),"BIG5");
				  
				 // �^�Ǧ^���r��
				return strResult;
                
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
	
}
