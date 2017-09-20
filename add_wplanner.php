<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.weddingplanner.php");
	include("../BusinessLogic/class.wpcategory.php");

	$exp=new wpcategory(); 
	$result=$exp->get_wpcat($condition);
	
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
	    $wp_cat_id=$_POST['wp_cat_name'];
		$wp_name=mysql_real_escape_string($_POST['wp_name']);		
		$wp_desc=mysql_real_escape_string($_POST['wp_desc']);
		$wp_contact=$_POST['phone'];
		$wp_mobile=$_POST['mobile'];
		$wp_email=$_POST['email'];
		$wp_rate_from=$_POST['ratefrom'];
		$wp_rate_to=$_POST['rateto'];
		$status=$_POST['status'];
		
		$ob=new weddingplanner();
		$ob->add_wp($wp_cat_id,$wp_name,$wp_desc,$wp_contact,$wp_mobile,$wp_email,$wp_rate_from,$wp_rate_to,$status);	
		echo "<script>window.location='wplanner.php'</script>";
	}
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
	$("#wpform").validate({
		rules: {
		wp_cat_name: "required",
			wp_name: "required",
			wp_desc: "required",
			phone: {
				digits: true				
			},
			mobile: {
				required: true,
				digits: true				
			},
			email: {
				required: true,
				email: true
			},
			ratefrom: {
				required: true,
				number: true
			},
			rateto: {
				required: true,
				number: true
			},
			status: "required"
			
		},
		messages: {
		wp_cat_name: " Please choose category",
			wp_name: " Please Enter Planner Name",
			wp_desc: " Provide Business Description",
			phone: {
				digits: " Phone number Should in Digits"				
			},
			mobile: {
				required: " Please Enter Mobile Number",
				digits: " Mobile number Should in Digits"				
			},
			email: {
				required: " Please Enter Planner Email Id",
				email: " Please Enter valid Email Id"
			},
			ratefrom: {
				required: " Please Enter Rate From",
				number: " Rate From Should be Numeric"
			},
			rateto: {
				required: " Please Enter Rate To",
				number: " Rate To Should be Numeric"
			},
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
               <span class="red_text">Add Wedding Planner Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="wpform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="561">
					<tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Category:</span></td>
                        <td width="395" class="errormsg"> <select name="wp_cat_name" id="wp_cat_name" style="width:150px;">
						  	<option value="">Choose Category</option>
							<?php
								while($row=mysql_fetch_array($result))
								{
							?>
							<option value="<?php echo $row['wp_cat_id']; ?>"><?php echo $row['wp_cat_name']; ?></option>
							<?php
								}
							?>
					      </select>&nbsp;</td>
                       </tr>
                        <tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Planer Name:</span></td>
                        <td width="395" class="errormsg"><input name="wp_name" type="text" id="wp_name" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Description:</span></td>
	                    <td class="errormsg"><textarea name="wp_desc" id="wp_desc" style="width:150px;"></textarea>&nbsp;			
						</td>
                       </tr>
					   <tr>
                        <td height="40" width="168">&nbsp;&nbsp;<span style="font-size:13px; padding-left:5px;">Phone Number:</span></td>
                        <td class="errormsg"><input name="phone" type="text" id="phone" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Mobile Number:</span></td>
                        <td class="errormsg"><input name="mobile" type="text" id="mobile" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Email Id:</span></td>
                        <td class="errormsg"><input name="email" type="text" id="email" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Rate From:</span></td>
                        <td class="errormsg"><input name="ratefrom" type="text" id="ratefrom" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="168"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Rate To:</span></td>
                        <td class="errormsg"><input name="rateto" type="text" id="rateto" value="" style="width:150px;" />&nbsp;</td>
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
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='wplanner.php'" /></td>
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
