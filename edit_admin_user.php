<?php
	ini_set("display_errors",1);
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.adminuser.php");
	include("../BusinessLogic/class.adminrole.php");
	$id=$_GET['id'];
	$ob=new adminuser();
	
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$uname=mysql_real_escape_string($_POST['uname']);
		if($_POST['pswd']=='')
			$pswd=$_POST['opswd'];
		else
			$pswd=md5(mysql_real_escape_string($_POST['pswd']));	
				
		$roleid=$_POST['role_id'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		
		$ob->update_admin($id,$uname,$pswd,$roleid,$email,$status);	
		echo "<script>window.location='admin_user.php'</script>";
	}
	
	$role=new adminrole();
	$roleresult=$role->get_role_status();
	
	$result=$ob->get_admin_by_id($id);
	$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">


$().ready(function() {

	// validate signup form on keyup and submit
	$("#admin_userform").validate({
		rules: {
			uname: "required",
			pswd: {
				minlength: 5
			},			
			cpswd: {
				required: function(element) {
        return $("#pswd").val().length>0;
      			},
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
			pswd: " Password should be 5 char long",
			cpswd: " Please Enter Confirm Password",
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
               <span class="red_text">Edit Users </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="admin_userform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="680">
                        <tr>
                        <td height="40" width="233"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">User Name:</span></td>
                        <td width="427" class="errormsg"><input name="uname" type="text" id="uname" value="<?php echo $row['uname']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="233">&nbsp;&nbsp;&nbsp;<span style="font-size:13px; padding-left:5px;">New Password:</span></td>
                        <td class="errormsg"><input name="pswd" type="password" id="pswd" value="" style="width:150px;" />&nbsp;<input type="hidden" name="opswd" id="opswd" value="<?php echo $row['pswd']; ?>" /> </td>
                       </tr>
					   <tr>
                        <td height="40" width="233">&nbsp;&nbsp;&nbsp;<span style="font-size:13px; padding-left:5px;">Confirm New Password:</span></td>
                        <td class="errormsg"><input name="cpswd" type="password" id="cpswd" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
                       
                        <tr>
                        <td height="40" width="198"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Email-Id:</span></td>
                        <td class="errormsg"><input name="email" type="text" id="email"  style="width:150px;" value="<?php echo $row['email']; ?>"/>&nbsp;</td>
                       </tr>
                       
					   <tr>
                        <td height="40" width="233"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Role :</span></td>
                        <td class="errormsg"><select name="role_id" id="role_id" style="width:150px;">
						<option value="">Choose Role</option>
						<?php
						   $sql="select * from admin_role where role_id >='2' order by role_id";
			               $roleresult=mysql_query($sql) or mysql_error();
						   
							while($rolerow=mysql_fetch_array($roleresult))
							{
						?>	
						<option value="<?php echo $rolerow['role_id']; ?>" <?php if($row['role_id']==$rolerow['role_id']){ ?> selected="selected" <?php } ?>><?php echo $rolerow['role_name']; ?></option>
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
						<input name="status" type="radio" value="1" <?php if($row['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($row['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;
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
