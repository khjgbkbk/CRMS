function send()
	{
	if( $("input[name='Equivid']").attr('value') == "" )
	{
		$('div#message').html('請輸入編號!');
		return;
	}
	$.ajax({
		url: 'androidMain.php/equipment/' + $("input[name='Equivid']").attr('value'),
		type: 'GET',
		dataType: "json",
		statusCode:{
			200:function(result){
				$('div#message').html('<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border"><tbody><tr>		<td>名稱</td><td>位置</td><td>編號</td><td>價錢</td><td>加入時間</td></tr><tr>  <td>'+result["name"]+'</td><td>'+result["building"]+'</td><td>'+result["id"]+'</td><td>'+result["price"]+'</td><td>'+result["date"]+'</td></tr></tbody></table>');
			
			
			}
		
		}
	});
}

var gCtx = null;
var gCanvas = null;
var imageData = null;
var c=0;
var stype=0;

var camhtml='  	<object  id="iembedflash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="320" height="240"> '+
  		'<param name="movie" value="camcanvas.swf" />'+
  		'<param name="quality" value="high" />'+
		'<param name="allowScriptAccess" value="always" />'+
  		'<embed  allowScriptAccess="always"  id="embedflash" src="swf/camcanvas.swf" quality="high" width="320" height="240" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" mayscript="true"  />'+
    '</object>';

function initCanvas(ww,hh)
{
    gCanvas = document.getElementById("qr-canvas");
    var w = ww;
    var h = hh;
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
    imageData = gCtx.getImageData( 0,0,320,240);
}

function passLine(stringPixels) { 

    var coll = stringPixels.split("-");

    for(var i=0;i<320;i++) { 
        var intVal = parseInt(coll[i]);
        r = (intVal >> 16) & 0xff;
        g = (intVal >> 8) & 0xff;
        b = (intVal ) & 0xff;
        imageData.data[c+0]=r;
        imageData.data[c+1]=g;
        imageData.data[c+2]=b;
        imageData.data[c+3]=255;
        c+=4;
    } 

    if(c>=320*240*4) { 
        c=0;
        gCtx.putImageData(imageData, 0,0);
        try{
            qrcode.decode();
        }
        catch(e){       
            console.log(e);
            setTimeout(captureToCanvas, 150);
        };
    } 
} 

function captureToCanvas() {
    flash = document.getElementById("embedflash");
    if(!flash)
        return;
    if(typeof(flash.ccCapture) != 'function')
		return;
	flash.ccCapture();
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}





function read(a)
{
    $('#Equivid').val(a);
	$("#outdiv").html("");
}	

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}



var KEY_ENTER = 13;
$(document).ready(function () 
{
	$('#Send').click(function()
	{
		send();
	});
	$('#btn_start').click(function(){
		if(isCanvasSupported() && window.File && window.FileReader)
		{
			initCanvas(320,240);
		}	
		if(stype==1)
		{
			qrcode.callback = read;
			setTimeout(captureToCanvas, 200);    
			return;
		}
		$("#outdiv").html(camhtml);
		stype=1;
		setTimeout(captureToCanvas, 200);
	});
	
		
	
});