<?php
include("../connect/config2.php");
include("secure.php");
include("../BusinessLogic/class.story.php");
$msg1 = "";
$msg2 = "";	

$story_id=$_REQUEST['story_id'];
$ob=new story();

if(isset($_POST['submit']) and $_POST['submit']!='')
{
		if($_FILES['file']['name']=='')
			$weddingphoto=$_POST['storyfile'];
		else
			$weddingphoto=$_FILES['file']['name'];
			
		$brideid=mysql_real_escape_string($_POST['brideid']);
		$bridename=mysql_real_escape_string($_POST['bridename']);
		
		$groomid=mysql_real_escape_string($_POST['groomid']);
		$groomname=mysql_real_escape_string($_POST['groomname']);
		
		$mdate=strtotime($_POST['marriagedate']);
		$marriagedate=date("Y-m-d",$mdate);
		$successmessage=mysql_real_escape_string($_POST['successmessage']);
		$status=$_POST['status'];
		
		$sgg="select * from register where matri_id='$brideid'";
		$rrr=mysql_query($sgg);
		$num_row11 = mysql_num_rows($rrr); 
		
		$sgg2="select * from register where matri_id='$groomid'";
		$rrr2=mysql_query($sgg2);
		$num_row22 = mysql_num_rows($rrr2); 
		
		
			if ($num_row11 == 0) 
			{ 
				/*echo "<script>alert('Your Bride MatriId Not Found in Our Database.Please, Enter Valid Bride MatriId.')</script>";
				echo "<script>window.location='success_story.php'</script>";*/
				$msg1="Your Bride MatriId Not Found in Our Database.Please, Enter Valid Bride MatriId.";
			} 

			else if ($num_row22 == 0) 
			{ 
				/*echo "<script>alert('Your Groom MatriId Not Found in Our Database.Please, Enter Valid Groom MatriId.')</script>";
				echo "<script>window.location='success_story.php'</script>";*/
				$msg2="Your Groom MatriId Not Found in Our Database.Please, Enter Valid Groom MatriId.";
			} 
		
			else
			{ 
		
				$ob->update_story($story_id,$weddingphoto,$bridename,$brideid,$groomname,$groomid,$marriagedate,$successmessage,$status);
				move_uploaded_file($_FILES['file']['tmp_name'],"../SuccessStory/".$_FILES['file']['name']);
				echo "<script>window.location='story.php'</script>";
			}					
}

	
$result=$ob->get_story_by_id($story_id);
$row=mysql_fetch_array($result);

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
	$("#storyform").validate({
		rules: {
			brideid: "required",
			bridename: "required",
			groomid: "required",
			groomname: "required",
			file: {
		      accept: "jpg|gif|png"
	    	},
			marriagedate: {
				required: true,
				date: true
			},
			successmessage: "required",
			status: "required"
			
		},
		messages: {
			brideid: " Please Enter Bride Id",
			bridename: " Enter Valid Bride Id",
			groomid: " Please Enter Groom Id",
			groomname: " Enter Valid Groom Id",
			file: {
		      accept: " Please Choose .jpg or .gif or .png"
	    	},
			marriagedate: {
				required: " Please Enter Marriage Date",
				date: " Please Enter Valid Date"
			},
			successmessage: " Please Enter Success Message",
			status: " Please Select Status"
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
<script type="text/javascript">
function checkbride(str)
{
if (str=="")
  {
  document.getElementById("bridename").value="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("bridename").value=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkbride.php?q="+str,true);
xmlhttp.send();
}

function checkgroom(str)
{
if (str=="")
  {
  document.getElementById("groomname").value="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("groomname").value=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkgroom.php?q="+str,true);
xmlhttp.send();
}

</script>
<script language="JavaScript" src="Calender/calendar_us.js"></script>
	<link rel="stylesheet" href="Calender/calendar.css">
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
               <span class="red_text">Edit Success Story Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br />       
					<form id="storyform" action="" method="post" enctype="multipart/form-data">
                    <table style="border:solid 5px #7e0000;" width="584">
                        <tr>
                        <td height="50" width="167"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Bride Id:</span></td>
                        <td width="397" class="errormsg"><input name="brideid" type="text" id="brideid" value="<?php echo $row['brideid']; ?>" style="width:150px;" onblur="checkbride(this.value)" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="167"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Bride Name:</span></td>
                        <td class="errormsg"><input name="bridename" type="text" id="bridename" readonly="true" value="<?php echo $row['bridename']; ?>" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="50" width="167"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Groom Id:</span></td>
                        <td class="errormsg"><input name="groomid" type="text" id="groomid" value="<?php echo $row['groomid']; ?>" style="width:150px;" onblur="checkgroom(this.value)" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="167"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Groom Name:</span></td>
                        <td class="errormsg"><input name="groomname" type="text" id="groomname" value="<?php echo $row['groomname']; ?>" readonly="true" style="width:150px;" />&nbsp;</td>
                       </tr>
					   <tr>
                        <td height="40" width="167" valign="top"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Wedding Photo:</span></td>
                        <td class="errormsg"><input type="file" name="file" id="file" size="8" /><input type="hidden" name="storyfile" id="storyfile" value="<?php echo $row['weddingphoto']; ?>" />&nbsp;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<img src="../SuccessStory/<?php echo $row['weddingphoto']; ?>" style="border:solid 5px #7e0000;" width="120px" height="100px" /><br /><br /></td>
                       </tr>
					   <tr>
                        <td height="40" width="167"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Marriage Date:</span></td>
                        <td class="errormsg"><input name="marriagedate" type="text" id="marriagedate" value="<?php 
				$mdate=strtotime($row['marriagedate']);
				echo $marriagedate=date("m/d/Y",$mdate);
		 ?>" style="width:150px;" readonly="true" /><script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'storyform',
		// input name
		'controlname': 'marriagedate'
	});

	</script>
						&nbsp;</td>
                       </tr>
					   
					   <tr>
                        <td height="40" width="167"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Success Message:</span></td>
                        <td class="errormsg"><textarea id="successmessage" name="successmessage" style="width:150px;"><?php echo $row['successmessage']; ?></textarea> &nbsp;</td>
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
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='story.php'" /></td>
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
