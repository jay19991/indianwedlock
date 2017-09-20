<?php
session_start();
include('../connect/config2.php');
require_once('../BusinessLogic/class.register.php');
include("secure.php");
ob_start();
   function RandomPassword() 
	 {
				$chars = "abcdefghijkmnopqrstuvwxyz023456789";
				srand((double)microtime()*1000000);
				$i = 0;
				$pass = '' ;
				
				while ($i <= 7) {
				$num = rand() % 33;
				$tmp = substr($chars, $num, 1);
				$pass = $pass . $tmp;
				$i++;
				}
	   return $pass;
	}
	
$pswd = RandomPassword();

$sql="select * from sms_settings";
$rr=mysql_query($sql);
$sms=mysql_fetch_array($rr);
$stremail = $_REQUEST['email'];
//echo "update register set matri_id=concat(prefix,index_id),cpassword='$pswd' where email='$stremail'";
$up = mysql_query("update register set matri_id=concat(prefix,index_id),cpassword='$pswd' where email='$stremail'")or die("Could not update data because ".mysql_error());
	
$sql="select * from sms_settings";
$rr=mysql_query($sql);
$sms=mysql_fetch_array($rr);
$stremail = $_GET['email'];

if($sms['reg_email']=='Yes')
{

$result = mysql_query("SELECT * FROM register,site_config,sms_settings where email = '$stremail' ");
$row = mysql_fetch_array($result);


$website = $row['web_name'];
$wfname = $row['web_frienly_name'];
$name = $row['firstname']." ".$row['lastname'];
$matriid = $row['matri_id'];
$sitename = $info['web_name'];
$to = $_GET['email'];
$from = $info['contact_email'];

$subject = "Register Confirmation For $sitename ";	
	
	$message = "
	    <html>
		<style type='text/css'>
		.green_text
		{
			font-family:Lucida Sans, Arial;
			font-size:14px;
			font-weight:900;
			color:#727b0b;
		}
		
		.red_text
		{
			font-family:Lucida Sans, Arial;
			font-size:14px;
			font-weight:900;
			color:#7e0000;
		}
		</style>
	    <body>		
		<table width='98%' style='border:double 5px #727B0B; margin:10px;' cellspacing='20px'>
	    <tr>
        <td>
            <table width='100%' height='auto' border='0' style='margin-left:auto; margin-right:auto;'>
                <tr>
                    <td width='10%' align='left' class='green_text'>
                       <img src='$sitename/images/$logo' border='none' height='60px'>
                    </td>
                </tr>
                <tr>
                	<td height='15px' valign='top'>
                    	<hr color='#7e0000' />
                    </td>
                </tr>
                <tr>
                	<td  class='green_text' style='font-size:18px; text-decoration:underline; color:#727b0b;font-family:Lucida Sans, Arial;'>
                    	 Registration Confirmation
                    </td>
                </tr>
				
			     <tr>
                	<td style='padding-top:10px; line-height:25px; font-family:Lucida Sans, Arial;font-size:14px;font-weight:900;color:#7e0000;' align='justify'>
             
						   Dear, $name </br> 
							 Welcome To, $sitename<br>
						  <p>Thank you for choosing our matrimony services to find your life partner.</p>
<p>$sitename, the Most Successful Matrimony Portal for Indians.</p>
                </td>
                </tr>
                <tr>
                	<td height='15px' valign='top'>
                    	<hr color='#7e0000' />
                    </td>
                </tr> 
                <tr>
                	<td class='red_text' style='padding-top:10px; line-height:25px;' align='center'>
                    	&nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href='$sitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>About Matrimonial</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
                        <a href='$sitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>Our Standards</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
						<a href='$sitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>Facilities</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
						<a href='$sitename/register.php' target='_blank' class='green_text' style='text-decoration:none;'>Register Now</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp;
						<a href='$sitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>Customer Care</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
						<a href='$sitename/contact.php' target='_blank' class='green_text' style='text-decoration:none;'>Contact Us</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp;
                        
                    </td>
                </tr>                               
            </table>
        </td>
    </tr>
</table>	
		</body>
		</html>
		";
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:'.$from."\r\n"
		.'Reply-To: $to'."\r\n";
		$ans = mail($to,$subject, $message, $headers); 
}
if($sms['reg_sms']=='Yes')
{

	$smsres = mysql_query("SELECT * FROM register,site_config,sms_settings,sms_config where email = '$stremail' ");
	$row = mysql_fetch_array($smsres);
	
	$password = $row['cpassword'];
			$sitename = $info['web_name'];
			$ID=$row['sms_uname'];
			$Pwd=$row['sms_pswd'];
			$baseurl =$row['sms_baseurl'];
			/*$ID = "erealestatescript@gmail.com";
			$Pwd = "aaa123456";
			$baseurl ="http://businesssms.co.in";*/
			
			$mno=$row['mobile'];
			
			$Text ="Register Successfully On $sitename";
			//Invoke HTTP Submit url
			
			$url = "$baseurl/dpanel/sms.aspx?uid=$ID&pwd=$Pwd&mno=$mno&msg=$Text&sender=SAIEDU";
			 //do sendmsg call
			$ret = file($url);
			//Process $ret to check whether it contains "Message Submitted"
			echo "Message Sent Successfully...";
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script language="javascript" src="../js/timepicker.js"></script>

<style>
.forminput
{
width:300px;
height:25px;
line-height:22px;
border:1px solid #666666;
}
.forminput1 {width:300px;
height:25px;
line-height:22px;
border:1px solid #666666;
}
</style>

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
               <span class="red_text">Add Member Confirmation</span>                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form action="add_member_submit.php" method="post" name="MatriForm"  onsubmit="return Validate()" >
					  <table style="border:solid 5px #7e0000;" width="1000px" height="100" class="green_text">
                      
                        <tr>
                          <td height="40" width="257" style="padding-left:20px; "> Successfully Add Member. and confirmation mail or message will be sent to member.</td>
                        </tr>
						 <tr>
                            <tr>
                       
                        <td style="border:none;"><img src="images/btn_cancel.gif" onclick="window.location='member.php'" /></td>
                       </tr>
                        </tr>
                      </table>
					</form>            	</td>
            </tr>
        </table>		
        </div>
        <div id="footer">
        	<?php include('footer.php'); ?>
        </div>
    </div>
 </center>
</body>
</html>
