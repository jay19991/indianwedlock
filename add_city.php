<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.city.php");
	include("../BusinessLogic/class.country.php");
	
	
	$cnob=new country();
	$rescn=$cnob->get_country_by_status();
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">


$(document).ready(function() {

	// validate signup form on keyup and submit
	$("#cityform").validate({
		rules: {
			country: "required",
			city: "required",
			status: "required"
			
		},
		messages: {
			country: " Please choose country",
			city: " Please enter city",
			status: " Please select status"
		},
		errorPlacement: function(error, element) {
			if ( element.is(":radio"))
				error.appendTo(element.parent().next());
			else if ( element.is(":checkbox") )
				error.appendTo (element.parent());
			else
				error.appendTo(element.parent());
		}
	});
});
</script>
<script type="text/javascript">
function showstate(str)
{
if (str=="")
  {
  document.getElementById("state").innerHTML="<option value=''>Choose State</option>";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("state").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getstate.php?q="+str,true);
xmlhttp.send();
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
               <span class="red_text">Add City Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="cityform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="530px">
					<tr>
                        <td height="40" width="160px"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Country:</span></td>
                        <td class="errormsg">
						  <select name="country" id="country"  onChange="showstate(this.value)" style="width:150px;">
						  	<option value="">Choose Country</option>
							<?php
								while($row=mysql_fetch_array($rescn))
								{
							?>
							<option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
							<?php
								}
							?>
					      </select>&nbsp;
						</td>
                      </tr>
					  
					  <tr>
                        <td height="40" width="160px">&nbsp;&nbsp;&nbsp;<span style="font-size:13px; padding-left:5px;">State:</span></td>
                        <td class="errormsg">
						  <select name="state" id="state" style="width:150px;">
						  	<option value="">Choose State</option>							
					      </select>&nbsp;
						</td>
                      </tr>
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">City Name:</span></td>
                        <td class="errormsg"><input name="city" type="text" id="city" value="" style="width:150px;"/>
                        &nbsp;</td>
                       </tr>					   					   
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td><table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" />Inactive&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table></td>
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='city.php'" /></td>
                       </tr>
	                </table>
					</form>
            	</td>
            </tr>
       
        </table>		
        </div>
        <div id="footer" style="margin-top:250px;">
        	<?php include('footer.php'); ?>
        </div>
    </div>
 </center>
</body>
</html>
<?php
if(isset($_POST['submit']) and $_POST['submit']!='')
	{	
		$country_id=$_POST['country'];
		$state_id=$_POST['state'];
		$city_name=mysql_real_escape_string(ucwords($_POST['city']));
		$status=$_POST['status'];
		
		$r=mysql_query("SELECT * FROM city WHERE city_name='$city_name' AND country_id='$country_id' AND state_id='$state_id'");
		$cnt=mysql_num_rows($r);
		if($cnt==0)
		{
		$ob=new city();
		$ob->add_city($state_id,$country_id,$city_name,$status);
		echo "<script>alert('You Are Successfully Enter Records');window.location='city.php'</script>";	
		}
		else
		{
		echo "<script>alert('Entered City Is Already In The List');window.location='city.php';</script>";
		}
	}
?>