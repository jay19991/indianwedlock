<?php

session_start();

require("../connect/config2.php");



$mid = $_GET['id'];

$strsitename = $info['web_name'];
$logo = $info['web_logo_path'];

$sql="select * from sms_settings";

$rr=mysql_query($sql);

$sms=mysql_fetch_array($rr);



$result3 = mysql_query("SELECT * FROM register where matri_id = '$mid'"); 

$rowcc = mysql_fetch_array($result3);



$sconfig = "SELECT * FROM sms_config";

$qconfig = mysql_query($sconfig);

$fconfig = mysql_fetch_array($qconfig);



$suname = $fconfig['sms_uname'];

$pass = $fconfig['sms_pswd'];

$burl = $fconfig['sms_baseurl'];

$url .=$burl;
if($sms['suspend']=='Yes')
{

	$text ="Your Membership on Matrimonial has been Suspended.";

	$mno=$rowcc['mobile']; 

	$sitename = $info['web_name'];

	$request =""; //initialise the request variable

	$param[method]= "sendMessage";

	$param[send_to] = $mno;

	$param[msg] = $text;

	$param[userid] = $suname;

	$param[password] = $pass;

	$param[v] = "1.1";

	$param[msg_type] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”

	$param[auth_scheme] = "PLAIN";

	//Have to URL encode the values

	foreach($param as $key=>$val) 

	{

	$request .= $key."=".urlencode($val);

	//we have to urlencode the values

	$request .= "&";

	//append the ampersand (&) sign after each parameter/value pair

	}

	$request = substr($request, 0, strlen($request)-1);

	//remove final (&) sign from the request

	$url .= $request;
    $ch = curl_init($url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$curl_scraped_page = curl_exec($ch);

	curl_close($ch);
}
?>   

<?php
	$ssql = "UPDATE register SET status='Suspend' WHERE matri_id = '$mid'";

	$fsql = mysql_query($ssql);
	// ***************************************************  customer mail ********************************************
$to1 = $rowcc['email'];
$name=strtoupper($rowcc['firstname']);
$subject1 = "Suspension of account.";
$from1=$info['contact_email'];
$msg = "
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
                       <img src='$strsitename/images/$logo' border='none' height='60px'>
                    </td>
                </tr>
                <tr>
                	<td height='15px' valign='top'>
                    	<hr color='#7e0000' />
                    </td>
                </tr>
                <tr>
                	<td  class='green_text' style='font-size:25px; text-decoration:underline;'>
                    	Suspension of account
                    </td>
                </tr>
				
			     <tr>
                	<td  class='red_text' style='padding-top:10px; line-height:25px;' align='justify'>
             			  <table>
						  	<tr>
								<td>
						  Dear, $name</td></tr>
						 
						  <tr><td>We regret to inform you that your account is temporarily being put on hold/suspended until the problem is resolved. Thanks for your patience. 
						</td></tr> 
						</table>
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
                        <a href='$strsitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>About Matrimonial</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
                        <a href='$strsitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>Our Standards</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
						<a href='$strsitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>Facilities</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
						<a href='$strsitename/register.php' target='_blank' class='green_text' style='text-decoration:none;'>Register Now</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp;
						<a href='$strsitename/cms.php?cms_id=1' target='_blank' class='green_text' style='text-decoration:none;'>Customer Care</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp; 
						<a href='$strsitename/contact.php' target='_blank' class='green_text' style='text-decoration:none;'>Contact Us</a>
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
				$headers1  = 'MIME-Version: 1.0' . "\r\n";
				$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers1 .= 'From:'.$from1."\r\n"
				.'Reply-To: $to1'."\r\n";
				mail($to1,$subject1, $msg, $headers1); 

	print "<script>";
    print " self.location='member.php'"; 
    print "</script>";  
?>     