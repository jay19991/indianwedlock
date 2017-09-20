<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.advertise.php");
	
	$adv_id=$_GET['adv_id'];
	$ob2=new advertisement();
	if(isset($_POST['submit']))
	{
		$adv_name=mysql_real_escape_string($_POST['advertisement']);
		$adv_link=$_POST['advertiselink'];
		 if(@is_uploaded_file($_FILES["file"]["tmp_name"]))
		{
			copy($_FILES['file']['tmp_name'],"../advertisement/".$_FILES['file']['name']);
			$adv_img=$_FILES['file']['name'];
		}
		else
		{
			$adv_img=$row['adv_img'];
		}
		$adv_type=$_POST['adv_type'];
		$adv_google=$_POST['adv_google'];
		$status=$_POST['status'];
		$display=$_POST['display'];
		$adv_level=$_POST['advlevel'];
		$adv_by='admin';
		
		
		if($adv_type=="Ads")
		{
			$display="Right";
			$sql1="update advertisement set adv_name='$adv_name',adv_by='$adv_by',adv_link='$adv_link',adv_type='$adv_type',adv_google='$adv_google',adv_img='$adv_img',adv_level='$adv_level',display='$display',status='$status' where adv_id='$adv_id'";
		}
		else
		{
			$display="Left";
			
			$sql2="update advertisement set adv_name='$adv_name',adv_by='$adv_by',adv_link='$adv_link',adv_type='$adv_type',adv_google='$adv_google',adv_img='$adv_img',adv_level='$adv_level',display='$display',status='$status' where adv_id='$adv_id'";
			 mysql_query($sql2) or mysql_error();
		}
		echo "<script>window.location='advertisement.php'</script>";
	}
	
	$result=$ob2->get_adv_by_id($adv_id);
	$row=mysql_fetch_array($result);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script language="JavaScript">
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
</script>
<script type="text/javascript">


$().ready(function() {

	// validate signup form on keyup and submit
	$("#advertisementform").validate({
		rules: {
			advertisement: "required",
			advertiselink:
			{
			 	//required: true,
				url: true
			},
			advlevel: "required",
			display: "required",
			adv_type: "required",
			file: {
		      //required: true,
		      accept: "jpg|gif|png"
	    	},
			adv_google: "required",
			status: "required"
			
		},
		messages: {
			advertisement: "Please enter advertise name",
			advertiselink:
			{
			 	//required: "Please enter advertise link",
				url: "Please enter valid url link"
			},
			advlevel: "Please Choose advertise level",
			display: " Please Select Display ads On Page",
			adv_type: "Please select advertise type",
			file: {
		      required: "Please provide advertise file",
		      accept: "File format .jpg or .gif or .png"
	    	},
			adv_google: "Please enter google ads",
			status: "Please select status"
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
               <span class="red_text">Edit Advertisement </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="advertisementform" action="edit_advertisement.php?adv_id=<?php echo $row['adv_id']; ?>" method="post" enctype="multipart/form-data">
                    <table style="border:solid 5px #7e0000;" width="608">
                        <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Advertise Name:</span></td>
                        <td width="407" class="errormsg"><input name="advertisement" type="text" id="advertisement" value="<?php echo $row['adv_name']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181">&nbsp;&nbsp;&nbsp;<span style="font-size:13px; padding-left:5px;">Advertise Link:</span></td>
                        <td class="errormsg"><input name="advertiselink" type="text" id="advertiselink" value="<?php echo $row['adv_link']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Advertise Level:</span></td>
                        <td class="errormsg">
						<select name="advlevel" id="advlevel" style="width:150px;">
							<option value="">Select Level</option>
							<option value="1" <?php if($row['adv_level']=='1'){ echo "selected"; }?>>Level One</option>
							<option value="2" <?php if($row['adv_level']=='2'){ echo "selected"; }?>>Level Two</option>
							<option value="3" <?php if($row['adv_level']=='3'){ echo "selected"; }?>>Level Three</option>
							<option value="4" <?php if($row['adv_level']=='4'){ echo "selected"; }?>>Level Four</option>
							<option value="5" <?php if($row['adv_level']=='5'){ echo "selected"; }?>>Level Five</option>
						</select>
						&nbsp;
						</td>
                       </tr>
                       
                        
                       
					   <tr>
                        <td height="40" width="181"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Advertise type:</span></td>
                        <td class="text"><input name="adv_type" id="adv_type" type="radio" value="Ads" <?php if($row['adv_type']=='Ads'){ echo "checked"; } ?>  onclick="setVisibility('admin', 'inline');setVisibility('google', 'none');";/>Ads(admin)&nbsp;&nbsp;<input name="adv_type" id="adv_type" type="radio" value="Google" <?php if($row['adv_type']=='Google'){ echo "checked"; } ?> onclick="setVisibility('admin', 'none');setVisibility('google', 'inline');";/>Google Ads&nbsp;&nbsp;<div  class="errormsg"></div>			</td>
                       </tr>
			
					   <tr >
                        <td height="40" width="600" colspan="2" valign="top">
						
						<div id="admin">
						<table width="524" style="border:none;">
						<tr>
						<td style="border:none;" width="246" valign="top"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Advertise Image (200 * 200) :</span></td>
                        <td  style="border:none;" width="257" class="errormsg"><input name="file" type="file" id="file" size="12" />&nbsp;
						<input type="hidden" name="file" value="<?php echo $row['adv_img']; ?>" />
						<br /><br />
						<img src="../advertisement/<?php echo $row['adv_img']; ?>" width="150px" height="150px" />
						</td>
                        </tr>
					   </table>
					   </div>
					   <div id="google" style="display:none;">
					   <table>
					   <tr>
						<td style="border:none;" valign="top" width="181"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Google Ads:</span></td>
                        <td style="border:none;" width="" class="errormsg"><textarea name="adv_google" id="adv_google" style="width:380px; height:100px;"/><?php echo $row['adv_google']; ?></textarea>( <font style="font-size:10px; color:#999999;">Add Your Google Ads Script Here.</font>)
						</td>
                       </tr> 
					   </table>
					   </div>
					   </td>
					   </tr> 
					   
					
                       
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td>
						<table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" <?php if($row['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($row['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;
						</td>
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table>
						</td>
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='advertisement.php'" /></td>
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
