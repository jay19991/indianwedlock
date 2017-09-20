<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.memplan.php");
	
	
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
	$("#planform").validate({
		rules: {
			plan_name: "required",
			plan_display: "required",
			plan_contacts: {
				required: true,
				digits: true
			},			
			plan_duration: "required",
			plan_amount: {
				required: true,
				number: true
			},
			plan_offers: "required",
			plan_free_msg: {
				required: true,
				digits: true
			},
			profile: {
				required: true,
				number: true
			},
			chat: "required",
			video: "required",
			status: "required"
			
		},
		messages: {
			plan_name: " Please Enter Plan Name",
			plan_display: " Please Enter Display Name",
			plan_contacts: {
				required: " Please Enter No of Contacts",
				digits: " Amount should be in Digits",
			},			
			plan_duration: " Please Enter Duration",
			plan_amount: {
				required: " Please Enter Plan Amount",
				number: " Amount should be Numeric"
			},
			plan_offers: "Please Enter Plan Offers",
			plan_free_msg: {
				required: " Enter No of Free Messages",
				digits: " Please Enter value in Digits"
			},
			profile: {
				required: " Please Enter No Of Profile To View",
				number: " Profile should be Numeric"
			},
			chat: " Choose Allow Chat Status",
			video: " Choose Allow Vedio Status",	
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
               <span class="red_text">Add Membership Plan Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="planform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="607">
                        <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Plan Name:</span></td>
                        <td width="397" class="errormsg"><input name="plan_name" type="text" id="plan_name" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Plan Display:</span></td>
                        <td class="errormsg"><input name="plan_display" type="text" id="plan_display" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">No of Contacts:</span></td>
                        <td class="errormsg"><input name="plan_contacts" type="text" id="plan_contacts" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Plan Duration(Days):</span></td>
                        <td class="errormsg">
						<input name="plan_duration" type="text" id="plan_duration" value="" style="width:150px;" />
						<!--<select id="plan_duration" name="plan_duration" style="width:150px;">
							<option value="">Select Duration</option>
							<option value="1">1 Month</option>
							<option value="2">2 Months</option>
							<option value="3">3 Months</option>
							<option value="4">4 Months</option>
							<option value="5">5 Months</option>
							<option value="6">6 Months</option>
							<option value="7">7 Months</option>
							<option value="8">8 Months</option>
							<option value="9">9 Months</option>
							<option value="10">10 Months</option>
						</select>
-->						&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Plan Amount:</span></td>
                        <td class="errormsg"><input name="plan_amount" type="text" id="plan_amount" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					     <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Plan Offers:</span></td>
                        <td class="errormsg"><textarea name="plan_offers" id="plan_offers" style="width:150px;"></textarea>&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Allow Messages:</span></td>
                        <td class="errormsg"><input name="plan_free_msg" type="text" id="plan_free_msg" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
                   
					    <tr>
                        <td height="40" width="190"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">View Profile:</span></td>
                        <td class="errormsg"><input name="profile" type="text" id="profile" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   
					   <tr>
							<td height="40"><font id="star">*</font>&nbsp;<span style="font-size:12px; padding-left:5px;">Allow Chat:</span></td>
							<td>
							<table>
							<tr>
							<td style="border:none;" class="text">
							<input name="chat" type="radio" value="Yes" />
							Yes&nbsp;&nbsp;
							<input name="chat" type="radio" value="No" />No&nbsp;&nbsp;						</td>
							<td style="border:none;" class="errormsg">						</td>
							</tr>
							</table>
							</td>
				      </tr>
							
							
							<tr>
							<td height="40"><font id="star">*</font>&nbsp;<span style="font-size:12px; padding-left:5px;">Allow Video:</span></td>
							<td>
							<table>
							<tr>
							<td style="border:none;" class="text">
							<input name="video" type="radio" value="Yes"  />
							Yes&nbsp;&nbsp;
							<input name="video" type="radio" value="No"/>No&nbsp;&nbsp;						</td>
							<td style="border:none;" class="errormsg">						</td>
							</tr>
							</table>
							</td>
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
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='memship_plan.php'" /></td>
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
		$plan_name=mysql_real_escape_string(ucwords($_POST['plan_name']));
		$plan_display=mysql_real_escape_string($_POST['plan_display']);
		$plan_contacts=$_POST['plan_contacts'];
		$plan_duration=$_POST['plan_duration'];
		$plan_amount=$_POST['plan_amount'];
		$plan_offers=$_POST['plan_offers'];
		$plan_free_msg=$_POST['plan_free_msg'];
		$profile=$_POST['profile'];
		$status=$_POST['status'];
		$video=$_POST['video'];
		$chat=$_POST['chat'];
		
		$r=mysql_query("SELECT * FROM memship_plan WHERE plan_name='$plan_name'");
		$cnt=mysql_num_rows($r);
		if($cnt==0)
		{		
		$ob=new memplan();		
		$ob->add_plan($plan_name,$plan_display,$plan_contacts,$plan_duration,$plan_amount,$plan_offers,$plan_free_msg,$profile,$chat,$video,$status);	
		echo "<script>alert('You Are Successfully Enter Records');window.location='memship_plan.php'</script>";
		}
		else
		{
		echo "<script>alert('Entered Membership Plan Is Already In The List');window.location='memship_plan.php'</script>";
		}
	}
?>