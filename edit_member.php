<?php
session_start();
include('../connect/config2.php');
require_once('../BusinessLogic/class.register.php');
include("secure.php");

	/*require_once ('../BusinessLogic/class.mothertongue.php');*/
	require_once ('../BusinessLogic/class.religion.php');
	require_once ('../BusinessLogic/class.edu_detail.php');
	require_once ('../BusinessLogic/class.occupation.php');
	require_once ('../BusinessLogic/class.city.php');
	require_once ('../BusinessLogic/class.country.php');
	require_once ('../BusinessLogic/class.locality.php');
	/*require_once ('../BusinessLogic/class.caste.php');*/
	require_once ('../BusinessLogic/class.register.php');
	require_once ('../BusinessLogic/class.state.php');
	

	/*$mt22=new mothertongue();
	$mtres=$mt22->get_mtongue_by_status();*/
	
	
	$mt2 = mysql_query("select * from  mothertongue where status = '1'"); 
	$mtres = mysql_num_rows($mt2);
	
	$r5=new religion();
	$rel2=$r5->get_religion_by_status();
	
	$e=new edu_detail();
	$rel3=$e->get_edu_by_status();
	
	/*$c=new caste();
	$rel4=$c->get_caste_by_status();*/
	
	$c = mysql_query("select * from caste where status = '1'"); 
	$rel4 = mysql_num_rows($c);
	
	$o=new occupation();
	$oc=$o->get_ocp_by_status();
	
	$co=new country();
	$coun1=$co->get_country_by_status();
	
	$st=new state();
	$coun2=$st->get_state_by_status();
	
	$ct=new city();
	$coun3=$ct->get_city_by_status();
	
	$ct1=new locality();
	$coun4=$ct1->get_locality_by_status();
	
	
	$matri_id=$_REQUEST['matri_id'];
	/*$ob=new register();
	$result=$ob->get_user_detail($matri_id);*/
	$sql="select * from register where index_id='".$_REQUEST['index_id']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
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


<script type="text/javascript" language="javascript" src="../js/dynamic-lists-date.js"></script>
<script language="javascript" src="../js/timepicker.js"></script>

<!--<script language="javascript">
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
</script>-->
<script language="javascript">
function p()
{
	var hh=document.MatriForm.tot_children.selectedIndex;
	if(hh==1)
	{
		document.getElementById('living').disabled=true;
		document.getElementById('not_living').disabled=true;
	}
	else
	{
		document.getElementById('living').disabled=false;
		document.getElementById('not_living').disabled=false;
	}
}


function h()
{
	var m=document.getElementById('unmarried').checked;
	if(m==true)
	{
		document.getElementById('tot_children').disabled=true;
		document.getElementById('living').disabled=true;
		document.getElementById('not_living').disabled=true;
		
	}
	else
	{
		document.getElementById('tot_children').disabled=false;
		document.getElementById('living').disabled=false;
		document.getElementById('not_living').disabled=false;
	}
}
function chk()
{
document.getElementById('tot_children').disabled=false;
	document.getElementById('living').disabled=false;
	document.getElementById('not_living').disabled=false;	
}

function chk_maartial()
{
	var m=document.getElementById('unmarried').checked;
	if(m==true)
	{
		document.getElementById('tot_children').disabled=true;
		document.getElementById('living').disabled=true;
		document.getElementById('not_living').disabled=true;
	}
	if(m==false)
	{
	document.getElementById('tot_children').disabled=false;
	document.getElementById('living').disabled=false;
	document.getElementById('not_living').disabled=false;
	}
	//if(m==true)
	
		
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
		var req6 = getXMLHTTP();		
		if (req6) 
		{
			req6.onreadystatechange = function() 
			{
					if (req6.readyState == 4) 
					{
						if (req6.status == 200) 
						{
												
						document.getElementById('locdiv').innerHTML=req6.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req5.statusText);
						}
					}				
			}			
			req6.open("GET", strURL, true);
			req6.send(null);
		}				
}
function getCaste(strURL) 
{
		var req6 = getXMLHTTP();		
		if (req6) 
		{
			req6.onreadystatechange = function() 
			{
					if (req6.readyState == 4) 
					{
						if (req6.status == 200) 
						{
												
						document.getElementById('caste1div').innerHTML=req6.responseText;						
						} 
						else 
						{
						alert("There was a problem while using XMLHTTP:\n" + req5.statusText);
						}
					}				
			}			
			req6.open("GET", strURL, true);
			req6.send(null);
		}				
}


</script>



<script language="javascript" src="js/editvalidate.js">
</script>
</head>

<body onload="h();">
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
               <span class="red_text">Edit Member Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
				<form action="" method="post" name="MatriForm" id="MatriForm"  onsubmit="return validate(this.name);" >
                    <table style="border:solid 5px #7e0000;" width="996">
                       <tr >
                            <td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        Basic Information                                    </span>                                </div>                            </td>
                        </tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	First Name:                                </span>                            </td>
                        	<td width="726" style="padding-left:10px;">
                           	<input name="firstname" type="text" class="forminput" id="firstname" value="<?php echo $row['firstname']; ?>"  />&nbsp;                            </td>
                        </tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Last Name:                                </span>                            </td>
                        	<td style="padding-left:10px;">
                            	<input name="lastname" type="text" class="forminput" id="lastname" value="<?php echo $row['lastname']; ?>" />&nbsp;                            </td>
                        </tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Gender:                                </span>                            </td>
							
							
							
							
                        	<td style="font-size:13px; padding-left:10px;"  class="text">
                            	
								
								<input name="gender" type="radio"  value="Male" onClick="return HaveChildnp(this)" <?php if($row['gender']=="Male"){  ?> checked="checked" <?php } ?> />
                            	Male&nbsp;&nbsp;&nbsp;
                          
                            <input name="gender" type="radio"  value="Female" onClick="return HaveChildnp(this)"  <?php if($row['gender']=="Female"){  ?> checked="checked" <?php } ?> />Female&nbsp;&nbsp;                            </td></tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
								
								
								
                                	Date of Birth:                                </span>                            
                          </td>
                       	  <td style="padding-left:10px;">
                            	<select id="theyear" name="theyear" class="verdana_13" onChange="get_days_of_month();" style="width:25%">
								
								 <?php
					  echo $g=explode("-",$row['birthdate']);
					  $yy=$g[0];					  
					  $mm=$g[1];					  
					  $dd=$g[2];					  
					  ?>
								
								
                              <option value="<?php echo $yy; ?>"><?php echo $yy; ?></option>
							
                            <?php
    include("get-years.php");
