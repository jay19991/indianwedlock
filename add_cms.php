<?php
require("../connect/config2.php");
require("secure.php");



	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" language="javascript">
function valid()
{
if (document.forms.countryform.cms_title.value=="")
	{
	  	alert("Please enter your cms title.");
	  	document.forms.countryform.cms_title.focus();
	  	return false;
 	}
	if (document.forms.countryform.cms_display.value=="")
	{
	  	alert("Please enter your Position in Page.");
	  	document.forms.countryform.cms_display.focus();
	  	return false;
 	}
	var m = document.forms.countryform.status[0].checked;
	var n = document.forms.countryform.status[1].checked;
				if((m==false)&&(n==false))
				{
				alert("Please Cheak Status ");
                return false;
				}
	
	if (document.forms.countryform.textarea2.value=="")
	{
	  	alert("Please enter your cms content.");
	  	document.forms.countryform.textarea2.focus();
	  	return false;
 	}
	
return true;
}	
</script>
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="editor/styles/styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="editor/styles/jquery.wysiwyg.css" tppabs="http://www.xooom.pl/work/magicadmin/css/jquery.wysiwyg.css" media="screen" />
        
      <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
		<script src="js/jquery.validate.js" type="text/javascript"></script>

       <script type="text/javascript">


$().ready(function() {

	// validate signup form on keyup and submit
	$("#frm").validate({
		rules: {
			cms_title: "required",
			cms_display: "required",
			status: "required",
			textarea2: "required"
			
		},
		messages: {
			cms_title: " Please enter cms_title",
			cms_display: " Please Select Position",
			status: " Please select status",
			textarea2: " Please enter cms content",
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
       
        
<script language="JavaScript" type="text/JavaScript">
function bk()
{
	window.location = "main.php";
}
</script>      
<link rel="stylesheet" href="editor/docs/style.css" type="text/css">
		
		<!-- 
			Include the WYSIWYG javascript files
		-->
		<script type="text/javascript" src="editor/scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="editor/scripts/wysiwyg-settings.js"></script>
		<!-- 
			Attach the editor on the textareas
		-->
		<script type="text/javascript">
			// Use it to attach the editor to all textareas with full featured setup
			//WYSIWYG.attach('all', full);
			
			// Use it to attach the editor directly to a defined textarea
			//WYSIWYG.attach('textarea1'); // default setup
			WYSIWYG.attach('textarea2', full); // full featured setup
			//WYSIWYG.attach('textarea3', small); // small setup
			
			// Use it to display an iframes instead of a textareas
			//WYSIWYG.display('all', full);  
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
        <form name="countryform" method="post" onsubmit="return valid();"> 
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
            	<td style="border:none;" class="green_text"> 
                    
                    <table style="border:solid 5px #7e0000;" width="900px" align="center" class="green_text">
                      <tr>
                        <td height="40" width="192"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">CMS Title :</span></td>
                        <td width="688" class="errormsg"><input name="cms_title" type="text" id="cms_title" value="" style="width:250px;" />&nbsp;</td>
                       </tr>
					    <tr>
                        <td height="40" width="192"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Position in Page :</span></td>
                        <td width="688" class="errormsg"><select name="cms_display" id="cms_display" style="width:250px;">
						<option value="">Select Position</option>
						<option value="footer">Footer</option>
						</select>  &nbsp;</td>
                       </tr>
					    <tr>
                        <td height="40" width="192"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Status:</span></td>
                        <td width="688" class="text"><div class="text"><input name="status" id="status" type="radio" value="1" />Active&nbsp;&nbsp;<input name="status" type="radio" value="0" id="status"/>Inactive</div><div class="errormsg"></div></td>
                       </tr>
                       <tr>
                        <td height="40" valign="top" style="border:none;" colspan="2"><div class="module">
				<div class="module-body">
                  <font id="star">*</font>&nbsp;<textarea id="textarea2" name="test2"  style="width:100%;height:400px;"><?php echo $row['cms_content'];?>
			   </textarea>
			   </div></div> </td>
                       </tr>
                        <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
                       <tr>
                       <td style="border:none;" colspan="2"><input type="image" name="submit" id="submit" value="submit" src="images/btn_submit.gif" /><input type="hidden" name="submit" id="submit" value="submit" /></td>
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
		$cms_title=ucwords($_POST['cms_title']);
		$cms_content=mysql_real_escape_string($_POST['test2']);
		$cms_display=$_POST['cms_display'];
		$status=$_POST['status'];
		
		$sql="insert into cms(cms_title,cms_content,cms_display,status) values('$cms_title','$cms_content','$cms_display','$status')";
		mysql_query($sql) or mysql_error();
		echo "<script>alert('Add Your Content Successfully.');</script>";
		
		if(isset($_REQUEST['page']) and $_REQUEST['page']!='')
		{
			echo "<script>window.location='add_cms.php?page=".$_REQUEST['page']."'</script>";
		}
		else
		{
			echo "<script>window.location='cms_all.php'</script>";
		}
	}
?>