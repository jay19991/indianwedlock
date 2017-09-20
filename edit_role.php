<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.adminrole.php");
	
	$role_id=$_REQUEST['role_id'];
	$ob=new adminrole();
	
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$role_name=mysql_real_escape_string($_POST['role_name']);
		$profile_add=$_POST['profile_add'];
		$profile_edit=$_POST['profile_edit'];
		$profile_delete=$_POST['profile_delete'];
		$profile_email=$_POST['profile_email'];
		$profile_read_only=$_POST['profile_read_only'];
		$profile_status=$_POST['profile_status'];
		$video_status=$_POST['video_status'];
		$chat_status=$_POST['chat_status'];
		$matching_status=$_POST['matching_status'];
		$wp_status=$_POST['wp_status'];
		$adv_status=$_POST['adv_status'];
		$cms_status=$_POST['cms_status'];
		$payment_status=$_POST['payment_status'];
		$mship_status=$_POST['mship_status'];
		$member_status=$_POST['member_status'];
		$user_status=$_POST['user_status'];
		$site_status=$_POST['site_status'];
		$approval_status=$_POST['approval_status'];
		$status=$_POST['status'];
				
		$ob->update_adminrole($role_id,$role_name,$profile_add,$profile_edit,$profile_delete,$profile_email,$profile_read_only,$profile_status,$video_status,$chat_status,$matching_status,$wp_status,$adv_status,$cms_status,$payment_status,$mship_status,$member_status,$user_status,$site_status,$approval_status,$status);
		echo "<script>window.location='adminrole.php'</script>";
	}
	
	$result=$ob->get_role_by_id($role_id);
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
	$("#roleform").validate({
		rules: {
			role_name: "required",
			profile_add: "required",
			profile_edit: "required",
			profile_delete: "required",
			profile_email: "required",
			profile_read_only: "required",
			profile_status: "required",
			video_status: "required",
			chat_status: "required",
			matching_status: "required",
			wp_status: "required",
			adv_status: "required",
			cms_status: "required",
			payment_status: "required",
			mship_status: "required",
			member_status: "required",
			user_status: "required",
			site_status: "required",
			approval_status: "required",
			status: "required"			
		},
		messages: {
			role_name: " Please Enter Role Name",
			profile_add: " Choose Profile Add Status",
			profile_edit: " Choose Profile Edit Status",
			profile_delete: " Choose Profile Delete Status",
			profile_email: " Choose Profile Email Status",
			profile_read_only: " Choose Profile Read Only Status",
			profile_status: " Choose Profile Status Change",
			video_status: " Choose Video Status",
			chat_status: " Choose Customer Chat Status",
			matching_status: " Choose Profile matching Status",
			wp_status: " Choose Wedding Planner Control Status",
			adv_status: " Choose Advertise Control Status",
			cms_status: " Choose CMS Control Status",
			payment_status: " Choose Payment Control Status",
			mship_status: " Choose Membership Control Status",
			member_status: " Choose Member Control Status",
			user_status: " Choose User Control Status",
			site_status: " Choose Website Control Status",
			approval_status: " Choose Approval Control Status",
			status: " Choose Role Status"
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
               <span class="red_text">Edit User Role </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="roleform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="701">
                      <tr>
                        <td height="40" width="367"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Role Name:</span></td>
                        <td width="314" class="errormsg"><input name="role_name" type="text" id="role_name" value="<?php echo $row['role_name'];  ?>" style="width:150px;" />&nbsp;</td>
                      </tr>
                        <tr>
					   <td height="40" colspan="2"><span style="font-size:13px; padding-left:5px;" class="red_text">Privileges To Users</span></td>
						</tr>
					    <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Add:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="profile_add" type="radio" value="Yes" <?php if($row['add_rights']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="profile_add" type="radio" value="No" <?php if($row['add_rights']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
					   <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow  Edit:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="profile_edit" type="radio" value="Yes" <?php if($row['edit_rights']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="profile_edit" type="radio" value="No" <?php if($row['edit_rights']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg" >
						</td>
						</tr>
						</table>
						</td>
                       </tr>
                       
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Delete:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="profile_delete" type="radio" value="Yes" <?php if($row['delete_rights']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="profile_delete" type="radio" value="No" <?php if($row['delete_rights']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;					</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                          <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Email:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="profile_email" type="radio" value="Yes" <?php if($row['email']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="profile_email" type="radio" value="No" <?php if($row['email']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;					</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
					   <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Read Only:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="profile_read_only" type="radio" value="Yes" <?php if($row['read_only']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="profile_read_only" type="radio" value="No" <?php if($row['read_only']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;						</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
					   <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Status Change:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="profile_status" type="radio" value="Yes" <?php if($row['profile_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="profile_status" type="radio" value="No" <?php if($row['profile_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
					 
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Video Control:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="video_status" type="radio" value="Yes" <?php if($row['video_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="video_status" type="radio" value="No" <?php if($row['video_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Chat Control:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="chat_status" type="radio" value="Yes" <?php if($row['chat_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="chat_status" type="radio" value="No" <?php if($row['chat_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
					   <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Matching Status:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="matching_status" type="radio" value="Yes" <?php if($row['matching_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="matching_status" type="radio" value="No" <?php if($row['matching_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
					   <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Wedding Planner(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="wp_status" type="radio" value="Yes" <?php if($row['wp_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="wp_status" type="radio" value="No" <?php if($row['wp_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
					   <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Advertisement(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="adv_status" type="radio" value="Yes" <?php if($row['adv_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="adv_status" type="radio" value="No" <?php if($row['adv_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
                       
                    
					   
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control CMS(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
							<input name="cms_status" type="radio" value="Yes" <?php if($row['cms_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="cms_status" type="radio" value="No" <?php if($row['cms_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;						</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                       
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Payment(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
							<input name="payment_status" type="radio" value="Yes" <?php if($row['payment_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="payment_status" type="radio" value="No" <?php if($row['payment_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;						</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                       
                       
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Membership(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="mship_status" type="radio" value="Yes" <?php if($row['mship_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="mship_status" type="radio" value="No" <?php if($row['mship_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;							</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                       
                       
                          <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Member(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
							<input name="member_status" type="radio" value="Yes" <?php if($row['member_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="member_status" type="radio" value="No" <?php if($row['member_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;						</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                       
                       
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control User(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
							<input name="user_status" type="radio" value="Yes" <?php if($row['user_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="user_status" type="radio" value="No" <?php if($row['user_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;						</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                       
                       
                         <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Approval(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
							<input name="approval_status" type="radio" value="Yes" <?php if($row['approval_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="approval_status" type="radio" value="No" <?php if($row['approval_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;						</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
                       
                   
                       
                       
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Control Website Parameters(Menu):</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
									<input name="site_status" type="radio" value="Yes" <?php if($row['site_status']=="Yes"){  ?> checked="checked" <?php } ?> />Yes&nbsp;&nbsp;<input name="site_status" type="radio" value="No" <?php if($row['site_status']=="No"){  ?> checked="checked" <?php } ?> />No&nbsp;&nbsp;				</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
						</table>						</td>
                       </tr>
					   
					    <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td><table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" <?php if($row['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($row['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table></td>
                       </tr>
					   
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='adminrole.php'" /></td>
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