?>
                          </select>
                            &nbsp;
                            <select id="themonth" name="themonth" class="verdana_13" onChange="get_days_of_month();" style="width:25%">
                              <option value="<?php echo $mm; ?>"><?php echo $mm; ?></option>
                            <?php
    include("get-months.php");
?>
                          </select>
						  
						  <select id="theday" name="theday" class="verdana_13" style="width:25%">
                             <option value="<?php echo $dd; ?>"><?php echo $dd; ?></option>
                              <?php
	 include("calculate-days.php");
	?>
                            </select>
						  
						  
						  
						  
						  
						  
						  
                          &nbsp;</td>
                      </tr>
					  <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Marital Status:                              </span>                            </td>
                        	<td style="padding-left:10px; font-size:12px;" class="text">
                            	<input name="m_status" type="radio"  value="Unmarried" id='unmarried' <?php if($row['m_status']=="Unmarried"){  ?> checked="checked" <?php } ?> onclick=" chk_maartial();"/>
                            	Unmarried&nbsp;&nbsp;&nbsp;
                            	<input name="m_status" type="radio"  value="Widow/Widower" id="widow" <?php if($row['m_status']=="Widow/Widower"){  ?> checked="checked" <?php } ?> onclick="chk();" />
                            	Widow/Widower &nbsp;
                            	<input name="m_status" type="radio"  value="Divorcee"  id="divorcee" <?php if($row['m_status']=="Divorcee"){  ?> checked="checked" <?php } ?> onclick="chk();">
                            	Divorcee&nbsp;&nbsp;&nbsp;
                            	<input name="m_status" type="radio"  value="Separated"  id="separated" <?php if($row['m_status']=="Separated"){  ?> checked="checked" <?php } ?> onclick="chk();">
                            	Separated                            </td>
                      </tr> 
					  
					  
					                                                          
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	No. of Children:                                </span>                            </td>
                        	<td style="padding-left:10px;">
                            	<select name="tot_children" id="tot_children" size="1" class="forminput" disabled="disabled" onchange="p();">
                            <option value="">- Select -</option>
                            <option value="None" <?php if($row['tot_children']=="None"){ ?> selected="selected" <?php } ?>>None</option>
                            <option value="One" <?php if($row['tot_children']=="One"){ ?> selected="selected" <?php } ?>>One</option>
                               <option value="two" <?php if($row['tot_children']=="two"){ ?> selected="selected" <?php } ?>>two</option>
                              <option value="three" <?php if($row['tot_children']=="three"){ ?> selected="selected" <?php } ?>>three</option>
                              <option value="four" <?php if($row['tot_children']=="four"){ ?> selected="selected" <?php } ?>>four</option>
                          </select>                            </td>
                        </tr>
						
						
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Children Living Status:                              </span>                            </td>
                        	<td style="font-size:13px; padding-left:10px;"  class="text" >
                            	<input  name="status_children"  id="living" type="radio"  value="Yes" <?php if($row['status_children']=="Yes"){  ?> checked="checked" <?php } ?> disabled="disabled">
                            	Living with me&nbsp;
                            	<input name="status_children" type="radio" id="not_living"  value="No"<?php if($row['status_children']=="No"){  ?> checked="checked" <?php } ?> disabled="disabled">
                            	Not living with me                            </td>
                      	</tr>
						
						
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Mother Tongue:                              </span>                            </td>
                        	<td style="padding-left:10px;" class="text">

                            	<select name="m_tongue" id="m_tongue" class="forminput">

                            <option value="">Select Mothertongue</option>
                        <?php
								while($rowm=mysql_fetch_array($mt2))
								{
							?>

								<option value="<?php echo $rowm['mtongue_id']; ?>" <?php if($rowm['mtongue_id']==$row['m_tongue']){ ?> selected="selected" <?php } ?>><?php echo $rowm['mtongue_name']; ?></option>
							<?php		
								}
							?>
                          </select>                            </td>
                      	</tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Religion:                              </span>                            </td>
                        	<td style="padding-left:10px;">
                            	<select name="religion_id" id="religion_id" class="forminput" onChange="getCaste('../select_caste.php?religion_id='+this.value)">
                            <option value="">Select Religion</option>
							<option>
                            <?php
								while($row22=mysql_fetch_array($rel2))
								{
							?>
                             <option value="<?php echo $row22['religion_id']; ?>" <?php if($row22['religion_id']==$row['religion']){ ?> selected="selected" <?php } ?>><?php echo $row22['religion_name']; ?></option>
							<?php		
								}
							?>
						  </select>						   </td>
                      	</tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Caste:                              </span>                            </td>
                        	<td id="castediv" style="padding-left:10px;">
                            	<select name="caste" id="caste" class="forminput" >
                            		<option value="">Choose Caste</option>
								
							 <?php
								while($row23=mysql_fetch_array($c))
								{
							?>
                             <option value="<?php echo $row23['caste_id']; ?>" <?php if($row23['caste_id']==$row['caste']){ ?> selected="selected" <?php } ?>><?php echo $row23['caste_name']; ?></option>
							<?php		
								}
							?>
						</select>                            </td>
                      	</tr>
                       
                        
                        <tr >
                            <td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        Account Information</span>                                </div>                            </td>
                      	</tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Email ID:                                </span>                            </td>
                        	<td style="padding-left:10px;"><input name="email" type="text" class="forminput" id="email"  value="<?php echo $row['email']; ?>" /></td>
                        </tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Password:                                </span>                            </td>
                        	<td style="padding-left:10px;">
                            	<input name="password" type="password" class="forminput" id="password" value="">                            </td>
                        </tr>
                        <tr>
                        	<td height="40" width="250">
                            	<font id="star" style="padding-left:10px;">*</font>&nbsp;
                                <span style="font-size:13px; padding-left:5px;">
                                	Confirm Password:                                </span>                            </td>
                        	<td style="padding-left:10px;"><input name="cpassword" type="password" class="forminput" id="cpassword" /></td>
                        </tr>
                        <tr >                        </tr>
