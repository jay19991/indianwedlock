function valid()
{
	var file=document.getElementById('photo4').value;
	if(file.length>0)
	{	
	var ext = file.substring(file.lastIndexOf('.') + 1);
	if(!(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG" || ext == "bmp" || ext == "BMP"))
		{
	alert("Only Image File Allow For Photo4");
	document.getElementById('photo4').focus();
	return false;
		}	
	}
	return true;
}