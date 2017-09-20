<?php
	include("../connect/config2.php");
	include("secure.php");
	include("secure.php");
	include("../BusinessLogic/class.adminuser.php");
	include("../BusinessLogic/class.adminrole.php");
	
	
	
	
	$role=new adminrole();
	$result=$role->get_role_status();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">


$().ready(function() {

	// validate signup form on keyup and submit
	$("#admin_userform").validate({
		rules: {
			uname: "required",
			pswd: {
				required: true,
				minlength: 5
			},
			
			cpswd: {
				required: true,
				equalTo: "#pswd"
			},
			email: {
				required: true,
				email: true
			},
			role_id: "required",
			status: "required"
			
		},
		messages: {
			uname: " Please Enter User Name",
			pswd: {
				required: " Please Enter Password",
				minlength: " Password should be 5 char long"
			},
			
			cpswd: {
				required: " Please Enter Confirm Password",
				equalTo: "Password do not match"
			},
			email: {
				required: " Please Enter Email Id",
				email: " Please Enter valid Email Id"
			},
			role_id: " Please Select Role",
			status: " Please Select Status"
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
               <span class="red_text">Add Users </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="admin_userform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="619">
                        <tr>
                        <td height="40" width="198"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">User Name:</span></td>
                        <td width="401" class="errormsg"><input name="uname" type="text" id="uname" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="198"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Password:</span></td>
                        <td class="errormsg"><input name="pswd" type="password" id="pswd" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="198"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Confirm Password:</span></td>
                        <td class="errormsg"><input name="cpswd" type="password" id="cpswd" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
                        <tr>
                        <td height="40" width="198"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Email-Id:</span></td>
                        <td class="errormsg"><input name="email" type="text" id="email" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="198"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Role :</span></td>
                        <td class="errormsg"><select name="role_id" id="role_id" style="width:150px;">
						<option value="">Choose Role</option>
						<?php
						   $sql="select * from admin_role where role_id >='2' order by role_id";
			               $result=mysql_query($sql) or mysql_error();
						
							while($row=mysql_fetch_array($result))
							{
						?>	
						<option value="<?php echo $row['role_id']; ?>"><?php echo $row['role_name']; ?></option>
						<?php
							}
						?>					
						</select>&nbsp;</td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" />Inactive&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='admin_user.php'" /></td>
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
		$uname=mysql_real_escape_string(ucwords($_POST['uname']));
		$pswd=md5(mysql_real_escape_string($_POST['pswd']));
		$email=mysql_real_escape_string($_POST['email']);
		$roleid=$_POST['role_id'];
		$status=$_POST['status'];
		
		$r=mysql_query("SELECT * FROM admin_users WHERE uname='$uname'");
		$cnt=mysql_num_rows($r);
		if($cnt==0)
		{
		$ob=new adminuser();
		$ob->add_admin($uname,$pswd,$roleid,$email,$status);			
		echo "<script>alert('You Are Successfully Add User Admin');window.location='admin_user.php'</script>";
		}
		else
		{
		echo "<script>alert('Entered Username Is Already In The List');window.location='admin_user.php';</script>";	
		}
	}
?>