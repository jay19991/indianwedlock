<?php
	
	require("../connect/config2.php");
	require("secure.php");
	include("../BusinessLogic/class.adminuser.php");
	$username=$_SESSION[username];
	
	$mes="";
/*	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$uname=$_SESSION['uname'];
		$pswd=md5(mysql_real_escape_string($_POST['oldpswd']));
		$newpswd=md5(mysql_real_escape_string($_POST['newpswd']));		
		$ob=new adminuser();
		$mes=$ob->change_password($uname,$pswd,$newpswd);
		echo "<script>window.location='index.php'</script>";
	}*/
	
	
	if(isset ($_POST['submit']) and $_POST['submit']!='')
	{
		$pswd = trim(md5($_POST['oldpswd']));
		$newpswd = trim(md5($_POST['newpswd']));		
		$sql = "SELECT * FROM admin_users WHERE uname='$username'";
		$qsql=mysql_query($sql);
		$fet=mysql_fetch_array($qsql);
	
		
		if($pswd==$fet['pswd'])
		{ 		
			$sql="UPDATE admin_users SET pswd='$newpswd' where uname='$username' and pswd='$pswd'";
			mysql_query($sql) or mysql_error();
			$mes="Your Password Has Been Changed.";		
		}
		else
		{
			$mes="Please Enter Correct Old Password.";
		}		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript">
	function validchangeform()
	{
		var oldpwd,npwd,cpwd;
		oldpwd=document.getElementById("oldpswd");
		npwd=document.getElementById("newpswd");		
		cpwd=document.getElementById("conpswd");
		
		if(oldpwd.value=='')
		{
			alert("Please Enter Old Password.");
			oldpwd.focus();
			return false;
		}
		
		if(oldpwd.value.length<6)
		{
			alert("Enter atleast 6 characters.");
			oldpwd.focus();
			return false;
		}
				
		if(npwd.value=='')
		{
			alert("Please Enter New Password.");
			npwd.focus();
			return false;
		}
		
		if(npwd.value.length<6)
		{
			alert("Enter atleast 6 characters.");
			npwd.focus();
			return false;
		} 		
		
		if(cpwd.value=='')
		{
			alert("Please Enter Confirm Password.");
			cpwd.focus();
			return false;
		}

		if(cpwd.value.length<6)
		{
			alert("Enter atleast 6 characters.");
			cpwd.focus();
			return false;
		} 
				
		if(npwd.value != cpwd.value)
		{
			alert("Confirm Password does not match.");
			cpwd.focus();
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
               <span class="green_text">Change Password</span>
                </td>
               </tr> 
                <tr>
				  <td style="border:none;">&nbsp;</td>
				  </tr>
                  <tr>
				  <td class="red_text" style="border:none;" align="center"><?php echo $mes; ?></td>
				  </tr>
                  
              <tr>
            	<td style="border:none;"> 
                <form id="changepswd" action="" method="post" onsubmit="return validchangeform();">      
                    <table style="border:solid 5px #7e0000;" width="400px" align="center">
                    
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:12px; padding-left:5px;">Old Password:</span></td>
                        <td><input name="oldpswd" id="oldpswd" type="password" style="width:150px;" /></td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:12px; padding-left:5px;">New Password:</span></td>
                        <td><input name="newpswd" id="newpswd" type="password" style="width:150px;" /></td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:12px; padding-left:5px;">Confirm Password:</span></td>
                        <td><input name="conpswd" id="conpswd" type="password" style="width:150px;" /></td>
                       </tr>
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" id="submit" value="submit" src="images/btn_submit.gif" /><input type="hidden" name="submit" id="submit" value="submit" /></td>
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
