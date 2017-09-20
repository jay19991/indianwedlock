<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.payment_option.php");
	$ob=new payment_option();
	$pay_id=$_GET['pay_id'];
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$pay_name=mysql_real_escape_string($_POST['pay_name']);
		$email=mysql_real_escape_string($_POST['email']);
		$status=$_POST['status'];		
		$ob->update_pay($pay_id,$pay_name,$pay_email,$status);
			
		if(isset($_REQUEST['page']) and $_REQUEST['page']!='')
		{
			echo "<script>window.location='payment_option?page=".$_REQUEST['page']."'</script>";
		}
		else
		{
			echo "<script>window.location='payment_option.php'</script>";
		}
	}
	
	$result=$ob->get_payment_method_by_id($pay_id);
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
	$("#religionform").validate({
		rules: {
			pay_name: "required",
			pay_email: {
				required: true,
				email: true
			},
			status: "required"
			
		},
		messages: {
			pay_name: " Please enter payment method",
			pay_email: {
				required: " Please Enter Email Id",
				email: " Please Enter valid Email Id"
			},
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
               <span class="red_text">Edit Payment Option Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="religionform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="597">
                        <tr>
                        <td height="40" width="150"><font id="star">*</font>&nbsp;<span class="con_title">Payment Method:</span></td>
                        <td width="427" class="errormsg"><input name="pay_name" type="text" id="pay_name" value="<?php echo $row['pay_name']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
                        <tr>
                        <td height="40" width="150"><font id="star">*</font>&nbsp;<span class="con_title">Email Id:</span></td>
                        <td width="427" class="errormsg"><input name="pay_email" type="text" id="pay_email" value="<?php echo $row['pay_email']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span class="con_title">Status:</span></td>
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
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='payment_option.php'" /></td>
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
