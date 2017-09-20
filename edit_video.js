function valid()
{
	//var file=document.getElementById('file').value;
	//alert(file);
	/*if(file.length>0)
	{	
	 var ext=file.substring(file.lastIndexOf('.') + 1);
	 //alert(ext);
	 if(ext != "flv")
	 	{
	 	alert("Only .Flv AND Maximum 10 MB File Size Video File Allow");
	 	document.getElementById('file').focus();
	 	return false;
	 	}	
	}*/
	
	/*var v_type=document.getElementById('v_type').checked;	
	if(v_type==true)
	{
			document.getElementById('youtube_link').value="";
			//alert('you tube textarea empty');						
	}*/
	var youtube_type=document.getElementById('youtube_type').checked;
	if(youtube_type==true)
	{
			document.getElementById('file').value="";	
			var youtube_link=document.getElementById('youtube_link').value;
			if(youtube_link=="")
			{
		    alert("Please Enter YouTube URL Link");
			document.getElementById('youtube_link').focus();
	 		return false;	
			}
	}
	
	return true;
}