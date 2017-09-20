<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.payments.php");
	include("../BusinessLogic/class.memplan.php");
	
	$pay_id=$_REQUEST['payid'];
	$ob=new payments();
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$pmatri_id=$_POST['pmatri_id'];
		$pfirstname=mysql_real_escape_string($_POST['pfirstname']);
		$plastname=mysql_real_escape_string($_POST['plastname']);
		$pemail=$_POST['pemail'];
		$paddress=mysql_real_escape_string($_POST['paddress']);
		$paymode=$_POST['paymode']; 	
		$tempdt=strtotime($_POST['pactive_dt']);
		$pactive_dt=date("Y-m-d",$tempdt);
		$p_plan=$_POST['p_plan'];		
		$plan_duration=$_POST['plan_duration'];
		$p_no_contacts=$_POST['p_no_contacts'];
		$p_amount=$_POST['p_amount'];
		$p_bank_detail=mysql_real_escape_string($_POST['p_bank_detail']);
		$ob=new payments();
		$ob->update_payment($pay_id,$pmatri_id,$pfirstname,$plastname,$pemail,$paddress,$paymode,$pactive_dt,$p_plan,$plan_duration,$p_no_contacts,$p_amount,$p_bank_detail);	
		echo "<script>window.location='payment.php'</script>";
	}
	
	$result=$ob->get_payment_by_id($pay_id);
	$row=mysql_fetch_array($result);
	
	$memob=new memplan();
	$memresult=$memob->get_plan_by_status();
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
	$("#paymentform").validate({
		rules: {
			pmatri_id: "required",
			pfirstname: "required",
			plastname: "required",
			pemail: {
				required: true,
				email: true
			},
			paddress: "required",
			paymode: "required",
			pactive_dt: {
				required: true,
				date: true
			},
			p_plan: "required",
			plan_duration: "required",								
			p_no_contacts: "required",
			p_amount: "required",
			p_bank_detail: "required"
		},
		messages: {
			pmatri_id: " Please Enter Matri Id",
			pfirstname: " Please Enter First Name",
			plastname: " Please Enter Last Name",
			pemail: {
				required: " Please Enter Email Id",
				email: " Please Enter Valid Email Id" 
			},
			paddress: " Please Enter Address",
			paymode: " Please Choose Payment Mode",
			pactive_dt: {
				required: " Choose Plan Active Date",
				date: " Please Enter Valid Date"
			},
			p_plan: " Please Choose Plan",
			plan_duration: " Plan Duration Required",								
			p_no_contacts: " No of Contacts Required",
			p_amount: " Plan Amount Required",						 			
			p_bank_detail: " Please Enter Bank Details"
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

function getplandetails(str)
{
if (str=="")
  {
  document.getElementById("plan_duration").value="";
  document.getElementById("p_no_contacts").value="";
  document.getElementById("p_amount").value="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
    document.getElementById("plan_duration").value=xmlhttp1.responseText;
    }
  }
xmlhttp1.open("GET","getpduration.php?q="+str,true);
xmlhttp1.send();

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp2=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
    document.getElementById("p_no_contacts").value=xmlhttp2.responseText;
    }
  }
xmlhttp2.open("GET","getpcontacts.php?q="+str,true);
xmlhttp2.send();

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp3=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp3.onreadystatechange=function()
  {
  if (xmlhttp3.readyState==4 && xmlhttp3.status==200)
    {
    document.getElementById("p_amount").value=xmlhttp3.responseText;
    }
  }
xmlhttp3.open("GET","getpamount.php?q="+str,true);
xmlhttp3.send();
}
</script>

<script language="JavaScript" src="Calender/calendar_us.js"></script>
	<link rel="stylesheet" href="Calender/calendar.css" />
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
               <span class="red_text">Edit Payment Details </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="paymentform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="580">
                        <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">Matrimony Id:</span></td>
                        <td width="379" class="errormsg"><input name="pmatri_id" type="text" id="pmatri_id" value="<?php echo $row['pmatri_id']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>                    
                       <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">First Name:</span></td>
                        <td class="errormsg"><input name="pfirstname" type="text" id="pfirstname" value="<?php echo $row['pfirstname']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">Last Name:</span></td>
                        <td class="errormsg"><input name="plastname" type="text" id="plastname" value="<?php echo $row['plastname']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">Email:</span></td>
                        <td class="errormsg"><input name="pemail" type="text" id="pemail" value="<?php echo $row['pemail']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
						<tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">Address:</span></td>
                        <td class="errormsg"><textarea name="paddress" id="paddress" style="width:150px;"><?php echo $row['paddress']; ?></textarea>&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	Payment Mode:</span></td>
                        <td class="errormsg"><select name="paymode" id="paymode" style="width:150px;">
							<option value="">Payment Mode</option>
							<option value="Cash" <?php if($row['paymode']=="Cash"){ ?> selected="selected" <?php } ?>>Cash</option>
							<option value="Bank Account" <?php if($row['paymode']=="Bank Account"){ ?> selected="selected" <?php } ?>>Bank Account</option>
							<option value="Paypal" <?php if($row['paymode']=="Paypal"){ ?> selected="selected" <?php } ?>>Paypal</option>
						</select>&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	Plan Active Date:</span></td>
                        <td class="errormsg"><input name="pactive_dt" type="text" id="pactive_dt" value="<?php 
				$pdate=strtotime($row['pactive_dt']);
				echo $pactivedate=date("m/d/Y",$pdate);
		 ?>" style="width:150px;" readonly="true" /><script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'paymentform',
		// input name
		'controlname': 'pactive_dt'
	});

	</script>&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	Membership Plan:</span></td>
                        <td class="errormsg">
						<select name="p_plan" id="p_plan" style="width:150px;" onchange="getplandetails(this.value)">
						<option value="">Choose Plan</option>
						<?php
							while($memrow=mysql_fetch_array($memresult))
							{
						?>
							<option value="<?php echo $memrow['plan_id']; ?>" <?php if($row['p_plan']==$memrow['plan_id']) {?> selected="selected" <?php } ?>><?php echo $memrow['plan_name']; ?></option>
						<?php
							}
						?>
						</select>&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	Duration (Months):</span></td>
                        <td class="errormsg"><input name="plan_duration" type="text" id="plan_duration" value="<?php echo $row['plan_duration']; ?>" style="width:150px;" readonly="true" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	No of Contacts:</span></td>
                        <td class="errormsg"><input name="p_no_contacts" type="text" id="p_no_contacts" value="<?php echo $row['p_no_contacts']; ?>" style="width:150px;" readonly="true" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	Payment Amount:</span></td>
                        <td class="errormsg"><input name="p_amount" type="text" id="p_amount" value="<?php echo $row['p_amount']; ?>" style="width:150px;" readonly="true" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:15px; padding-left:5px;">	Bank Details:</span></td>
                        <td class="errormsg"><textarea name="p_bank_detail" id="p_bank_detail" style="width:150px;"><?php echo $row['p_bank_detail']; ?></textarea>&nbsp;</td>
                       </tr>
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='payment.php'" /></td>
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
