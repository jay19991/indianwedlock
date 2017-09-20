<?php
include("../connect/config2.php");	
$pmatri_id=$_GET['pmatri_id'];

$result = mysql_query("SELECT * FROM payment where pmatri_id='$pmatri_id'"); 
$_SESSION['pmatri_id'] = $pmatri_id; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $info['title']; ?></title>
<meta name="Description" content="<?php echo $info['description']; ?>">
<meta name="keywords" content="<?php echo $info['keywords']; ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $info['favicon']; ?>">
<script type="text/javascript"><?php echo $info['google_analytics_code']; ?></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<SCRIPT language=JavaScript>
<!-- 
function win(){
window.opener.location.href="approve_paid.php";
self.close();
//-->
}
</SCRIPT>
<SCRIPT language="javascript">
function validate()
  {
  		
		if ( frm.plan.selectedIndex == 0 )
		{
			alert( "Please select plan." );	
			frm.plan.focus( );
			return false;
		}
		
			
}

 </SCRIPT>

<script>
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

//fuction to return the xml http object
function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
function getCurrencyCode(strURL)
{		
	var req = getXMLHTTP();		
	if (req) 
	{
		//function to be called when state is changed
		req.onreadystatechange = function()
		{
			//when state is completed i.e 4
			if (req.readyState == 4) 
			{			
				// only if http status is "OK"
				if (req.status == 200)
				{						
					document.getElementById('plandiv').innerHTML=req.responseText;					
				} 
				
				else 
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		 }			
		 req.open("GET", strURL, true);
		 req.send(null);
	}			
}
</script>
<style>.t{width:200px;}</style>
</head>

<body background="images/bg1.jpg" bgcolor="#999999">
<form  action="" method="post" name="frm"  onSubmit="return validate()">
	
	<table width="100%" height="400" border="0" align="center" cellpadding="2" cellspacing="3" style="border:solid 5px #999966;" class="text">
	<?php while($row = mysql_fetch_array($result)){ ?>
      <tr>
        <td width="3%" >&nbsp;</td>
        <td colspan="2" height="30"><div align="left" class="red_text">Approve Active to Paid </div></td>
        </tr>
      <tr>
        <td height="17">&nbsp;</td>
        <td width="28%" class="text">MatrimonyId : </td>
        <td width="69%" class="text"><?php echo $row['matri_id']?>&nbsp;
          <input name="mid" type="hidden" id="mid" value="<?php echo $row['matri_id'] ?>" /></td>
      </tr>
      
      <tr>
        <td >&nbsp;</td>
        <td class="text">Payment Mode&nbsp; : </td>
        <td><select name="pmode" class="t" id="pmode">
		<option value="Cash">Cash</option>
          <option value="Cheque">Cheque</option>
		   <option value="Credit Card">Credit Card</option>
          <option value="DD">DD</option>
          <option value="Money Order">Money Order</option>
          <option value="Funds Transfer">Funds Transfer</option>
          <option value="Other">Other</option>
        </select></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td class="text">Activation Date&nbsp; : </td>
		<?php $today1 = strtotime ('now');
$today=date("d-m-Y",$today1); ?>
        <td><input name="activedt" type="text" class="t" id="activedt" value="<?php echo $today; ?>" /></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td class="text">Plan : </td>
        <td>
<?php
$plan = mysql_query("SELECT * from memship_plan ");
?>
<select name="plan" class="t" onChange="getCurrencyCode('findpay.php?plan='+this.value)" >
<option value="0">Select Plan</option>
<?php
while($row = mysql_fetch_array($plan))
{ 
echo  '<option value='.$row['plan_display'].'>'.$row['plan_display'].'</option>';
} ?>
</select>	</td>
      </tr>
      <tr>
        <td colspan="3" align="left"><div id="plandiv"></div></td>
      </tr>
      
	   <tr>
        <td >&nbsp;</td>
        <td class="text">Allow Video </td>
        <td><input name="video" type="radio" value="Yes"  checked="checked"/>Yes&nbsp;&nbsp;<input name="video" type="radio" value="No" />No&nbsp;&nbsp;	</td>
      </tr>
          <tr>
        <td >&nbsp;</td>
        <td class="text">Allow Chat</td>
        <td>
		<input name="chat" type="radio" value="Yes"  checked="checked"/>Yes&nbsp;&nbsp;<input name="chat" type="radio" value="No" />No&nbsp;&nbsp;		</td>
      </tr>
      
      <tr>
        <td >&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td colspan="2"><div align="center">
          <input name="Submit" type="submit" class="formselect" value="Submit" /> &nbsp;&nbsp;<input name="button" type="button" class="green-button" onclick="win();" value="Close window" />
        </div></td>
        </tr>
   
		<?php } ?>
    </table>
	
</form>
 </center>
</body>
</html>
<?php
	if(isset($_POST['Submit']))
	{
		$_SESSION['mid'] = $_POST['mid'];
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['pmode'] = $_POST['pmode'];
		$_SESSION['activedt'] = $_POST['activedt'];
		$_SESSION['plan'] = $_POST['plan'];
		$_SESSION['video'] = $_POST['video'];
		$_SESSION['chat'] = $_POST['chat'];
		$_SESSION['bankdet'] = $_POST['bankdet'];
		$_SESSION['duration'] = $_POST['duration'];
$_SESSION['pcontact'] = $_POST['pcontact'];
$_SESSION['plan_free_msg'] = $_POST['plan_free_msg'];
$_SESSION['profile'] = $_POST['profile'];
$_SESSION['pamount'] = $_POST['pamount'];
		echo "<script>window.location='approve_paid_form_confirm_submit.php?id=$id';</script>";
	}
?>