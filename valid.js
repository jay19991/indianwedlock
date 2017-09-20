// JavaScript Document

function checkall()
	{
	
		for(i=0;i<document.form1.elements.length;i++)
		{
			if(document.form1.elements[i].type=="checkbox")
			{
				document.form1.elements[i].checked="true";
			}		
		}
	}
function checknone()
	{
		for(i=0;i<document.form1.elements.length;i++)
		{
			if(document.form1.elements[i].type=="checkbox" && document.form1.elements[i].checked)
			{
				document.form1.elements[i].checked="";
			}		
		}
	}

function deleteall(state,name)
	{
		
		count=1;
		con="";
		for(i=0;i<document.form1.elements.length;i++)
		{
			if(document.form1.elements[i].type=="checkbox" && document.form1.elements[i].checked && document.form1.elements[i].id!="other")
			{
				count=0;
			}		
		}
		var flag=1;		
		if(count)
		{
			alert("Please Select At least One Checkbox")
			flag=0;
		}
		else
		{
			
			for(i=0;i<document.form1.elements.length;i++)
			{
				if(document.form1.elements[i].type=="checkbox" && document.form1.elements[i].checked && document.form1.elements[i].id!="other")
				{
					con=con+document.form1.elements[i].value+","
				}		
			}	
		}

		var msg="";
		if(state==1)
		{
			msg="Are you sure you want to Delete";
		}
		else if(state==2)
		{
			msg="Are you sure you want to Activate Status";
		}
		else if(state==3)
		{
			msg="Are you sure you want to Inactivate Status";
		}
		
		if(flag==1 && confirm(msg))
		{
			document.form1.id.value=con

			if(state==1)
			{
				document.form1.action=name+"?submit=submit1&name="+name;
				document.form1.submit();
			}
			else if(state==2)
			{
				document.form1.action=name+"?submit=submit2&name="+name;
				document.form1.submit();
			}
			else if(state==3)
			{
				document.form1.action=name+"?submit=submit3&name="+name;
				document.form1.submit();
			}
			
		}		
	}	
	

