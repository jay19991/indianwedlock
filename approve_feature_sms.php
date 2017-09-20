<?php
session_start();
require("../connect/config2.php");

$recsno=$_GET["recsno"]; 
$data=trim($recsno); 
	$ex=explode(" ",$data); 
	$size=sizeof($ex); 
	
	
	for($i=0;$i<$size;$i++) 
	{ 
		$id=trim($ex[$i]); 

		
$sql="select * from sms_settings";
$rr=mysql_query($sql);
$sms=mysql_fetch_array($rr);

$result3 = mysql_query("SELECT * FROM register where index_id = '$id'"); 
$rowcc = mysql_fetch_array($result3);

$sconfig = "SELECT * FROM sms_config";
$qconfig = mysql_query($sconfig);
$fconfig = mysql_fetch_array($qconfig);

$suname = $fconfig['sms_uname'];
$pass = $fconfig['sms_pswd'];
$burl = $fconfig['sms_baseurl'];
$url .=$burl;
if($sms['feature']=='Yes')
{
	$text ="Congratulations! Your Paid Membership on Matrimonial has been selected as Featured Profile.";
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
	  	$sql = "update register set fstatus='Featured' where status='Paid' && index_id IN ('$id');";
	    $result=@mysql_query($sql);
     print "<script>";
	 print " self.location='feature_member.php'"; 
	 print "</script>";  
	 }
?>        