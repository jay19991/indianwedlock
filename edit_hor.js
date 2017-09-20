function valid()
{
	var file=document.getElementById('file').value;
	if(file.length>0)
	{	
	var ext = file.substring(file.lastIndexOf('.') + 1);
	if(!(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG" || ext == "bmp" || ext == "BMP"))
		{
	alert("Only Image File Allow For Horoscope");
	document.getElementById('file').focus();
	return false;
		}	
	}
	return true;
}