<td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        Education Occupation                                    </span>                                </div>                            </td>
                        </tr>
                        <tr>
                          <td height="40" width="250px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Education: </span> </td>
                          <td style="padding-left:10px;"><select name="education" class="forminput" id="education" >
                              <option value="" selected>- Select -</option>
                              <option value="Bachelors" <?php if($row['education']=="Bachelors" ) { ?> selected="selected" <?php  } ?>>Bachelors</option>
                              <option value="Masters" <?php if($row['education']=="Masters"  ) { ?> selected="selected" <?php  } ?>>Masters</option>
                              <option value="Doctorate" <?php if($row['education']=="Doctorate"  ) { ?> selected="selected" <?php  } ?>>Doctorate</option>
                              <option value="Diploma" <?php if($row['education']=="Diploma"   ) { ?> selected="selected" <?php  } ?>>Diploma</option>
                              <option value="Undergraduate" <?php if($row['education']=="Undergraduate" ) { ?> selected="selected" <?php  } ?>>Undergraduate</option>
                              <option value="Associates degree" <?php if($row['education']=="Associates degree" ) { ?> selected="selected" <?php  } ?>>Associates degree</option>
                              <option value="Honours degree" <?php if($row['education']=="Honours degree" ) { ?> selected="selected" <?php  } ?>>Honours degree</option>
                              <option value="Trade school" <?php if($row['education']=="Trade school"  ) { ?> selected="selected" <?php  } ?>>Trade school</option>
                              <option value="High school" <?php if($row['education']=="High school" ) { ?> selected="selected" <?php  } ?>>High school</option>
                              <option value="Less than high school" <?php if($row['education']=="Less than high school" ) { ?> selected="selected" <?php  } ?>>Less than high school</option>
                            </select>                          </td>
                        </tr>
     					<tr>
						<td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Education Details: </span> </td>
                          <td style="padding-left:10px;"><select name="edu_detail" id="edu_detail" class="forminput">
                              <option value="">Select </option>
                             
										
							<?php
								while($e1=mysql_fetch_array($rel3))
								{
							?>
                             <option value="<?php echo $e1['edu_id']; ?>" <?php if($e1['edu_id']==$row['edu_detail']){ ?> selected="selected" <?php } ?>><?php echo $e1['edu_name']; ?></option>
							<?php		
								}
							?>
							 
							
							
										
										
										
										
										
                            </select>                          </td>
                        </tr>
						
						<tr>
						<td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Occupation: </span> </td>
                          <td style="padding-left:10px;"><select name="occupation" id="occupation" class="forminput">
                              <option value="">Select </option>
                              
							   <?php
								while($occ=mysql_fetch_array($oc))
								{
							?>
                             <option value="<?php echo $occ['ocp_id']; ?>" <?php if($occ['ocp_id']==$row['occupation']){ ?> selected="selected" <?php } ?>><?php echo $occ['ocp_name']; ?></option>
							<?php		
								}
							?>
							 
							
							
							   
							   
							   
							   
							   
                            </select>                          </td>
							</tr>
							
							<td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Employed in: </span> </td>
                          <td style="padding-left:10px;"><select name="emp_in" class="forminput" id="emp_in">
                              <option value="" selected>- Select -</option>
                              <option value="Business"  <?php if($row['emp_in']=="Business" ) { ?> selected="selected" <?php  } ?>>Business</option>
                              <option value="Defence" <?php if($row['emp_in']=="Defence") { ?> selected="selected" <?php  } ?>>Defence</option>
                              <option value="Government" <?php if($row['emp_in']=="Government" ) { ?> selected="selected" <?php  } ?>>Government</option>
                              <option value="Not Employed in" <?php if($row['emp_in']=="Not Employed in"  ) { ?> selected="selected" <?php  } ?>>Not Employed in</option>
                              <option value="Private" <?php if($row['emp_in']=="Private"  ) { ?> selected="selected" <?php  } ?>>Private</option>
                              <option value="Others" <?php if($row['emp_in']=="Others"   ) { ?> selected="selected" <?php  } ?>>Others</option>
                            </select>                          </td>
                        </tr>
                        <tr >
                          <td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        Physical Attribute                                    </span>                                </div>                            </td>
                        </tr>
                        <tr>
                          <td height="40" width="250px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Weight: </span> </td>
                          <td style="padding-left:10px;"><select name="weight" class="forminput" id="weight">
                              <option value="0" selected="selected">- Select -</option>
                              <option value="41 kg" <?php if($row['weight']=="41 kg") { ?> selected="selected" <?php  } ?>>41 kg</option>
                              <option value="42 kg" <?php if($row['weight']=="42 kg") { ?> selected="selected" <?php  } ?>>42 kg</option>
                              <option value="43 kg" <?php if($row['weight']=="43 kg") { ?> selected="selected" <?php  } ?>>43 kg</option>
                              <option value="44 kg" <?php if($row['weight']=="44 kg") { ?> selected="selected" <?php  } ?>>44 kg</option>
                              <option value="45 kg" <?php if($row['weight']=="45 kg") { ?> selected="selected" <?php  } ?>>45 kg</option>
                              <option value="46 kg" <?php if($row['weight']=="46 kg") { ?> selected="selected" <?php  } ?>>46 kg</option>
                              <option value="47 kg" <?php if($row['weight']=="47 kg") { ?> selected="selected" <?php  } ?>>47 kg</option>
                              <option value="48 kg" <?php if($row['weight']=="48 kg") { ?> selected="selected" <?php  } ?>>48 kg</option>
                              <option value="49 kg" <?php if($row['weight']=="49 kg") { ?> selected="selected" <?php  } ?>>49 kg</option>
                              <option value="50 kg" <?php if($row['weight']=="50 kg") { ?> selected="selected" <?php  } ?>>50 kg</option>
                              <option value="51 kg" <?php if($row['weight']=="51 kg") { ?> selected="selected" <?php  } ?>>51 kg</option>
                              <option value="52 kg" <?php if($row['weight']=="52 kg") { ?> selected="selected" <?php  } ?>>52 kg</option>
                              <option value="53 kg" <?php if($row['weight']=="53 kg") { ?> selected="selected" <?php  } ?>>53 kg</option>
                              <option value="54 kg" <?php if($row['weight']=="54 kg") { ?> selected="selected" <?php  } ?>>54 kg</option>
                              <option value="55 kg" <?php if($row['weight']=="55 kg") { ?> selected="selected" <?php  } ?>>55 kg</option>
                              <option value="56 kg" <?php if($row['weight']=="56 kg") { ?> selected="selected" <?php  } ?>>56 kg</option>
                              <option value="57 kg" <?php if($row['weight']=="57 kg") { ?> selected="selected" <?php  } ?>>57 kg</option>
                              <option value="58 kg" <?php if($row['weight']=="58 kg") { ?> selected="selected" <?php  } ?>>58 kg</option>
                              <option value="59 kg" <?php if($row['weight']=="59 kg") { ?> selected="selected" <?php  } ?>>59 kg</option>
                              <option value="60 kg" <?php if($row['weight']=="60 kg") { ?> selected="selected" <?php  } ?>>60 kg</option>
                              <option value="61 kg" <?php if($row['weight']=="61 kg") { ?> selected="selected" <?php  } ?>>61 kg</option>
                              <option value="62 kg" <?php if($row['weight']=="62 kg") { ?> selected="selected" <?php  } ?>>62 kg</option>
                              <option value="63 kg" <?php if($row['weight']=="63 kg") { ?> selected="selected" <?php  } ?>>63 kg</option>
                              <option value="64 kg" <?php if($row['weight']=="64 kg") { ?> selected="selected" <?php  } ?>>64 kg</option>
                              <option value="65 kg" <?php if($row['weight']=="65 kg") { ?> selected="selected" <?php  } ?>>65 kg</option>
                              <option value="66 kg" <?php if($row['weight']=="66 kg") { ?> selected="selected" <?php  } ?>>66 kg</option>
                              <option value="67 kg" <?php if($row['weight']=="67 kg") { ?> selected="selected" <?php  } ?>>67 kg</option>
                              <option value="68 kg" <?php if($row['weight']=="68 kg") { ?> selected="selected" <?php  } ?>>68 kg</option>
                              <option value="69 kg" <?php if($row['weight']=="69 kg") { ?> selected="selected" <?php  } ?>>69 kg</option>
                              <option value="70 kg" <?php if($row['weight']=="70 kg") { ?> selected="selected" <?php  } ?>>70 kg</option>
                              <option value="71 kg" <?php if($row['weight']=="71 kg") { ?> selected="selected" <?php  } ?>>71 kg</option>
                              <option value="72 kg" <?php if($row['weight']=="72 kg") { ?> selected="selected" <?php  } ?>>72 kg</option>
                              <option value="73 kg" <?php if($row['weight']=="73 kg") { ?> selected="selected" <?php  } ?>>73 kg</option>
                              <option value="74 kg" <?php if($row['weight']=="74 kg") { ?> selected="selected" <?php  } ?>>74 kg</option>
                              <option value="75 kg" <?php if($row['weight']=="75 kg") { ?> selected="selected" <?php  } ?>>75 kg</option>
                              <option value="76 kg" <?php if($row['weight']=="76 kg") { ?> selected="selected" <?php  } ?>>76 kg</option>
                              <option value="77 kg" <?php if($row['weight']=="77 kg") { ?> selected="selected" <?php  } ?>>77 kg</option>
                              <option value="78 kg" <?php if($row['weight']=="78 kg") { ?> selected="selected" <?php  } ?>>78 kg</option>
                              <option value="79 kg" <?php if($row['weight']=="79 kg") { ?> selected="selected" <?php  } ?>>79 kg</option>
                              <option value="80 kg" <?php if($row['weight']=="80 kg") { ?> selected="selected" <?php  } ?>>80 kg</option>
                              <option value="81 kg" <?php if($row['weight']=="81 kg") { ?> selected="selected" <?php  } ?>>81 kg</option>
                              <option value="82 kg" <?php if($row['weight']=="82 kg") { ?> selected="selected" <?php  } ?>>82 kg</option>
                              <option value="83 kg" <?php if($row['weight']=="83 kg") { ?> selected="selected" <?php  } ?>>83 kg</option>
                              <option value="84 kg" <?php if($row['weight']=="84 kg") { ?> selected="selected" <?php  } ?>>84 kg</option>
                              <option value="85 kg" <?php if($row['weight']=="85 kg") { ?> selected="selected" <?php  } ?>>85 kg</option>
                              <option value="86 kg" <?php if($row['weight']=="86 kg") { ?> selected="selected" <?php  } ?>>86 kg</option>
                              <option value="87 kg" <?php if($row['weight']=="87 kg") { ?> selected="selected" <?php  } ?>>87 kg</option>
                              <option value="88 kg" <?php if($row['weight']=="88 kg") { ?> selected="selected" <?php  } ?>>88 kg</option>
                              <option value="89 kg" <?php if($row['weight']=="89 kg") { ?> selected="selected" <?php  } ?>>89 kg</option>
                              <option value="90 kg" <?php if($row['weight']=="90 kg") { ?> selected="selected" <?php  } ?>>90 kg</option>
                              <option value="91 kg" <?php if($row['weight']=="91 kg") { ?> selected="selected" <?php  } ?>>91 kg</option>
                              <option value="92 kg" <?php if($row['weight']=="92 kg") { ?> selected="selected" <?php  } ?>>92 kg</option>
                              <option value="93 kg" <?php if($row['weight']=="93 kg") { ?> selected="selected" <?php  } ?>>93 kg</option>
                              <option value="94 kg" <?php if($row['weight']=="94 kg") { ?> selected="selected" <?php  } ?>>94 kg</option>
                              <option value="95 kg" <?php if($row['weight']=="95 kg") { ?> selected="selected" <?php  } ?>>95 kg</option>
                              <option value="96 kg" <?php if($row['weight']=="96 kg") { ?> selected="selected" <?php  } ?>>96 kg</option>
                              <option value="97 kg" <?php if($row['weight']=="97 kg") { ?> selected="selected" <?php  } ?>>97 kg</option>
                              <option value="98 kg" <?php if($row['weight']=="98 kg") { ?> selected="selected" <?php  } ?>>98 kg</option>
                              <option value="99 kg" <?php if($row['weight']=="99 kg") { ?> selected="selected" <?php  } ?>>99 kg</option>
                              <option value="100 kg" <?php if($row['weight']=="100 kg") { ?> selected="selected" <?php  } ?>>100 kg</option>
                              <option value="101 kg" <?php if($row['weight']=="101 kg") { ?> selected="selected" <?php  } ?>>101 kg</option>
                              <option value="102 kg" <?php if($row['weight']=="102 kg") { ?> selected="selected" <?php  } ?>>102 kg</option>
                              <option value="103 kg" <?php if($row['weight']=="103 kg") { ?> selected="selected" <?php  } ?>>103 kg</option>
                              <option value="104 kg" <?php if($row['weight']=="104 kg") { ?> selected="selected" <?php  } ?>>104 kg</option>
                              <option value="105 kg" <?php if($row['weight']=="105 kg") { ?> selected="selected" <?php  } ?>>105 kg</option>
                              <option value="106 kg" <?php if($row['weight']=="106 kg") { ?> selected="selected" <?php  } ?>>106 kg</option>
                              <option value="107 kg" <?php if($row['weight']=="107 kg") { ?> selected="selected" <?php  } ?>>107 kg</option>
                              <option value="108 kg" <?php if($row['weight']=="108 kg") { ?> selected="selected" <?php  } ?>>108 kg</option>
                              <option value="109 kg" <?php if($row['weight']=="109 kg") { ?> selected="selected" <?php  } ?>>109 kg</option>
                              <option value="110 kg" <?php if($row['weight']=="110 kg") { ?> selected="selected" <?php  } ?>>110 kg</option>
                              <option value="111 kg" <?php if($row['weight']=="111 kg") { ?> selected="selected" <?php  } ?>>111 kg</option>
                              <option value="112 kg" <?php if($row['weight']=="112 kg") { ?> selected="selected" <?php  } ?>>112 kg</option>
                              <option value="113 kg" <?php if($row['weight']=="113 kg") { ?> selected="selected" <?php  } ?>>113 kg</option>
                              <option value="114 kg" <?php if($row['weight']=="114 kg") { ?> selected="selected" <?php  } ?>>114 kg</option>
                              <option value="115 kg" <?php if($row['weight']=="115 kg") { ?> selected="selected" <?php  } ?>>115 kg</option>
                              <option value="116 kg" <?php if($row['weight']=="116 kg") { ?> selected="selected" <?php  } ?>>116 kg</option>
                              <option value="117 kg" <?php if($row['weight']=="117 kg") { ?> selected="selected" <?php  } ?>>117 kg</option>
                              <option value="118 kg" <?php if($row['weight']=="118 kg") { ?> selected="selected" <?php  } ?>>118 kg</option>
                              <option value="119 kg" <?php if($row['weight']=="119 kg") { ?> selected="selected" <?php  } ?>>119 kg</option>
                              <option value="120 kg" <?php if($row['weight']=="120 kg") { ?> selected="selected" <?php  } ?>>120 kg</option>
                              <option value="121 kg" <?php if($row['weight']=="121 kg") { ?> selected="selected" <?php  } ?>>121 kg</option>
                              <option value="122 kg" <?php if($row['weight']=="122 kg") { ?> selected="selected" <?php  } ?>>122 kg</option>
                              <option value="123 kg" <?php if($row['weight']=="123 kg") { ?> selected="selected" <?php  } ?>>123 kg</option>
                              <option value="124 kg" <?php if($row['weight']=="124 kg") { ?> selected="selected" <?php  } ?>>124 kg</option>
                              <option value="125 kg" <?php if($row['weight']=="125 kg") { ?> selected="selected" <?php  } ?>>125 kg</option>
                              <option value="126 kg" <?php if($row['weight']=="126 kg") { ?> selected="selected" <?php  } ?>>126 kg</option>
                              <option value="127 kg" <?php if($row['weight']=="127 kg") { ?> selected="selected" <?php  } ?>>127 kg</option>
                              <option value="128 kg" <?php if($row['weight']=="128 kg") { ?> selected="selected" <?php  } ?>>128 kg</option>
                              <option value="129 kg" <?php if($row['weight']=="129 kg") { ?> selected="selected" <?php  } ?>>129 kg</option>
                              <option value="130 kg" <?php if($row['weight']=="130 kg") { ?> selected="selected" <?php  } ?>>130 kg</option>
                              <option value="131 kg" <?php if($row['weight']=="131 kg") { ?> selected="selected" <?php  } ?>>131 kg</option>
                              <option value="132 kg" <?php if($row['weight']=="132 kg") { ?> selected="selected" <?php  } ?>>132 kg</option>
                              <option value="133 kg" <?php if($row['weight']=="133 kg") { ?> selected="selected" <?php  } ?>>133 kg</option>
                              <option value="134 kg" <?php if($row['weight']=="134 kg") { ?> selected="selected" <?php  } ?>>134 kg</option>
                              <option value="135 kg" <?php if($row['weight']=="135 kg") { ?> selected="selected" <?php  } ?>>135 kg</option>
                              <option value="136 kg" <?php if($row['weight']=="136 kg") { ?> selected="selected" <?php  } ?>>136 kg</option>
                              <option value="137 kg" <?php if($row['weight']=="137 kg") { ?> selected="selected" <?php  } ?>>137 kg</option>
                              <option value="138 kg" <?php if($row['weight']=="138 kg") { ?> selected="selected" <?php  } ?>>138 kg</option>
                              <option value="139 kg" <?php if($row['weight']=="139 kg") { ?> selected="selected" <?php  } ?>>139 kg</option>
                              <option value="140 kg" <?php if($row['weight']=="140 kg") { ?> selected="selected" <?php  } ?>>140 kg</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Height: </span> </td>
                          <td style="padding-left:10px;"><select name="height" class="forminput" id="height">
                              <option value="" selected>- Select -</option>
                              <option value="Below 4ft"  <?php if($row['height']=="Below 4ft") { ?> selected="selected" <?php  } ?>>Below 4ft</option>
                              <option value="4ft 6in"  <?php if($row['height']=="4ft 6in") { ?> selected="selected" <?php  } ?>>4ft 6in</option>
                              <option value="4ft 7in" <?php if($row['height']=="4ft 7in") { ?> selected="selected" <?php  } ?>>4ft 7in</option>
                              <option value="4ft 8in" <?php if($row['height']=="4ft 8in") { ?> selected="selected" <?php  } ?>>4ft 8in</option>
                              <option value="4ft 9in" <?php if($row['height']=="4ft 9in") { ?> selected="selected" <?php  } ?>>4ft 9in</option>
                              <option value="4ft 10in" <?php if($row['height']=="4ft 10in") { ?> selected="selected" <?php  } ?>>4ft 10in</option>
                              <option value="4ft 11in" <?php if($row['height']=="4ft 11in") { ?> selected="selected" <?php  } ?>>4ft 11in</option>
                              <option value="5ft" <?php if($row['height']=="5ft") { ?> selected="selected" <?php  } ?>>5ft</option>
                              <option value="5ft 1in" <?php if($row['height']=="5ft 1in") { ?> selected="selected" <?php  } ?>>5ft 1in</option>
                              <option value="5ft 2in" <?php if($row['height']=="5ft 2in") { ?> selected="selected" <?php  } ?>>5ft 2in</option>
                              <option value="5ft 3in" <?php if($row['height']=="5ft 3in") { ?> selected="selected" <?php  } ?>>5ft 3in</option>
                              <option value="5ft 4in" <?php if($row['height']=="5ft 4in") { ?> selected="selected" <?php  } ?>>5ft 4in</option>
                              <option value="5ft 5in" <?php if($row['height']=="5ft 5in") { ?> selected="selected" <?php  } ?>>5ft 5in</option>
                              <option value="5ft 6in" <?php if($row['height']=="5ft 6in") { ?> selected="selected" <?php  } ?>>5ft 6in</option>
                              <option value="5ft 7in" <?php if($row['height']=="5ft 7in") { ?> selected="selected" <?php  } ?>>5ft 7in</option>
                              <option value="5ft 8in" <?php if($row['height']=="5ft 8in") { ?> selected="selected" <?php  } ?>>5ft 8in</option>
                              <option value="5ft 9in" <?php if($row['height']=="5ft 9in") { ?> selected="selected" <?php  } ?>>5ft 9in</option>
                              <option value="5ft 10in" <?php if($row['height']=="5ft 10in") { ?> selected="selected" <?php  } ?>>5ft 10in</option>
                              <option value="5ft 11in" <?php if($row['height']=="5ft 11in") { ?> selected="selected" <?php  } ?>>5ft 11in</option>
                              <option value="6ft" <?php if($row['height']=="6ft") { ?> selected="selected" <?php  } ?>>6ft</option>
                              <option value="6ft 1in" <?php if($row['height']=="6ft 1in") { ?> selected="selected" <?php  } ?>>6ft 1in</option>
                              <option value="6ft 2in" <?php if($row['height']=="6ft 2in") { ?> selected="selected" <?php  } ?>>6ft 2in</option>
                              <option value="6ft 3in" <?php if($row['height']=="6ft 3in") { ?> selected="selected" <?php  } ?>>6ft 3in</option>
                              <option value="6ft 4in" <?php if($row['height']=="6ft 4in") { ?> selected="selected" <?php  } ?>>6ft 4in</option>
                              <option value="6ft 5in" <?php if($row['height']=="6ft 5in") { ?> selected="selected" <?php  } ?>>6ft 5in</option>
                              <option value="6ft 6in" <?php if($row['height']=="6ft 6in") { ?> selected="selected" <?php  } ?>>6ft 6in</option>
                              <option value="6ft 7in" <?php if($row['height']=="6ft 7in") { ?> selected="selected" <?php  } ?>>6ft 7in</option>
                              <option value="6ft 8in" <?php if($row['height']=="6ft 8in") { ?> selected="selected" <?php  } ?>>6ft 8in</option>
                              <option value="6ft 9in" <?php if($row['height']=="6ft 9in") { ?> selected="selected" <?php  } ?>>6ft 9in</option>
                              <option value="6ft 10in" <?php if($row['height']=="6ft 10in") { ?> selected="selected" <?php  } ?>>6ft 10in</option>
                              <option value="6ft 11in" <?php if($row['height']=="6ft 11in") { ?> selected="selected" <?php  } ?>>6ft 11in</option>
                              <option value="7ft" <?php if($row['height']=="7ft") { ?> selected="selected" <?php  } ?>>7ft</option>
                              <option value="Above 7ft" <?php if($row['height']=="Above 7ft") { ?> selected="selected" <?php  } ?>>Above 7ft</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Blood Group: </span> </td>
                          <td style="padding-left:10px;"><select  name="b_group" class="forminput" id="b_group">
                              <option value="" selected>- Select -</option>
                              <option value="A+" <?php if($row['b_group']=="A+") { ?> selected="selected" <?php  } ?> >A+</option>
                              <option value="A-" <?php if($row['b_group']=="A-") { ?> selected="selected" <?php  } ?>>A-</option>
                              <option value="A1 +" <?php if($row['b_group']=="A1 +") { ?> selected="selected" <?php  } ?>>A1 +</option>
                              <option value="A1 -" <?php if($row['b_group']=="A1 -") { ?> selected="selected" <?php  } ?>>A1 -</option>
                              <option value="A1B" <?php if($row['b_group']=="A1B") { ?> selected="selected" <?php  } ?>>A1B +</option>
                              <option value="A1B -" <?php if($row['b_group']=="A1B -") { ?> selected="selected" <?php  } ?>>A1B -</option>
                              <option value="A2 +" <?php if($row['b_group']=="A2") { ?> selected="selected" <?php  } ?>>A2 +</option>
                              <option value="A2 -" <?php if($row['b_group']=="A2 -") { ?> selected="selected" <?php  } ?>>A2 -</option>
                              <option value="A2B" <?php if($row['b_group']=="A2B") { ?> selected="selected" <?php  } ?>>A2B +</option>
                              <option value="A2B -" <?php if($row['b_group']=="A2B") { ?> selected="selected" <?php  } ?>>A2B -</option>
                              <option value="AB+" <?php if($row['b_group']=="AB+") { ?> selected="selected" <?php  } ?>>AB+</option>
                              <option value="AB-" <?php if($row['b_group']=="AB-") { ?> selected="selected" <?php  } ?>>AB-</option>
                              <option value="B+" <?php if($row['b_broup']=="B+") { ?> selected="selected" <?php  } ?>>B+</option>
                              <option value="B-" <?php if($row['b_group']=="B-") { ?> selected="selected" <?php  } ?>>B-</option>
                              <option value="O+" <?php if($row['b_group']=="O+") { ?> selected="selected" <?php  } ?>>O+</option>
                            </select>                          </td>
                        </tr>
                        <tr>
                          <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Complexion: </span> </td>
                          <td style="padding-left:10px;"><select name="complexion" class="forminput" id="complexion">
                              <option value="" selected>- Select -</option>
                              <option value="Very Fair" <?php if($row['complexion']=="Very Fair" ) { ?> selected="selected" <?php  } ?>>Very Fair</option>
                              <option value="Fair" <?php if($row['complexion']=="Fair" ) { ?> selected="selected" <?php  } ?>>Fair</option>
                              <option value="Wheatish" <?php if($row['complexion']=="Wheatish" ) { ?> selected="selected" <?php  } ?>>Wheatish</option>
                              <option value="Wheatish Medium" <?php if($row['complexion']=="Wheatish Medium" ) { ?> selected="selected" <?php  } ?>>Wheatish Medium</option>
                              <option value="Wheatish Brown" <?php if($row['complexion']=="Wheatish Brown" ) { ?> selected="selected" <?php  } ?>>Wheatish Brown</option>
                              <option value="Dark" <?php if($row['complexion']=="Dark" ) { ?> selected="selected" <?php  } ?> >Dark</option>
                            </select>                          </td></tr>
							
							
                          <td style="font-size:13px; padding-left:10px;"  class="text">                            </td>
                        </tr>
                        <tr>							</tr>
							<tr>
							<td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        Contact Details                                    </span>                                </div>                            </td>
                        </tr>
                        <tr>
                          <td height="40" width="250px" valign="top"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Address: </span> </td>
                          <td style="padding-left:10px;"><textarea name="address" rows="4" cols="10" id="address" class="forminput" style="height:100px;"><?php echo $row['address']; ?></textarea></td>
                        </tr>
                        <tr>
                          <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Country: </span> </td>
                          <td style="padding-left:10px;"><select name="country_id" class="forminput" id="country_id" onchange="getState('select_state.php?country_id='+this.value)">
                              <option value="Select Country">Select Country</option>
							     <?php
											   
									while($row4=mysql_fetch_array($coun1))
									{
										$select="";
										if($row4['country_id']==$row['country_id'])
										{
										$select="selected='selected'";
										}
								?>
								 <option value="<?php echo $row4['country_id']; ?>" <?php echo $select;?>>
								 <?php echo $row4['country_name']; ?>								 </option>
								<?php		
									}
								?>
									</select>                          </td>
							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> State: </span> </td>
							  <td style="padding-left:10px;" id="statediv"><select name="state_id" class="forminput" id="state_id" onchange="getCity('select_city.php?state_id='+this.value)">
								  <option value="">Choose State</option>
								  <?php
											   
									while($row5=mysql_fetch_array($coun2))
									{
									
									
								?>
								 <option value="<?php echo $row5['state_id']; ?>" <?php if($row5['state_id']==$row['state_id']){ ?> selected="selected" <?php } ?>><?php echo $row5['state_name']; ?></option>
								<?php		
									}
								?>		
											
											
											
								</select>                          </td>
							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> City: </span> </td>
							  <td style="padding-left:10px;" id="citydiv"><select name="city_id" class="forminput" id="city_id" onchange="getLoc('select_locality.php?city_id='+this.value)">
                                <option value="">Choose City</option>
                                <?php		   
									while($row6=mysql_fetch_array($coun3))
									{
								?>
                                <option value="<?php echo $row6['city_id']; ?>" <?php if($row6['city_id']==$row['city']){ ?> selected="selected" <?php } ?>><?php echo $row6['city_name']; ?></option>
                                <?php		
									}
								?>
                              </select></td>
							</tr>
							
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Phone: </span> </td>
							  <td style="padding-left:10px;">
							   <?php
					  $g=explode("-",$row['phone']);
					  $txtCC=$g[0];					  
					  $txtAC=$g[1];					  
					  $phone=$g[2];					  
					  ?>
							  
							  
							  <input name="txtCC" type="text" class="medforminput" id="txtCC" style="width:40px;" onfocus="if (this.value == '91') this.value = '';" onkeyup="check_phone('txtCC')" value="<?php echo $txtCC; ?>" size="10" maxlength="10" />
								-
								<input name="txtAC" type="text" class="medforminput" id="txtAC" size="10" maxlength="10" style="width:50px;" onfocus="if (this.value == 'Area Code') this.value = '';" value="<?php echo $txtAC; ?>" onkeyup="check_phone('txtAC')" />
								-
								<input name="phone" type="text" value="<?php echo $phone; ?>" class="medforminput" id="phone" size="10" maxlength="10" style="width:120px;" onkeyup="check_phone('txtPhone')" />                          </td>
							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Mobile: </span> </td>
							  <td style="padding-left:10px;"><input name="mobile" type="text" value="<?php echo $row['mobile']; ?>" class="forminput" id="mobile">                          </td>
							</tr>
							<tr>								</tr>
								<tr>
								<td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        profile Details                                 </span>                                </div>                            </td>
							</tr>
							<tr>
							  <td height="40" width="250px" valign="top"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Profile: </span> </td>
							  <td style="padding-left:10px;"><textarea name="profile_text" cols="50" rows="7" id="profile_text"  style="height:100px;" onkeydown="textCounter(document.MatriForm.profileby,document.MatriForm.remLen1,1000)" onkeyup="textCounter(document.MatriForm.profileby,document.MatriForm.remLen1,1000)" class="forminput"> <?php echo $row['profile_text']; ?></textarea>
								  <br />
								  <input name="remLen1" type="text" class="bodylight" value="1000" size="4" maxlength="4" readonly />                          </td>
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td><span style="font-size:11px; color:#999999;">You could enter details about you or a brief description about yourself.<br />
									<span class="style2">Min 50</span> chas and <span class="style2">Max 1000 chars</span>. (If Profile contains ay details about your <br />
								contact information like e-mail,phone number, etc. Your profile will be rejected)</span></td>
							</tr>
							<tr >							</tr>
							<tr >
							  <td colspan="2" height="30px" bgcolor="#CCCCCC">
                                <div align="left">
                                    <span class="text" style="color:#660000; font-weight:bold;font-size:13px;">
                                        Partner Preferences                                    </span>                                </div>                            </td>
							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Looking For: </span> </td>
							  <td style="font-size:13px; padding-left:10px;"  class="text"><input name="looking_for" type="radio"  value="Unmarried" id="looking_for" <?php if($row['looking_for']=="Unmarried"){  ?> checked="checked" <?php } ?> />
								Unmarried&nbsp;&nbsp;&nbsp;
								<input name="looking_for" type="radio"  value="widow/widower" <?php if($row['looking_for']=="widow/widower"){  ?> checked="checked" <?php } ?> id="looking_for" />
								Widow/Widower &nbsp;&nbsp;&nbsp;
								<input name="looking_for" type="radio"  value="Divorcee" id="looking_for" <?php if($row['looking_for']=="Divorcee"){  ?> checked="checked" <?php } ?> />
								Divorcee&nbsp;&nbsp;&nbsp;
								<input name="looking_for" type="radio"  value="Separated" id="looking_for" <?php if($row['looking_for']=="Separated"){  ?> checked="checked" <?php } ?> />
								Separated </td>
							</tr>
							<tr>							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Country Living in: </span> </td>
							  <td style="padding-left:10px;"><select name="part_country_living" class="forminput" id="part_country_living">
								  <option value="Does Not Matter">Select Country</option>
								  <?php
					$h=mysql_query("SELECT * FROM country");
					while($d=mysql_fetch_array($h))
					{
					?>	<option value="<?php echo $d['country_id']; ?>" <?php if(isset($row['part_country_living']) && $row['part_country_living']!='' && $row['part_country_living']==$d['country_id']){ ?>selected="selected" <?php } ?>><?php echo $d['country_name']; ?></option>
								  <?php
					}
					?>
								</select>                          </td>
							</tr>
							<tr>							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Religion: </span> </td>
							  <td style="padding-left:10px;"><select name="religion_id1" id="religion_id1" class="forminput" onchange="getCaste('getcaste.php?religion_id1='+this.value)">
                                <option value="">Select Religion</option>
                                <?php
								  $relrr=mysql_query("select * from religion");
									while($row23=mysql_fetch_array($relrr))
									{
											
					?>
                                <option value="<?php echo $row23['religion_id']; ?>" <?php if($row23['religion_id']==$row['part_religion']){ ?> selected="selected" <?php } ?>><?php echo $row23['religion_name']; ?></option>
                                <?php
									}
								?>
                              </select></td>
							</tr>
							<tr>
							  <td height="40" width="160px"><font id="star" style="padding-left:10px;">*</font>&nbsp; <span style="font-size:13px; padding-left:5px;"> Caste: </span> </td>
							  <td style="padding-left:10px;" id="caste1div"><select name="caste_id1" id="caste_id1" class="forminput" >
								  <option value="">Choose Caste</option>
								  <?php
								$relss=mysql_query("select * from caste where caste_id='".$row['part_caste']."'");
									while($row24=mysql_fetch_array($relss))
									{
								?>
								  <option value="<?php echo $row24['caste_id']; ?>" <?php if(isset($row['part_caste']) && $row['part_caste']!='' && $row['part_caste']==$row24['caste_id']){ ?>selected="selected" <?php } ?>><?php echo $row24['caste_name']; ?></option>		  
								<?php
									}
								?>
								</select> </td>
							</tr>
					
						<tr>	
								<td  height="35">&nbsp;</td>
								<td>
									<input name="terms" type="checkbox"  id="terms" value="<?php echo $row['terms']; ?>" checked="checked" disabled="disabled">
									<a href="../../matrimonial(12-4)/administrator/cms.php?cms_id=12" target="_blank" style="text-decoration:none;font-weight:bold;" class="green_text">I Accept the terms and Conditions </a>                            </td>
							</tr>
							<tr>
							<td height="40">&nbsp;</td>
							<td style="padding-left:10px;"><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='member.php'" /></td>
						   </tr>
						</table>
				  </form>
					</td>
				</tr>
			</table>		
			</div>
			<div id="footer">
				<?php include('footer.php'); ?>
			</div>
		</div>
	</body>
	</html>
	
	
