<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.religion.php");
	include("../BusinessLogic/class.caste.php");
		
	
	
	$result=mysql_query("select * from register");	
	$res1=mysql_fetch_array($result);
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
	$("#casteform").validate({
		rules: {
			religion: "required"
			
		},
		messages: {
			religion: " Please choose religion"
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
               <span class="red_text">Edit Matrimony Id Prefix</span>                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="casteform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="550">
                  
                        <tr>
                        <td height="50"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">MatriId Prefix:</span></td>
                        <td class="errormsg"><input name="mid" type="text" id="mid" value="<?php echo $res1['prefix']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
                      
                       <tr>
                        <td height="50">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='main.php'" /></td>
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
if(isset($_POST['submit']))
	{
		$mid=$_POST['mid'];
		
		$up="update register set prefix='$mid'"; 
		$o=mysql_query($up);	
		echo "<script>alert('You Are Successfully Edit');window.location='main.php'</script>";
	}
?>