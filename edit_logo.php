<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.religion.php");
	
	$logo_id=$_GET['logo_id'];
	//$ob=new religion();
/*	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$religion_name=mysql_real_escape_string($_POST['religion']);
		$status=$_POST['status'];		
		$ob->update_religion($religion_id,$religion_name,$status);	
		if(isset($_REQUEST['page']) and $_REQUEST['page']!='')
		{
			echo "<script>window.location='religion.php?page=".$_REQUEST['page']."'</script>";
		}
		else
		{
			echo "<script>window.location='religion.php'</script>";
		}
	}
	
	$result=$ob->get_religion_by_id($religion_id);
	$row=mysql_fetch_array($result);*/
	
	
	if(isset($_POST['submit']) and $_POST['submit']!='')
   {
     $logo_id=$_REQUEST['logo_id'];
     $logo_path=$_REQUEST['logo_path'];
	 $status=$_REQUEST['status'];
	 
	 $sql="update addnewlogo  set logo_path='$logo_path',status='$status' where logo_id=$logo_id";
	 
	 
	$succ=mysql_query($sql);
	 if($succ)
	// header("location:index.php?view=listcategory.php");
	 echo "<script>window.location='new_logo.php'</script>";
	 
   
   }
	
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
	$("#religionform").validate({
		rules: {
			logo_path: "required",
			status: "required"
			
		},
		messages: {
			logo_path: " Please Select logo",
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
               <span class="red_text">Edit Logo </span>                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="religionform" action="" method="post">
                    <table style="border:solid 5px #7e0000;" width="500">
                        <tr>
                        <td width="150" height="40"><font id="star">*</font>&nbsp;<span class="con_title">Logo Path:</span></td>
						
						
						
						
                        <td class="errormsg">
                        <input type="file" name="logo_path" id="logo_path" size="8" />
                      &nbsp;</td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span class="con_title">Status:</span></td>
                        <td><table>
						<tr>
						<td style="border:none;" class="text">
						<input name="status" type="radio" value="1" <?php if($row['status']==1){ echo "checked"; } ?> />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" <?php if($row['status']==0){ echo "checked"; } ?> />Inactive&nbsp;&nbsp;
						</td>
						
						<td style="border:none;" class="errormsg">
						</td>
						</tr>
						</table></td>
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='new_logo.php'" /></td>
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