<?php
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		//print_r($_REQUEST);
		$firstname=$_POST['firstname'];			 
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];	
		$theyear=$_POST['theyear'];
		$themonth=$_POST['themonth'];
		$theday=$_POST['theday'];	
	    $birthdate=$theyear."-".$themonth."-".$theday; 	
		$m_status=$_POST['m_status'];	 
		$tot_children=$_POST['tot_children'];	 
		$status_children=$_POST['status_children'];	 		
		$m_tongue=$_POST['m_tongue'];	 
		$religion=$_POST['religion_id'];	 
		$caste=$_POST['caste'];	
		echo $caste."<br>";
		$email=$_POST['email'];	 
	    $password=md5($_POST['password']);	 
		$cpassword=$_POST['cpassword']; 	
		$education=$_POST['education'];	 
		$edu_detail=$_POST['edu_detail'];	 
		$occupation=$_POST['occupation'];	 
		$emp_in=$_POST['emp_in'];		 
		$weight=$_POST['weight'];		 
		$height=$_POST['height'];		 
		$b_group=$_POST['b_group'];		 
		$complexion=$_POST['complexion'];		 
		$address=$_POST['address'];		 
		$country_id=$_POST['country_id'];		 
		$state_id=$_POST['state_id'];		 
		$city_id=$_POST['city_id'];	
		$txtCC=$_POST['txtCC'];
		$txtAC=$_POST['txtAC'];
		$phone=$_POST['phone'];
		$phone=$txtCC."-".$txtAC."-".$phone;
		$mobile=$_POST['mobile'];		 
		$residence=$_POST['residence'];
		$profile_text=$_POST['profile_text'];		 
		$looking_for= $_POST['looking_for'];	  
		$part_country_living=$_POST['part_country_living'];	
		$part_religion=$_POST['religion_id1'];	  
		$part_caste=$_POST['caste_id1'];
		echo $part_caste."<br>";	
		$adminrole_id=$_POST['adminrole_id'];
		$adminrole_view_status=$_POST['adminrole_view_status'];

		//print_r($_REQUEST);
		$sql2="select * from admin_role where role_name='". $_SESSION['role'] ."'";
			$res2=mysql_query($sql2);
			$rr=mysql_fetch_array($res2);
			
		$rid=$rr['role_id']; 
		$index=$_REQUEST['index_id'];	
		
		$phone=$_POST['txtCC']."-".$_POST['txtAC']."-".$_POST['phone']; 
		
		if($_POST['password']=="")
		{
		$sql1="update register set firstname='$firstname',lastname='$lastname',gender='$gender',birthdate='$birthdate',m_status='$m_status',tot_children='$tot_children',status_children='$status_children',m_tongue='$m_tongue',religion='$religion',caste='$caste',email='$email',education='$education',edu_detail='$edu_detail',income='$income',occupation='$occupation',emp_in='$emp_in',weight='$weight',height='$height',b_group='$b_group',complexion='$complexion',address='$address',country_id='$country_id',state_id='$state_id',city='$city_id',phone='$phone',mobile='$mobile',profile_text='$profile_text',looking_for='$looking_for',part_country_living='$part_country_living',part_religion='$part_religion',part_caste='$part_caste',adminrole_id='$rid',adminrole_view_status='Yes' where index_id='$index'";
		$res=mysql_query($sql1) or die(mysql_error()); 
		echo "<script>window.location='member.php'</script>";
		}
		else
		{
		$sql2="update register set firstname='$firstname',lastname='$lastname',gender='$gender',birthdate='$birthdate',m_status='$m_status',tot_children='$tot_children',status_children='$status_children',m_tongue='$m_tongue',religion='$religion',caste='$caste',email='$email',password='$password',education='$education',edu_detail='$edu_detail',income='$income',occupation='$occupation',emp_in='$emp_in',weight='$weight',height='$height',b_group='$b_group',complexion='$complexion',address='$address',country_id='$country_id',state_id='$state_id',city='$city_id',phone='$phone',mobile='$mobile',profile_text='$profile_text',looking_for='$looking_for',part_country_living='$part_country_living',part_religion='$part_religion',part_caste='$part_caste',adminrole_id='$rid',adminrole_view_status='Yes' where index_id='$index'";
		 	
		$res=mysql_query($sql2) or die(mysql_error()); 
		
		
	 
		echo "<script>window.location='member.php'</script>";
		}
	}
?>