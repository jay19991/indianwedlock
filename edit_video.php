
<?php
	include("../connect/config2.php");
	
	include("secure.php");
	//include("../BusinessLogic/class.country.php");
	
	//require("../connect/config1.php");
	
	/*$ob=new country();
	if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$country_name=mysql_real_escape_string($_POST['country']);
		$status=$_POST['status'];
		$ob->update_country($country_id,$country_name,$status);	
		if(isset($_REQUEST['page']) and $_REQUEST['page']!='')
		{
			echo "<script>window.location='country.php?page=".$_REQUEST['page']."'</script>";
		}
		else
		{
			echo "<script>window.location='country.php'</script>";
		}
	}*/
	
	//$cnres=$ob->get_country_by_id($country_id);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
function setVisibility(id, visibility) 
{
document.getElementById(id).style.display = visibility;
}
</script>
<script language="javascript" src="js/edit_video.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--<script src="js/jquery.validate.js" type="text/javascript"></script>-->

</head>
<body onload="setVisibility('comp', 'inline');setVisibility('youtube', 'none');">
<!--  onload="setVisibility('comp', 'inline');setVisibility('youtube', 'none');" -->
<center>
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
          <td align="left" style="border:none;"><span class="red_text">Edit Video Details</span> </td>
        </tr>
        <tr>
          <?php
				$video_id=$_GET['video_id'];	//hor_id			
	$fet="SELECT * FROM register WHERE matri_id='$video_id'";
	$cnres=mysql_query($fet);	
	$cnrow=mysql_fetch_array($cnres);
	
				$r=$cnrow['video'];
				$tube=$cnrow['video_url'];
				//$h=strlen($tube);
				
				$st="";
				$st1="";
				if(strlen($r)>0)
				{
					$st="checked='checked'";					
				}
				if(strlen($tube>0))		
				{
					$st1="checked='checked'";
				}
				/*if(strlen($r)==0)		
				{
					if(strlen($tube)>0)
					{
					$st="checked='checked'";	
					}					
				}
				if((strlen($r)>0)&&(strlen($tube)>0))
				{
					if(strlen($r)>0)
					{
					$st="checked='checked'";					
					}
				}*/				
				?>
          <td style="border:none;"><br />
            <form action="" method="post"  enctype="multipart/form-data" onsubmit="return valid();">            
              <table style="border:solid 5px #7e0000;" width="530px">
                <tr>
                  <td height="40" width="160" valign="top"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Upload Video By:</span></td>
                  <td width="172" align="left" valign="top" class="green_text" colspan="2">&nbsp;&nbsp;  
                    
                    <input name="v_type" id="v_type" type="radio" value="Computer"  <?php echo $st; ?> onclick="setVisibility('comp', 'inline');setVisibility('youtube', 'none');">
                    Computer&nbsp;&nbsp;
                    <input name="v_type" id="youtube_type" type="radio" value="Youtube"  <?php echo $st1; ?> onclick="setVisibility('comp', 'none');setVisibility('youtube', 'inline');"; >
                    Youtube&nbsp;&nbsp;
                    <div  class="errormsg"></div></td>
                  
                </tr>
                <tr>
                  <td class="green_text" colspan="2"><div id="comp" style="display:none;">
                      <table style="border:none;" >
                        <tr>
                          <td style="border:none;" width="163"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Computer Video:</span></td>
                          <td  style="border:none;" width="" class="errormsg"><input type="file" name="file" id="file">
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div id="youtube" style="display:none;">
                      <table>
                        <tr>
                          <td style="border:none;" valign="top" width="162"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Video Link:</span></td>
                          <td style="border:none;" width="" class="errormsg"><textarea name="youtube_link" id="youtube_link" style="width:340px; height:100px;"><?php echo $cnrow['video_url']; ?></textarea>
                            <br />
                            ( <font style="font-size:10px; color:#999999;">Add Your Youtube video link Here.</font>) </td>
                        </tr>
                      </table>
                    </div></td>
                </tr>
                <tr>
                  <td height="40">&nbsp;</td>
                  <td>
                  
                  <input type="image" name="submit" src="images/btn_submit.gif">
                    <input type="hidden" name="submit" value="Submit" />
                    <img src="images/btn_cancel.gif" onclick="window.location='vedio.php'" /></td>
                </tr>
              </table>
            </form></td>
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
		/*echo "video_id=".$video_id=$_GET['video_id'];
		echo "<br>";		
		echo "file_name=".$file=$_FILES['file']['name'];	
		echo "<br>";
		echo "file lengh=".$file_len=strlen($file);
		echo "<br>";
		echo "youtube_link=".$youtube_link=$_POST['youtube_link'];
		echo "<br>";
		echo "youtube_link_length=".$file_len2=strlen($youtube_link);
		echo "<br>";
		exit;*/
		$video_id=$_GET['video_id'];		
		$file=$_FILES['file']['name'];	
		//$file_len=strlen($file);
		$youtube_link=$_POST['youtube_link'];
		//$file_len2=strlen($youtube_link);
		
		if($file!="")
		{
			/*$k=$file;
			$p="";												   move_uploaded_file($_FILES['file']['tmp_name'],"../video/".$_FILES['file']['name']);			
			echo $h="UPDATE register SET video='$file',video_url='$p' WHERE matri_id='$video_id'";
											
			$update1=mysql_query($h);	
			echo "<script>alert('You Are Successfully Upload2');window.location='vedio.php';</script>";*/
			$d=explode(".",$file);
		    $p=count($d);
		    $chk_ext=$d[$p-1];		
	  	    if(($chk_ext=="flv") && ($file_size<10480000))
			{
				$p="";												   move_uploaded_file($_FILES['file']['tmp_name'],"../video/".$_FILES['file']['name']);			
			echo $h="UPDATE register SET video='$file',video_url='$p' WHERE matri_id='$video_id'";											
			$update1=mysql_query($h);	
			echo "<script>alert('You Are Successfully Upload');window.location='vedio.php';</script>";
			}
			else
			{
				echo "<script laguage=\"javascript\">alert(\"Only .flv   Extention Video File AND Maximum 10 MB Size Allow \");window.location=\"vedio.php\";</script>";
			}		
		}
		else if($youtube_link!="")
		{
			$k1=$youtube_link;
			$j1="";
			echo $j="UPDATE register SET video_url='$youtube_link',video='$j1' WHERE matri_id='$video_id'";
																			
			$update2=mysql_query($j);	
			echo "<script>alert('You Are Successfully Upload');window.location='vedio.php';</script>";					
		}				
		else if($file=="")
		{
		$r=mysql_query("SELECT * FROM register WHERE matri_id='$video_id'");
		$f=mysql_fetch_array($r);
		$j=$f['video'];
		echo $hh="UPDATE register SET video='$j',video_url='' WHERE matri_id='$video_id'";						
		$update4=mysql_query($hh);		
		echo "<script>alert('You Are Successfully Upload');window.location='vedio.php';</script>";			
		}
		
		
	}
?>
