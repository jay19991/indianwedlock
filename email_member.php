<?php
	include("../connect/config2.php");
	include("secure.php");
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
	$("#emailform").validate({
		rules: {
			Subject: "required",
			Message: "required"
			
		},
		messages: {
			Subject: " Please enter subject",
			Message: " Please enter message"
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
               <span class="red_text">	Sending Email to Members</span>
                </td>
            </tr>
			  <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
			
            <tr>
            	<td style="border:none;">      
	
				<form action="email_submit_member.php" method="post" name="" id="emailform">
                <table style="border:solid 5px #7e0000;" width="900px" border="0" cellspacing="10" cellpadding="0">
                <tr>
                  <td width="14%" style="border:none;" class="text"><font id="star">*</font>&nbsp;To:</td>
                  <td width="86%" style="border:none;" class="text">
				  
				  <?php
					$plan = mysql_query("SELECT Distinct(status) from register ");
					echo( '<select name="memtype" style="width:100px;">' ); 
					while($row = mysql_fetch_array($plan))
					{ 
					echo  '<option value='.$row['status'].'>'.$row['status']. '</option>';
					} 
					echo '</select>';  
					?>
                  <span class="text">Members</span></td>
                </tr>
				 
				 <tr>
				  <td style="border:none;" class="text" ><font id="star">*</font>&nbsp;Subject:</td>
                    <td style="border:none;" class="errormsg" colspan="2"><input name="Subject" type="text" id="Subject" value="" size="70" maxlength="230" /></td>
                  </tr>
                  <tr>
				  <td style="border:none;" class="text" valign="top"><font id="star">*</font>&nbsp;Message:</td>
                    <td style="border:none;">
					<script src="js/nicEdit.js" type="text/javascript"></script>
					<script type="text/javascript">
					bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
					</script>
                    <textarea name="Message" cols="35" style="width:800px; height:250px; border:thick; font-size:12px;color:#333333;" id="Message" value=""></textarea></td>
					<td class="errormsg"></td>
                  </tr>
                 <tr>
                       <td style="border:none;" class="text">&nbsp;</td>
                        <td style="border:none;"  align="left" colspan="2"><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='main.php'" /></td>
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
