<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.edu_detail.php");
	$edu_id=$_GET['edu_id'];
	$ob=new edu_detail();
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$edu_name=mysql_real_escape_string($_POST['edu_detail']);
		$status=$_POST['status'];		
		$ob->update_edu($edu_id,$edu_name,$status);
		if(isset($_REQUEST['page']) and $_REQUEST['page']!='')
		{
			echo "<script>window.location='edu_detail.php?page=".$_REQUEST['page']."'</script>";
		}
		else
		{
			echo "<script>window.location='edu_detail.php'</script>";
		}
	}
	
	$edures=$ob->get_edu_by_id($edu_id);
	$edurow=mysql_fetch_array($edures);
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
	$("#edu_detailform").validate({
		rules: {
			edu_detail: "required",
			status: "required"
			
		},
		messages: {
			edu_detail: " Please enter Edu Detail",
			status: " Please select Status"
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
               <span class="red_text">Edit Education Details </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="edu_detailform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="570px">
                        <tr>
                        <td height="40" width="200px"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Education Name:</span></td>
                        <td class="errormsg"><input name="edu_detail" type="text" id="edu_detail" value="<?php echo $edurow['edu_name']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" <?php if($edurow['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($edurow['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='edu_detail.php'" /></td>
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
