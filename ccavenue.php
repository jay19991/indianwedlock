<?php
	include("../connect/config2.php");
	include("secure.php");
	

	if(isset($_POST['submit']))
	{ 
	
	   $w=$_POST['working_key'];
	   $m=$_POST['merchant_id'];
	   $s=$_POST['status'];
	
	 if($_FILES['file']['name']!='')
		{
			$pi=$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$_FILES['file']['name']);
		}
		else
		{
			$pi=$_POST['pay_img'];
		}
	
	
	
	  $up="update payment_method set working_key='$w',merchant_id='$m',pay_img='$pi',status='$s' where pay_id='2'";
	  $up2=mysql_query($up);
	  echo "<script>window.location='payment_option.php'</script>";
	  
	}
		
	$sqlpp="select * from payment_method where pay_id='2'";
	$resp=mysql_query($sqlpp);
	$row=mysql_fetch_array($resp);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript">
  
function Validate(frm2)
{
    
	if(document.forms.frm2.working_key.value=="")
	{
	  	alert("Please enter working_key !");
	  	document.forms.frm2.working_key.focus();
	  	return false;
 	}
	if(document.forms.frm2.merchant_id.value=="")
	{
	  	alert("Please enter merchant_id !");
	  	document.forms.frm2.merchant_id.focus();
	  	return false;
 	}
 var image = /(.*?)\.(jpg|JPG|jpeg|png|PNG|gif|GIF|bmp|BMP)$/;
			  if(!image.test(document.forms.frm2.file.value))
			  {
			  alert("Only .gif, .png , .jpeg, .jpg, .bmp file allowed in ccavenue image!!");
			  document.forms.frm2.file.focus();
			  return false;
			  }
	
	if (!document.frm2.status[0].checked && !document.frm2.status[1].checked )

	{

	alert("Please select status !");

	return false;

	} 

	
return true;
}

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
               <span class="red_text">Edit CCavenue Details</span>
                </td>
            </tr>
			  <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
			
           
            <tr>
            <td style="border:none;">

                <table style="border:solid 5px #7e0000;" width="900px" border="0" cellspacing="10" cellpadding="0" >
                 <tr>
            <td style="border:none;" class="text"> 
          	
            <form name="frm2" method="post" action="" onsubmit="return Validate(frm2);" enctype="multipart/form-data">
          	 <table width="611" classs="text">
               <tr>
				<td style="border:none;" width="275" class="text"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Merchant Id:</span></td>
                <td  style="border:none;" width="324" class="errormsg"><input name="merchant_id" type="text" id="merchant_id"  value="<?php echo $row['merchant_id']; ?>" style="width:200px;"/>
				</td>
                </tr>
                <tr>
                  <td style="border:none;">&nbsp;</td>
                  </tr>
                <tr>
				<td style="border:none;" width="275" class="text"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Working Key:</span></td>
                <td  style="border:none;" width="324" class="errormsg"><input name="working_key" type="text" id="working_key"  value="<?php echo $row['working_key']; ?>" style="width:200px;"/>
				</td>
                </tr>
                  <tr>
                  <td style="border:none;">&nbsp;</td>
                  </tr>
				<tr>
						<td  width="275" style="border:none;" valign="top"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">CCavenue Image (200 * 150):</span></td>
                        <td  width="324" class="errormsg" style="border:none;"><input name="file" type="file" id="file" size="12" />&nbsp;<input type="hidden" name="pay_img" value="<?php echo $row['pay_img']; ?>" />
						<br />
						<img src="../images/<?php echo $row['pay_img']; ?>" width="50px" height="50px" />
				  </td>  
				 </tr>
				   <tr>
                  <td style="border:none;">&nbsp;</td>
                  </tr> 
               <tr>
				<td style="border:none;" width="275" class="text"><font id="star">*</font>&nbsp;<span style="font-size:13px;padding-left:5px;">Status</td>
                <td style="border:none;" class="text"> <input name="status" type="radio" value="1" <?php if($row['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($row['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;</td>
                </tr>
                 <tr>
                  <td style="border:none;">&nbsp;</td>
                  </tr>
                 <tr>
                  <td style="border:none;">&nbsp;</td>
                 <td style="border:none;"><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='payment_option.php'" /></td>
                 </tr>
				</table>
                </form>
            </td>
            </tr>
               
               <tr>
            <td style="border:none;">&nbsp;</td>
            </tr> 
                  
              
                  
                  <tr>
                  <td style="border:none;">&nbsp;</td>
                  </tr>
                 <tr>
                  <td style="border:none;">&nbsp;</td>
                  </tr>
                </table>
             
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
