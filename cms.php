<?php
require("../connect/config2.php");
require("secure.php");
require_once("../BusinessLogic/class.cms.php");	

$cm=new cms();
$cms_id=$_REQUEST['cms_id'];
$res=$cm->get_cms_by_id($cms_id);
$row=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>:: Matrimonial Script - Admin Panel ::</title>
<script language = "Javascript" type="text/javascript">
  
function valid()
{
	if (document.forms.frm2.cms_title.value=="")
	{
	  	alert("Please enter your cms title.");
	  	document.forms.frm2.cms_title.focus();
	  	return false;
 	}
    
	if (document.forms.frm2.textarea2.value=="<br>")
	{
	  	alert("Please enter your cms content.");
	  	document.forms.frm2.textarea2.focus();
	  	return false;
 	}
	
     return true;
}

</script> 
<link rel="stylesheet" type="text/css" href="css/style.css">
       
        
<script language="JavaScript" type="text/JavaScript">
function bk()
{
	window.location = "main.php";
}
</script>      
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
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
        <form name="frm2" method="post" onsubmit="return valid();"> 
        <table width="1000px" align="left">
        <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
        	<tr>
            	<td align="left" style="border:none;">
               <span class="green_text">Content Management System</span>
                </td>
            </tr>
            
              <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
            	<td style="border:none;"> 
                    
                    <table style="border:solid 5px #7e0000;" width="900px" align="center">
                        <tr>
                        <td height="40" style="border:none;"><font id="star">*</font>&nbsp;<input type="text" name="cms_title" value="<?php echo $row['cms_title'];?>" style="width:300px;" id="cms_title" /></td>
                       </tr>
                       <tr>
                        <td height="40" valign="top" style="border:none;">

                  <font id="star">*</font>&nbsp;<textarea id="textarea2" name="test2" style="width:100%;height:400px;"> <?php echo $row['cms_content'];?>
			   </textarea>
</td>
                       </tr>
                        <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
                       <tr>
                       <td style="border:none;"><input type="image" name="submit" id="submit" value="submit" src="images/btn_submit.gif" /><input type="hidden" name="submit" id="submit" value="submit" /></td>
                       </tr>
                    </table>
            	</td>
            </tr>
       
        </table>
        </form>
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
		$cms_title=$_POST['cms_title'];
		$cms_content=urldecode($_POST['test2']);
		$description1=addslashes($cms_content);
		$cma = "UPDATE cms SET cms_title = '$cms_title', cms_content='$description1' where cms_id = '$cms_id'";
		
		$qcma = mysql_query($cma);
		
		//$cm->update_cms($cms_id,$cms_title,$cms_content);	
		echo "<script>alert('You Are Successfully Update Record');window.location='cms_all.php'</script>";
}
?>