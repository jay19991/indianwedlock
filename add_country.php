<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.country.php");
	
	
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
	$("#countryform").validate({
		rules: {
			country: "required",
			status: "required"
			
		},
		messages: {
			country: " Please enter country",
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
               <span class="red_text">Add Country Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="countryform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="530px">
                        <tr>
                        <td height="40" width="160px"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Country Name:</span></td>
                        <td class="errormsg"><input name="country" type="text" id="country" value="" style="width:150px;" />&nbsp;</td>
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
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='country.php'" /></td>
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
		$country_name=mysql_real_escape_string(ucwords($_POST['country']));
		$status=$_POST['status'];
		
		$r=mysql_query("SELECT * FROM country WHERE country_name='$country_name'");
		$cnt=mysql_num_rows($r);
		if($cnt==0)
		{
		$ob=new country();
		$ob->add_country($country_name,$status);	
		echo "<script>alert('You Are Successfully Enter Records');window.location='country.php';</script>";
		}
		else
		{
			echo "<script>alert('Entered Country Is Already In The List');window.location='country.php';</script>";
		}
	}
?>