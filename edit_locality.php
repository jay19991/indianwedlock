<?php
	include("../connect/config2.php");
	include("secure.php");
	require_once("../BusinessLogic/class.city.php");
	require_once("../BusinessLogic/class.locality.php");
	$loc_id=$_GET['loc_id'];
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{	
		
		$city_id=$_POST['city'];
		$loc_name=mysql_real_escape_string($_POST['locality']);
		$status=$_POST['status'];
		$ob=new locality();
		$ob->update_locality($loc_id,$city_id,$loc_name,$status);
		echo "<script>window.location='locality.php'</script>";	
	}
	$cnob=new city();
	$rescn=$cnob->get_city_by_status();
	
	$ob=new locality();
	$resl=$ob->get_locality_by_id($loc_id);
	$rowloc=mysql_fetch_array($resl);
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">


$(document).ready(function() {

	// validate signup form on keyup and submit
	$("#locform").validate({
		rules: {
			city: "required",
			locality: "required",
			status: "required"
			
		},
		messages: {
			city: " Please choose city",
			locality: " Please enter locality",
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
               <span class="red_text">Edit Locality Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="locform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="530px">
					<tr>
                        <td height="40" width="160px"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">City:</span></td>
                        <td class="errormsg">
						  <select name="city" id="city"  style="width:150px;">
						  	<option value="">Choose City</option>
							<?php
								while($row=mysql_fetch_array($rescn))
								{
							?>
							<option value="<?php echo $row['city_id']; ?>" <?php if($rowloc['city_id']==$row['city_id']){ ?> selected="selected" <?php } ?>><?php echo $row['city_name']; ?></option>
							<?php
								}
							?>
					      </select>&nbsp;
						</td>
                      </tr>
					  
					 
                        <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Locality Name:</span></td>
                        <td class="errormsg"><input name="locality" type="text" id="locality" value="<?php echo $rowloc['loc_name']; ?>" style="width:150px;"/>
                        &nbsp;</td>
                       </tr>					   					   
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td><table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" <?php if($rowloc['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($rowloc['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;
						</td>
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table></td>
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='locality.php'" /></td>
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
