<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.religion.php");
	
//print_r($_REQUEST);
	
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
               <span class="red_text">Add Logo </span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="religionform" action=""  enctype="multipart/form-data" method="post">
                    <table style="border:solid 5px #7e0000;" width="500px">
                        <tr>
                        <td height="40" width="150"><font id="star">*</font>&nbsp;<span class="con_title">Logo Path:</span></td>
                       <!-- <td class="errormsg"><input name="religion" type="text" id="religion" value="" style="width:150px;" />&nbsp;</td>-->
                        <td class="errormsg"><input type="file" name="logo_path" id="logo_path" size="8" /></td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span class="con_title">Status:</span></td>
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
<?php
	/*if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$religion_name=mysql_real_escape_string(ucwords($_POST['religion']));
		$status=$_POST['status'];
		$r=mysql_query("SELECT * FROM religion WHERE religion_name='$religion_name'");
		$cnt=mysql_num_rows($r);
		if($cnt==0)
		{
		$ob=new religion();		
		$ob->add_religion($religion_name,$status);	
		echo "<script>alert('You Are Succssfully Insert Data');window.location='religion.php'</script>";
		}
		else
		{
		echo "<script>alert('Entered Religion Is Already In The List');window.location='religion.php'</script>";	
		}
		
	}*/
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		
		
		 $logo_path=$_FILES["logo_path"]["name"];
	
		$status=$_REQUEST['status'];
		
		$pathtemp = $_FILES["logo_path"]["tmp_name"];
		 $path = "../images/".$logo_path;
		
		move_uploaded_file($pathtemp,$path);
		
		if($status==1)
		{
			 $sqlupdt1="UPDATE `addnewlogo` SET `status`='0' WHERE 1";
			 
			$sql="insert into addnewlogo (logo_path,status) values ('$logo_path','$status')";
			mysql_query($sqlupdt1);
			
		}
		else 
		{
			$sql="insert into addnewlogo (logo_path,status) values ('$logo_path','$status')";
			
		}
	 
	 $succ=mysql_query($sql);
			 if($succ)
			// header("location:index.php?view=new_logo.php");
			echo "<script>alert('You Are Succssfully Insert New Logo');window.location='new_logo.php'</script>";
	
	}
	
	
?>