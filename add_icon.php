<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.socialicon.php");
	
	
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
	$("#advertisementform").validate({
		rules: {
			sname: "required",
			itype: "required",
			slink:
			{
			 	//required: true,
				url: true
			},
			file: {
		      required: true,
		      accept: "jpg|gif|png"
	    	},
			status: "required"
			
		},
		messages: {
			sname: "Please enter name",
			itype: "Please select type",
			slink:
			{
			 	//required: "Please enter advertise link",
				url: "Please enter valid url link"
			},
			file: {
		      required: "Please provide advertise file",
		      accept: "File format .jpg or .gif or .png"
	    	},
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
<!--<script type="text/javascript">
  
function Validate(advertisementform)
{
    
	 if (document.forms.advertisementform.adv_type.value=="")
	{
	  	alert("Please, Select Advertisement type");
	  	document.forms.advertisementform.adv_type.focus();
	  	return false;
 	}
	
return true;
}

</script>-->

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
               <span class="red_text">Add Social Networking Icon Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="advertisementform"  name="form" action="" method="post" enctype="multipart/form-data">
                    <table style="border:solid 5px #7e0000;" width="608">
                        <tr>
                        <td height="40" width="204"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Icon Name:</span></td>
                        <td width="384" class="errormsg"><input name="sname" type="text" id="sname" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="204">&nbsp;&nbsp;&nbsp;<span style="font-size:13px; padding-left:5px;">Icon Link:</span></td>
                        <td class="errormsg"><input name="slink" type="text" id="slink" value="" style="width:150px;" />&nbsp;</td>
                       </tr>
                       
                       
                       <tr>
						<td  width="204"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Social Icon Type:</span></td>
                        <td  width="384" class="errormsg"><select name="itype" id="itype"/><option value="0">--Select--</option>
                        
                       <?php /*?> <option value="icon-facebook">Facebook</option>
                        <option value="icon-twitter">Twitter</option>
                        <option value="icon-google-plus">Google+</option>
                        <option value="icon-linkedin">Linkedin</option>
                        <option value="icon-github">Github</option>
                        <option value="icon-share">Share Us</option>
                        <option value="icon-rss">Rss</option><?php */?>
                        
                        <option value="fa fa-facebook-square">Facebook</option>
                        <option value="fa fa-twitter-square">Twitter</option>
                        <option value="fa fa-google-plus-square">Google+</option>
                        <option value="fa fa-linkedin-square">Linkedin</option>
                        <option value="fa fa-github-square">Github</option>
                        <option value="fa fa-share-square">Share Us</option>
                        <option value="fa fa-rss-square">Rss</option>
                        
                        
                        </select>
                        
                        
				  </td>
                      </tr>

			<?php /*?>	<tr>
						<td  width="204"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Icon Image (50 * 50):</span></td>
                        <td  width="384" class="errormsg"><input name="file" type="file" id="file" size="12" />
				  </td>
                      </tr><?php */?>
					   
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
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='social_neticon.php'" /></td>
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
		
		$itype=$_POST['itype'];
		if($itype=="0")
		{
				echo "<script>alert('Please Select Icon Type')</script>";
		}
		else
		{
		$sname=mysql_real_escape_string($_POST['sname']);
		$slink=$_POST['slink'];
		$adv_img=$_FILES['file']['name'];
		$status=$_POST['status'];
		$ob=new socialicon();
		$ob->add_icon($sname,$simg,$slink,$status,$itype);
		move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$_FILES['file']['name']);		
		echo "<script>alert('You Are Successfull To Add Icon');window.location='social_neticon.php'</script>";
	}
	}
	
?>