<?php
session_start();
include('../connect/config2.php');
require_once('../BusinessLogic/class.register.php');
include("secure.php");

    require_once ('../BusinessLogic/class.mothertongue.php');
	require_once ('../BusinessLogic/class.religion.php');
	require_once ('../BusinessLogic/class.edu_detail.php');
	require_once ('../BusinessLogic/class.occupation.php');
	require_once ('../BusinessLogic/class.city.php');
	require_once ('../BusinessLogic/class.country.php');
	require_once ('../BusinessLogic/class.caste.php');
	require_once ('../BusinessLogic/class.register.php');
	require_once ('../BusinessLogic/class.state.php');
	

	$mt22=new mothertongue();
	$rescn2=$mt22->get_mtongue_by_status();
	$r5=new religion();
	$rel2=$r5->get_religion_by_status();
	$e=new edu_detail();

	$sql="select * from religion order by religion_name";
	$data=mysql_query($sql);

	$result=mysql_num_rows($data);
	$edu=$e->get_edu_by_status();
	$o=new occupation();
	$oc=$o->get_ocp_by_status();
	$co=new country();
	$coun1=$co->get_country_by_status();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script language="javascript" src="../js/timepicker.js"></script>

<style>
.forminput
{
width:300px;
height:25px;
line-height:22px;
border:1px solid #666666;
}
.forminput1 {width:300px;
height:25px;
line-height:22px;
border:1px solid #666666;
}
</style>
<script language="javascript" type="text/javascript">
function getXMLHTTP() 
{ //fuction to return the xml http object
		var xmlhttp=false;	
		try
		{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	
		{		
			try
			{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				try
				{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1)
				{
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
}
	
	function getCaste(strURL) 
{
		var req4 = getXMLHTTP();		
		if (req4) 
		{
			req4.onreadystatechange = function() 
			{
					if (req4.readyState == 4) 
					{
						if(req4.status == 200) 
						{						
						document.getElementById('castediv').innerHTML=req4.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
						}
					}				
			}			
			req4.open("GET", strURL, true);
			req4.send(null);
		}				
}
	function getCaste2(strURL) 
{
		var req4 = getXMLHTTP();		
		if (req4) 
		{
			req4.onreadystatechange = function() 
			{
					if (req4.readyState == 4) 
					{
						if(req4.status == 200) 
						{						
						document.getElementById('castediv2').innerHTML=req4.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
						}
					}				
			}			
			req4.open("GET", strURL, true);
			req4.send(null);
		}				
}

	function getState(strURL) 
{
		var req4 = getXMLHTTP();		
		if (req4) 
		{
			req4.onreadystatechange = function() 
			{
					if (req4.readyState == 4) 
					{
						if(req4.status == 200) 
						{						
						document.getElementById('statediv').innerHTML=req4.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
						}
					}				
			}			
			req4.open("GET", strURL, true);
			req4.send(null);
		}				
}

function getCity(strURL) 
{
		var req5 = getXMLHTTP();		
		if (req5) 
		{
			req5.onreadystatechange = function() 
			{
					if (req5.readyState == 4) 
					{
						if (req5.status == 200) 
						{						
						document.getElementById('citydiv').innerHTML=req5.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req5.statusText);
						}
					}				
			}			
			req5.open("GET", strURL, true);
			req5.send(null);
		}				
}

	function getLoc(strURL) 
{
		var req4 = getXMLHTTP();		
		if (req4) 
		{
			req4.onreadystatechange = function() 
			{
					if (req4.readyState == 4) 
					{
						if(req4.status == 200) 
						{						
						document.getElementById('locdiv').innerHTML=req4.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
						}
					}				
			}			
			req4.open("GET", strURL, true);
			req4.send(null);
		}				
}
</script>
<script language="javascript1.1">
function HaveChildnp()
	{
//		var MARST = document.MatriForm.MARITAL_STATUS.options[document.MatriForm.MARITAL_STATUS.selectedIndex].value;

        var CHILDLW = document.MatriForm.tot_children.options[document.MatriForm.tot_children.selectedIndex].value;

		
		if(document.MatriForm.m_status[0].checked)
		{
		document.MatriForm.tot_children.disabled=true;	
		document.MatriForm.status_children[0].disabled=true;		
		document.MatriForm.status_children[1].disabled=true;									
	    }
		 else if ( document.MatriForm.m_status[1].checked || document.MatriForm.m_status[2].checked  || document.MatriForm.m_status[3].checked  || document.MatriForm.m_status[4].checked)
		{
		document.MatriForm.tot_children.disabled=false;			
		document.MatriForm.status_children[0].disabled=false;		
		document.MatriForm.status_children[1].disabled=false;											
		}
		
		
		
		if(document.MatriForm.m_status[0].checked && document.MatriForm.status_children[0].checked || document.MatriForm.status_children[1].checked)
		{
		document.MatriForm.status_children[0].disabled=true;		
		document.MatriForm.status_children[1].disabled=true;											
		}
		

		if(CHILDLW > 0)
		{
			if ( document.MatriForm.m_status[0].checked)
			{
					if ( (document.MatriForm.status_children[0].checked || document.MatriForm.status_children[1].checked) && (!document.MatriForm.status_children[0].checked || !document.MatriForm.status_children[1].checked) )
					{
							document.MatriForm.status_children[0].checked=false;
							document.MatriForm.status_children[1].checked=false;
							document.MatriForm.status_children[0].disabled=true;		
							document.MatriForm.status_children[1].disabled=true;	
					}
					
			}
		}

		if(CHILDLW == 0)
		{
		document.MatriForm.status_children[0].disabled=true;		
		document.MatriForm.status_children[1].disabled=true;							
	    }
			 
		else if ( CHILDLW > 1)
		{
		document.MatriForm.status_children[0].disabled=false;		
		document.MatriForm.status_children[1].disabled=false;							
		}
}
</script>
<script type="text/javascript" language="javascript" src="js/dynamic-lists-date.js"></script>
<script language="javascript" src="js/timepicker.js"></script>
<script language="javascript">
function falive_t()
{
	if(document.getElementById('alive').checked==true)
	{
	document.getElementById('fathername').disabled=false;
	document.getElementById('father_occupation').disabled=false;
	}			
}
function falive_t1()
{
	if(document.getElementById('no_alive').checked==true)
	{
	document.getElementById('fathername').disabled=true;
	document.getElementById('father_occupation').disabled=true;	
	}	
}

function falive_t2()
{
	if(document.getElementById('malive').checked==true)
	{
	document.getElementById('mother_name').disabled=false;
	document.getElementById('mother_occupation').disabled=false;
	}			
}
function falive_t3()
{
	if(document.getElementById('mno_alive').checked==true)
	{
	document.getElementById('mother_name').disabled=true;
	document.getElementById('mother_occupation').disabled=true;	
	}	
}
function changeinterest()
{
	var s=document.getElementById('interest').selectedIndex;	
	var g=document.getElementById("interest").options;
	if(g[s].value=="other")
	{
	document.getElementById('other_interest').disabled=false;	
	}
	else
	{
	document.getElementById('other_interest').disabled=true;	
	}
}

function changehobby()
{
	var m=document.getElementById('hobby').selectedIndex;	
	var t=document.getElementById("hobby").options;
	if(t[m].value=="other")
	{
	document.getElementById('other_hobby').disabled=false;	
	}
	else
	{
	document.getElementById('other_hobby').disabled=true;	
	}
}
</script>
<script language="JavaScript">
<!--
function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>



<script language="javascript" type="text/javascript">

// Function to validate all the inputs
	function Validate()
	{
		var MatriForm = this.document.MatriForm;
		
		
		// Check the Name field
		if ( MatriForm.fname.value == "" )
		{
			alert("Please Enter First name.");
			MatriForm.fname.focus();
			return false;
		}
		if(MatriForm.fname.value.length>0)			 
		{
			var reg_fname=/^([a-zA-Z]+\s){0,4}[a-zA-Z]+$/;				
			if(!reg_fname.test(MatriForm.fname.value))
			{
			alert("Please Enter Valid First Name");
			MatriForm.fname.focus();
			return false;
			}
		}
		


 

if ( MatriForm.lname.value == "" )
		{
			alert( "Please Enter Lastname." );
			MatriForm.lname.focus( );
			return false;
		}
		if(MatriForm.lname.value.length>0)			 
		{
			var reg_last=/^([a-zA-Z]+\s){0,4}[a-zA-Z]+$/;				
			if(!reg_last.test(MatriForm.lname.value))
			{
			alert("Please Enter Valid Last Name");
			MatriForm.lname.focus();
			return false;
			}
		}



		// Check gender field
		if ( !MatriForm.gender[0].checked && !MatriForm.gender[1].checked)
		{
			//alert( "Please select the gender." );
			//alert("Welcome "  txtName "\nHow are we today");
			alert("Please Select Gender.");
			MatriForm.gender[0].focus( );
			return false;
		}
		
			
      if (document.MatriForm.theyear.options[document.MatriForm.theyear.selectedIndex].text=="-Year-")	
			  	{
				  	alert("Select Year");
					MatriForm.theyear.focus();
					return false;
			  	}
			  if (document.MatriForm.themonth.options[document.MatriForm.themonth.selectedIndex].text=="-Month-")	
			  	{
				  	alert("Select Month");
					MatriForm.themonth.focus();
					return false;
			  	}
			 if (document.MatriForm.theday.selectedIndex=="-Date-")		
			  	{
				  	alert("Select Day");
					MatriForm.theday.focus();
					return false;
			  	}
		
		
		
		// Check Marital Status
		if ( !MatriForm.m_status[0].checked && !MatriForm.m_status[1].checked && !MatriForm.m_status[2].checked && !MatriForm.m_status[3].checked)
		{
			alert( "Please Select the Marital Status." );
			MatriForm.m_status[0].focus( );
			return false;
		}
		
		

		if ( !(document.MatriForm.m_status[0].checked) && MatriForm.tot_children.selectedIndex == 0 )
		{
			alert( "Please Select Number Of Children" );
			MatriForm.tot_children.focus( );
			return false;
		}		
		
		if(document.getElementById('tot_children').selectedIndex>1)
		{
			a=document.getElementById('status_children').checked;			
			b=document.getElementById('status_children1').checked;
			if((a==false)&&(b==false))
			{
			alert("Please Indicate Whether Child /Children is/are living with you.");
			document.getElementById('status_children').focus();
			return false;
			}
		
		}
		
		
		
		// Check Language
		if ( MatriForm.mtongue.selectedIndex == 0 )
		{
			alert( "Please Select your mothertongue." );	
			MatriForm.mtongue.focus( );
			return false;
		}
		
		// Check Religion
		if ( MatriForm.religion_id.selectedIndex == 0 )
		{
			alert( "Please Select your Religion." );	
			MatriForm.religion_id.focus( );
			return false;
		}
		
		// Check Caste
		if ( MatriForm.caste_id.selectedIndex == 0 )
		{
			alert( "Please Select your Caste." );	
			MatriForm.caste_id.focus( );
			return false;
		}
		
	
		// Check E-mail field
		if( MatriForm.email.value == "" )
		{
			alert( "Please Enter E-mail ID." );
			MatriForm.email.focus( );
			return false;
		}
		if( MatriForm.email.value.length>0)
		{
			var expression=/^([a-zA-Z0-9\-\._]+)@(([a-zA-Z0-9\-_]+\.)+)([a-z]{2,5})$/;
			if (!expression.test(document.MatriForm.email.value))
			{
      		alert("Please Enter Invalid Email-Id");
      		document.MatriForm.email.focus();
      		return false;
 			}
		}
		

	
// Check Password 
		if ( MatriForm.password.value == "" )
		{
			alert( "Please Enter A Password." );
			MatriForm.password.focus( );
			return false;
		}
		
		if ( MatriForm.password.value.length < 4 )
		{
			alert( "Password Must Be At Least 4 Characters." );	
			MatriForm.password.focus( );
			return false;
		}

		if ( MatriForm.cpassword.value == "" )
		{
			alert( "Please Enter A Confirm Password." );
			MatriForm.cpassword.focus( );
			return false;
		}

		if ( MatriForm. password.value != MatriForm. cpassword.value )
		{
			alert( "Confirm Password Did Not Match." );
			//MatriForm.password.value = "";
			MatriForm.cpassword.value = "";

			MatriForm.cpassword.focus( );

			return false;
		}
		
	// Check Education
		if ( MatriForm.education.selectedIndex == 0 )
		{
			alert( "Please Select Education." );	
			MatriForm.education.focus( );
			return false;
		}
		
		// Check Edu details
		if ( MatriForm.edu_detail.selectedIndex == 0 )
		{
			alert( "Please Select Education Details" );	
			MatriForm.edu_detail.focus( );
			return false;
		}
		
		
		// Check Occupation
		if ( MatriForm.occupation.value == "" )
		{
			alert( "Please Select Occupation." );	
			MatriForm.occupation.focus( );
			return false;
		}
		
		// Check Employed in
		if ( MatriForm.emp_in.selectedIndex == 0 )
		{
			alert( "Please Select Employed In Status." );	
			MatriForm.emp_in.focus( );
			return false;
		}
		
		// Check Weight
		if ( MatriForm.weight.selectedIndex == 0 )
		{
			alert( "Please Select Weight." );	
			MatriForm.weight.focus( );
			return false;
		}
		
		// Check Height
		if ( MatriForm.height.selectedIndex == 0 )
		{
			alert( "Please Select Height." );	
			MatriForm.height.focus( );
			return false;
		}
		
		
		
		
		// Check Blood Group
		if ( MatriForm.b_group.selectedIndex == 0 )
		{
			alert( "Please Select Blood Group." );	
			MatriForm.b_group.focus( );
			return false;
		}
	
		
		
		// Check Complexion
		if ( MatriForm.complexion.selectedIndex == 0 )
		{
			alert( "Please Select Complexion." );	
			MatriForm.complexion.focus( );
			return false;
		}
		
		
		// Check Address 
		if ( MatriForm.address.value == "" )
		{
			alert( "Please Enter Address." );
			MatriForm.address.focus( );
			return false;
		}
	
	   if ( MatriForm.country_id.selectedIndex == 0 )
		{
			alert( "Please Select Country" );	
			MatriForm.country_id.focus( );
			return false;
		}
		
		if ( MatriForm.state_id.selectedIndex == 0 )
		{
			alert( "Please Select State" );	
			MatriForm.state_id.focus( );
			return false;
		}
		
		if ( MatriForm.city_id.selectedIndex == 0 )
		{
			alert( "Please Select City" );	
			MatriForm.city_id.focus();
			return false;
		}
	
		var cc=document.getElementById('txtCC').value;
		var ac=document.getElementById('txtAC').value;
		var phone=document.getElementById('phone').value;
		if((cc.length==0)||(ac.length==0)||(phone.length==0))
		{
			alert( "Please Enter Valid Phone Number");	
			document.getElementById('txtCC').focus();
			return false;
		}
		if((cc.length>0)&&(ac.length>0)&&(phone.length>0))
		{
			if((cc.length<2)||(cc.length>3))
			{
			alert( "Please Check Country Code. Minimum 2 And Maximum 3 Allow");	
			document.getElementById('txtCC').focus();
			return false;
			}
			if((cc.length>2)||(cc.length<3))
			{
				var h=/[^0-9\+]/;
				if(cc.match(h)!=null)
				{
				alert( "Please Enter Valid Country Code");	
				document.getElementById('txtCC').focus();
				return false;
				}
			}
			
			if((ac.length<2)||(ac.length>5))
			{
			alert( "Please Check Area Code. Minimum 2 And Maximum 5 Allow");	
			document.getElementById('txtAC').focus();
			return false;
			}
			if((ac.length>2)||(ac.length<5))
			{
				var h1=/[^0-9]/;
				if(ac.match(h1)!=null)
				{
				alert( "Please Enter Valid Area Code");	
				document.getElementById('txtAC').focus();
				return false;
				}
			}
			if((phone.length<8)||(phone.length>11))
			{
			alert( "Please Check Phone Number. Minimum 8 And Maximum 11 Allow");	
			document.getElementById('phone').focus();
			return false;
			}
			if((phone.length>8)||(phone.length<11))
			{
				var h2=/[^0-9]/;
				if(phone.match(h2)!=null)
				{
				alert( "Please Enter Valid Phone Number");	
				document.getElementById('phone').focus();
				return false;
				}
			}
			
		}
		var g=document.getElementById('mobile').value;
		if(g.length>0)
		{
		  if((g.length<10)||(g.length>13))
		  {
		   	alert( "Please Check Mobile Number. Minimum 10 And Maximum 13 Allow");	
			document.getElementById('mobile').focus();
			return false;		
		  }
		  else
		  {
		  	var h3=/[^0-9]/;
			if(g.match(h3)!=null)
			{
			alert( "Please Enter Valid Mobile Number");	
			document.getElementById('mobile').focus();
			return false;
			}
		  }		  
	}
if ( MatriForm.txtmsg.value == "" )
		{
			alert( "Please Enter Profile." );
			MatriForm.txtmsg.focus();
			return false;
		}


     if ( MatriForm.txtmsg.value.length < 50 )
		{
			alert( "Profile must be atleast 50 characters." );	
			MatriForm.txtmsg.focus();
			return false;
		}
		
		// Profile Max Chars
		if ( MatriForm.txtmsg.value.length > 1000 )
		{
			alert( "Please do not enter more than 1000 characters." );	
			MatriForm.txtmsg.focus();
			return false;
		}

  
   if ( !MatriForm.looking_for[0].checked && !MatriForm.looking_for[1].checked && !MatriForm.looking_for[2].checked && !MatriForm.looking_for[3].checked)
		{
			alert( "Please Select the Looking for." );
			MatriForm.looking_for[0].focus();
			return false;
		}
		
		
		if ( MatriForm.city1.selectedIndex == 0 )
		{
			alert( "Please Select Country living of Your Partner." );	
			MatriForm.city1.focus();
			return false;
		}
		
		// Check Religion
		if ( MatriForm.religion_id1.selectedIndex == 0 )
		{
			alert( "Please Select Religion Of Your Partner." );	
			MatriForm.religion_id1.focus();
			return false;
		}
		
		// Check Caste
		if ( MatriForm.caste_id1.selectedIndex == 0 )
		{
			alert( "Please Select Caste." );	
			MatriForm.caste_id1.focus();
			return false;
		}
	
	if(!(MatriForm.terms.checked) )
		{
		alert("Please read and accept the terms and conditions.");
			return false;
		} 			
return true;

}
</script>
</head>

<body><center>
	<div id="main">
    	<div id="header">
        	<?php include('header.php'); ?>
        </div>
        <div id="menu">
        	<?php include('menu.php'); ?>
        </div>
        <div id="content" style="float:left;">

        <table width="1000px" align="left">
        <tr>
            <td style="border:none;">&nbsp;</td>
          </tr>
        	<tr>
            	<td align="left" style="border:none;">
               <span class="red_text">Add Member Details</span>                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form action="add_member_submit.php" method="post" name="MatriForm"  onsubmit="return Validate()" >
					  <table style="border:solid 5px #7e0000;" width="1000px">
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Basic Information </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> First Name: </span> </td>
                          <td width="723" style="padding-left:10px;"><input name="fname" type="text" class="forminput1" id="fname" />                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Last Name: </span> </td>
                          <td style="padding-left:10px;"><input name="lname" type="text" class="forminput1" id="lname" />                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Gender: </span> </td>
                          <td style=" font-size:13px; padding-left:10px;"  class="text"><input name="gender" type="radio"  value="Male" id="gender" />
                            Male&nbsp;&nbsp;&nbsp;
                            <input name="gender" type="radio"  value="Female" id="gender" />
                            Female </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Date of Birth: </span> </td>
                          <td style="padding-left:10px;"><select id="theyear" name="theyear" class="verdana_13" onchange="get_days_of_month();" style="width:25%">
                              <option value="" selected="selected">-Year-</option>
                              <?php
    include("get-years.php");
?>
                            </select>
                            &nbsp;
                            <select id="themonth" name="themonth" class="verdana_13" onchange="get_days_of_month();" style="width:25%">
                              <option value="" selected="selected">-Month-</option>
                              <?php
    include("get-months.php");
?>
                            </select>
                            &nbsp;
                            <select id="theday" name="theday" class="verdana_13" style="width:25%">
                              <option value="" selected="selected">-Date-</option>
                              <?php
	 include("calculate-days.php");
	?>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Marital Status: </span> </td>
                          <td style="font-size:13px; padding-left:10px;" class="text"><input name="m_status" type="radio"  value="Unmarried" onclick="return HaveChildnp(this)" />
                            Unmarried&nbsp;&nbsp;&nbsp;
                            <input name="m_status" type="radio"  value="Widow/Widower" onclick="return HaveChildnp(this)" />
                            Widow/Widower &nbsp;
                            <input name="m_status" type="radio"  value="Divorcee" onclick="return HaveChildnp(this)" />
                            Divorcee&nbsp;&nbsp;&nbsp;
                            <input name="m_status" type="radio"  value="Separated" onclick="return HaveChildnp(this)" />
                            Separated </td>
                        </tr>
                        <tr>
                          <td height="40" width="257">&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:13px; padding-left:5px;"> No. of Children: </span> </td>
                          <td style="padding-left:10px;"><select name="tot_children" id="tot_children" size=1 class="forminput1" onchange="return HaveChildnp(this)">
                            <option value="" selected>- Select -</option>
                            <option value=0>None</option>
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                            <option value="Three">Three</option>
                            <option value="Four and above">4 and above</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td height="40" width="257">&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:13px; padding-left:5px;"> Children Living Status: </span> </td>
                          <td style="font-size:13px; padding-left:10px;"  class="text" ><input  name="status_children" id="status_children" type="radio"  value="Yes" />
                            Living with me&nbsp;
                            <input name="status_children" type="radio" id="status_children1" onfocus="if(disabled)blur();" value="No" />
                            Not living with me </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Mother Tongue: </span> </td>
                          <td style="padding-left:10px;" class="text"><select name="mtongue" id="mtongue" class="forminput1">
                              <option value="">Select Mothertongue</option>
                              <?php
								while($row=mysql_fetch_array($rescn2))
								{
							?>
                              <option value="<?php echo $row['mtongue_id']; ?>"><?php echo $row['mtongue_name']; ?></option>
                              <?php
								}
							?>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Religion: </span> </td>
                          <td style="padding-left:10px;"><select name="religion_id" id="religion_id" class="forminput1" onchange="getCaste('../select_caste.php?religion_id='+this.value)">
                              <option value="0">Select Religion</option>
                             
                              <?php
								while($row22=mysql_fetch_array($data))
								{
							?>
                              
                              <option value="<?php echo $row22['religion_id']; ?>"><?php echo $row22['religion_name']; ?></option>
                              <?php
								}
							?>
                          </select></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Caste: </span> </td>
                          <td id="castediv" style="padding-left:10px;"><select name="caste_id" id="caste_id" class="forminput1" >
                              <option value="0">Choose Caste</option>
                            </select>                          </td>
                        </tr>
                       
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Account Information </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Email ID: </span> </td>
                          <td style="padding-left:10px;"><input name="email" type="text" class="forminput1" id="email" />                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Password: </span> </td>
                          <td style="padding-left:10px;"><input name="password" type="password" class="forminput1" id="password" />                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Confirm Password: </span> </td>
                          <td style="padding-left:10px;"><input name="cpassword" type="password" class="forminput1" id="cpassword" />                          </td>
                        </tr>
                        
                        
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Education and Occupation </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Education: </span> </td>
                          <td style="padding-left:10px;"><select name="education" class="forminput1" id="education" >
                              <option value="" selected>- Select -</option>
                              <option value="Bachelors">Bachelors</option>
                              <option value="Masters">Masters</option>
                              <option value="Doctorate">Doctorate</option>
                              <option value="Diploma">Diploma</option>
                              <option value="Undergraduate">Undergraduate</option>
                              <option value="Associates degree">Associates degree</option>
                              <option value="Honours degree">Honours degree</option>
                              <option value="Trade school">Trade school</option>
                              <option value="High school">High school</option>
                              <option value="Less than high school">Less than high school</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Education Details: </span> </td>
                          <td style="padding-left:10px;"><select name="edu_detail" id="edu_detail" class="forminput1">
                              <option value="">Select </option>
                              <?php
                                            while($e=mysql_fetch_array($edu))
                                            {
                                        ?>
                              <option value="<?php echo $e['edu_id']; ?>"><?php echo $e['edu_name']; ?></option>
                              <?php
                                            }
                                        ?>
                            </select>                          </td>
                        </tr>
                       
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Occupation: </span> </td>
                          <td style="padding-left:10px;"><select name="occupation" id="occupation" class="forminput1">
                              <option value="">Select </option>
                              <?php
                                            while($occ=mysql_fetch_array($oc))
                                            {
                                        ?>
                              <option value="<?php echo $occ['ocp_id']; ?>"><?php echo $occ['ocp_name']; ?></option>
                              <?php
                                            }
                                        ?>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Employed in: </span> </td>
                          <td style="padding-left:10px;"><select name="emp_in" class="forminput1" id="emp_in">
                              <option value="" selected>- Select -</option>
                              <option value="Business">Business</option>
                              <option value="Defence">Defence</option>
                              <option value="Government">Government</option>
                              <option value="Not Employed in">Not Employed in</option>
                              <option value="Private">Private</option>
                              <option value="Others">Others</option>
                            </select>                          </td>
                        </tr>
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Physical Attributes </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Weight: </span> </td>
                          <td style="padding-left:10px;"><select name="weight" class="forminput1" id="weight">
                              <option value="0" selected="selected">- Select -</option>
                              <option value="41 kg">41 kg</option>
                              <option value="42 kg">42 kg</option>
                              <option value="43 kg">43 kg</option>
                              <option value="44 kg">44 kg</option>
                              <option value="45 kg">45 kg</option>
                              <option value="46 kg">46 kg</option>
                              <option value="47 kg">47 kg</option>
                              <option value="48 kg">48 kg</option>
                              <option value="49 kg">49 kg</option>
                              <option value="50 kg">50 kg</option>
                              <option value="51 kg">51 kg</option>
                              <option value="52 kg">52 kg</option>
                              <option value="53 kg">53 kg</option>
                              <option value="54 kg">54 kg</option>
                              <option value="55 kg">55 kg</option>
                              <option value="56 kg">56 kg</option>
                              <option value="57 kg">57 kg</option>
                              <option value="58 kg">58 kg</option>
                              <option value="59 kg">59 kg</option>
                              <option value="60 kg">60 kg</option>
                              <option value="61 kg">61 kg</option>
                              <option value="62 kg">62 kg</option>
                              <option value="63 kg">63 kg</option>
                              <option value="64 kg">64 kg</option>
                              <option value="65 kg">65 kg</option>
                              <option value="66 kg">66 kg</option>
                              <option value="67 kg">67 kg</option>
                              <option value="68 kg">68 kg</option>
                              <option value="69 kg">69 kg</option>
                              <option value="70 kg">70 kg</option>
                              <option value="71 kg">71 kg</option>
                              <option value="72 kg">72 kg</option>
                              <option value="73 kg">73 kg</option>
                              <option value="74 kg">74 kg</option>
                              <option value="75 kg">75 kg</option>
                              <option value="76 kg">76 kg</option>
                              <option value="77 kg">77 kg</option>
                              <option value="78 kg">78 kg</option>
                              <option value="79 kg">79 kg</option>
                              <option value="80 kg">80 kg</option>
                              <option value="81 kg">81 kg</option>
                              <option value="82 kg">82 kg</option>
                              <option value="83 kg">83 kg</option>
                              <option value="84 kg">84 kg</option>
                              <option value="85 kg">85 kg</option>
                              <option value="86 kg">86 kg</option>
                              <option value="87 kg">87 kg</option>
                              <option value="88 kg">88 kg</option>
                              <option value="89 kg">89 kg</option>
                              <option value="90 kg">90 kg</option>
                              <option value="91 kg">91 kg</option>
                              <option value="92 kg">92 kg</option>
                              <option value="93 kg">93 kg</option>
                              <option value="94 kg">94 kg</option>
                              <option value="95 kg">95 kg</option>
                              <option value="96 kg">96 kg</option>
                              <option value="97 kg">97 kg</option>
                              <option value="98 kg">98 kg</option>
                              <option value="99 kg">99 kg</option>
                              <option value="100 kg">100 kg</option>
                              <option value="101 kg">101 kg</option>
                              <option value="102 kg">102 kg</option>
                              <option value="103 kg">103 kg</option>
                              <option value="104 kg">104 kg</option>
                              <option value="105 kg">105 kg</option>
                              <option value="106 kg">106 kg</option>
                              <option value="107 kg">107 kg</option>
                              <option value="108 kg">108 kg</option>
                              <option value="109 kg">109 kg</option>
                              <option value="110 kg">110 kg</option>
                              <option value="111 kg">111 kg</option>
                              <option value="112 kg">112 kg</option>
                              <option value="113 kg">113 kg</option>
                              <option value="114 kg">114 kg</option>
                              <option value="115 kg">115 kg</option>
                              <option value="116 kg">116 kg</option>
                              <option value="117 kg">117 kg</option>
                              <option value="118 kg">118 kg</option>
                              <option value="119 kg">119 kg</option>
                              <option value="120 kg">120 kg</option>
                              <option value="121 kg">121 kg</option>
                              <option value="122 kg">122 kg</option>
                              <option value="123 kg">123 kg</option>
                              <option value="124 kg">124 kg</option>
                              <option value="125 kg">125 kg</option>
                              <option value="126 kg">126 kg</option>
                              <option value="127 kg">127 kg</option>
                              <option value="128 kg">128 kg</option>
                              <option value="129 kg">129 kg</option>
                              <option value="130 kg">139 kg</option>
                              <option value="132 kg">130 kg</option>
                              <option value="131 kg">131 kg</option>
                              <option value="132 kg">132 kg</option>
                              <option value="133 kg">133 kg</option>
                              <option value="134 kg">134 kg</option>
                              <option value="135 kg">135 kg</option>
                              <option value="136 kg">136 kg</option>
                              <option value="137 kg">137 kg</option>
                              <option value="138 kg">138 kg</option>
                              <option value="139 kg">139 kg</option>
                              <option value="140 kg">140 kg</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Height: </span> </td>
                          <td style="padding-left:10px;"><select name="height" class="forminput1" id="height">
                              <option value="" selected>- Select -</option>
                              <option value="Below 4ft">Below 4ft</option>
                              <option value="4ft 6in">4ft 6in</option>
                              <option value="4ft 7in">4ft 7in</option>
                              <option value="4ft 8in">4ft 8in</option>
                              <option value=">4ft 9in">4ft 9in</option>
                              <option value="4ft 10in">4ft 10in</option>
                              <option value="4ft 11in">4ft 11in</option>
                              <option value="5ft">5ft</option>
                              <option value="5ft 1in">5ft 1in</option>
                              <option value="5ft 2in">5ft 2in</option>
                              <option value="5ft 3in">5ft 3in</option>
                              <option value="5ft 4in">5ft 4in</option>
                              <option value="5ft 5in">5ft 5in</option>
                              <option value="5ft 6in">5ft 6in</option>
                              <option value="5ft 7in">5ft 7in</option>
                              <option value="5ft 8in">5ft 8in</option>
                              <option value="5ft 9in">5ft 9in</option>
                              <option value="5ft 10in">5ft 10in</option>
                              <option value="5ft 11in">5ft 11in</option>
                              <option value="6ft">6ft</option>
                              <option value="6ft 1in">6ft 1in</option>
                              <option value="6ft 2in">6ft 2in</option>
                              <option value="6ft 3in">6ft 3in</option>
                              <option value="6ft 4in">6ft 4in</option>
                              <option value="6ft 5in">6ft 5in</option>
                              <option value="6ft 6in">6ft 6in</option>
                              <option value="6ft 7in">6ft 7in</option>
                              <option value="6ft 8in">6ft 8in</option>
                              <option value="6ft 9in">6ft 9in</option>
                              <option value="6ft 10in">6ft 10in</option>
                              <option value="6ft 11in">6ft 11in</option>
                              <option value="7ft">7ft</option>
                              <option value="Above 7ft">Above 7ft</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Blood Group: </span> </td>
                          <td style="padding-left:10px;"><select  name="b_group" class="forminput1" id="b_group">
                              <option value="" selected>- Select -</option>
                              <option>A+</option>
                              <option>A-</option>
                              <option>A1 +</option>
                              <option>A1 -</option>
                              <option>A1B +</option>
                              <option>A1B -</option>
                              <option>A2 +</option>
                              <option>A2 -</option>
                              <option>A2B +</option>
                              <option>A2B -</option>
                              <option>AB+</option>
                              <option>AB-</option>
                              <option>B+</option>
                              <option>B-</option>
                              <option>O+</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Complexion: </span> </td>
                          <td style="padding-left:10px;"><select name="complexion" class="forminput1" id="complexion">
                              <option value="" selected>- Select -</option>
                              <option value="Very Fair">Very Fair</option>
                              <option value="Fair">Fair</option>
                              <option value="Wheatish">Wheatish</option>
                              <option value="Wheatish Medium">Wheatish Medium</option>
                              <option value="Wheatish Brown">Wheatish Brown</option>
                              <option value="Dark">Dark</option>
                            </select>                          </td>
                        </tr>
                        
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Contact Details </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257" valign="top"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Address: </span> </td>
                          <td style="padding-left:10px;"><textarea name="address" rows="4" cols="10" id="address" class="forminput1" style="height:100px;"></textarea>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Country: </span> </td>
                          <td style="padding-left:10px;"><select name="country_id" class="forminput1" id="country_id" onchange="getState('../select_state.php?country_id='+this.value)">
                              <option value="Select Country">Select Country</option>
                              <?php
                                            while($row4=mysql_fetch_array($coun1))
                                            {
                                        ?>
                              <option value="<?php echo $row4['country_id']; ?>"><?php echo $row4['country_name']; ?></option>
                              <?php
                                            }
                                        ?>
                              <option value="others">Others</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> State: </span> </td>
                          <td style="padding-left:10px;" id="statediv"><select name="state_id" class="forminput1" id="state_id" onchange="getCity('select_city.php?state_id='+this.value)">
                              <option value="">Choose State</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> City: </span> </td>
                          <td style="padding-left:10px;" id="citydiv"><select name="city_id" class="forminput1" id="city_id" onchange="getLoc('select_locality.php?city_id='+this.value)">
                              <option value="">Choose City</option>
                            </select>                          </td>
                        </tr>
                       <!-- <tr>
                          <td height="40" width="257">&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:13px; padding-left:5px;"> Locality: </span> </td>
                          <td style="padding-left:10px;" id="locdiv"><select name="loc_id" id="loc_id" class="forminput1">
                              <option value="">Choose Locality</option>
                            </select>                          </td>
                        </tr>-->
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Phone: </span> </td>
                          <td style="padding-left:10px;"><input name="txtCC" type="text" class="medforminput" id="txtCC" style="width:40px;" onfocus="if (this.value == '91') this.value = '';" onkeyup="check_phone('txtCC')" value="+91" size="10" maxlength="10" />
                            -
                            <input name="txtAC" type="text" class="medforminput" id="txtAC" size="10" maxlength="10" style="width:50px;" onfocus="if (this.value == 'Area Code') this.value = '';" value="" onkeyup="check_phone('txtAC')" />
                            -
                            <input name="phone" type="text" class="medforminput" id="phone" size="10" maxlength="10" style="width:120px;" onkeyup="check_phone('txtPhone')" />                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="257">&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size:13px; padding-left:5px;"> Mobile: </span> </td>
                          <td style="padding-left:10px;"><input name="mobile" type="text" class="forminput1" id="mobile" />                          </td>
                        </tr>
                    
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Profile Details </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257" valign="top"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Profile: </span> </td>
                          <td style="padding-left:10px;"><textarea name="txtmsg" cols="50" rows="7" id="txtmsg" style="height:100px;" onkeydown="textCounter(document.MatriForm.txtmsg,document.MatriForm.remLen1,1000)" onkeyup="textCounter(document.MatriForm.txtmsg,document.MatriForm.remLen1,1000)" class="forminput1"></textarea>
                              <br />
                              <input name="remLen1" type="text" class="bodylight" value="1000" size="4" maxlength="4" readonly />                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><span style="font-size:11px; color:#999999;">You could enter details about you or a brief description about yourself.<br />
                                <span class="style2">Min 50</span> chas and <span class="style2">Max 1000 chars</span>. (If Profile contains ay details about your <br />
                            contact information like e-mail,phone number, etc. Your profile will be rejected)</span></td>
                        </tr>
                        
                       
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC"><div align="left"> <span class="text" style="color:#660000; font-weight:bold;font-size:13px;"> Partner Preferences </span> </div></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Looking For: </span> </td>
                          <td style="font-size:13px; padding-left:10px;"  class="text"><input name="looking_for" type="radio"  value="Unmarried" id="looking_for" />
                            Unmarried&nbsp;&nbsp;&nbsp;
                            <input name="looking_for" type="radio"  value="widow/widower" id="looking_for" />
                            Widow/Widower &nbsp;&nbsp;&nbsp;
                            <input name="looking_for" type="radio"  value="Divorce" id="looking_for" />
                            Divorcee&nbsp;&nbsp;&nbsp;
                            <input name="looking_for" type="radio"  value="Separated" id="looking_for" />
                            Separated </td>
                        </tr>
                       
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Country Living in: </span> </td>
                          <td style="padding-left:10px;"><select name="city1" class="forminput1" id="city1">
                              <option value="Does Not Matter">Select Country</option>
                              <?php
                $h=mysql_query("SELECT * FROM country");
                while($d=mysql_fetch_array($h))
                {
                ?>
                              <option value="<?php echo $d['country_id']; ?>"> <?php echo $d['country_name']; ?> </option>
                              <?php
                }
                ?>
                            </select>                          </td>
                        </tr>
                      
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Religion: </span> </td>
                          <td style="padding-left:10px;"><select name="religion_id1" id="religion_id1" class="forminput1" onchange="getCaste2('getcaste.php?religion_id1='+this.value)">
                              <option value="">Select Religion</option>
                              <?php
							 	$sql="select * from religion order by religion_name";
	$data=mysql_query($sql);
								while($row22=mysql_fetch_array($data))
								{
							?>
                              <option value="<?php echo $row22['religion_id']; ?>"><?php echo $row22['religion_name']; ?></option>
                              <?php
								}
							?>
                          </select></td>
                        </tr>
                        <tr>
                          <td height="40" width="257"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Caste: </span> </td>
                          <td style="padding-left:10px;" id="castediv2"><select name="caste_id1" id="caste_id1" class="forminput1" >
                              <option value="">Choose Caste</option>
                            </select>                          </td>
                        </tr>
                       
                        <tr>
                          <td>&nbsp;</td>
                          <td><input name="terms" type="checkbox"  id="terms" value="yes"  checked="checked"/>
                            <a href="cms.php?cms_id=12" target="_blank" style="text-decoration:none; font-weight:bold;font-size:13px;" class="green_text">I Accept the terms and Conditions </a> </td>
                        </tr>
                        <tr>
                          <td height="40">&nbsp;</td>
                          <td style="padding-left:10px;"><input type="image" name="submit" src="images/btn_submit.gif" value="submit" />
                              <input type="hidden" name="submit" value="submit" />
                            <img src="images/btn_cancel.gif" onclick="window.location='member.php'" /></td>
                        </tr>
                      </table>
					</form>            	</td>
            </tr>
        </table>		
        </div>
        <div id="footer">
        	<?php include('footer.php'); ?>
        </div>
    </div>
 </center>
</body>
</html>
