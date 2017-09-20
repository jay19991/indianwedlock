<?php
session_start();
//// like i said, we must never forget to start the session
//
//// is the one accessing this page logged in or not?
if (!isset($_SESSION['basic_is_logged_in'])
    || $_SESSION['basic_is_logged_in'] !== true) {
		
//    // not logged in, move to login page
    @header('Location: index.php');
    exit;
//	
}

include('connect/config.php');
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $info['title']; ?> Admin Panel ::::---</title><!-- CSS Reset -->
		<link rel="stylesheet" type="text/css" href="css/reset.css" tppabs="http://www.xooom.pl/work/magicadmin/css/reset.css" media="screen" />
       
        <!-- Fluid 960 Grid System - CSS framework -->
		<link rel="stylesheet" type="text/css" href="css/grid.css" tppabs="http://www.xooom.pl/work/magicadmin/css/grid.css" media="screen" />
		
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
        <!-- Main stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" tppabs="http://www.xooom.pl/work/magicadmin/css/styles.css" media="screen" />
        
        <!-- WYSIWYG editor stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/jquery.wysiwyg.css" tppabs="http://www.xooom.pl/work/magicadmin/css/jquery.wysiwyg.css" media="screen" />
        
        <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/tablesorter.css" tppabs="http://www.xooom.pl/work/magicadmin/css/tablesorter.css" media="screen" />
        
        <!-- Thickbox stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/thickbox.css" tppabs="http://www.xooom.pl/work/magicadmin/css/thickbox.css" media="screen" />
        
        <!-- Themes. Below are several color themes. Uncomment the line of your choice to switch to different color. All styles commented out means blue theme. -->
        <link rel="stylesheet" type="text/css" href="css/theme-blue.css" tppabs="http://www.xooom.pl/work/magicadmin/css/theme-blue.css" media="screen" />
        <!--<link rel="stylesheet" type="text/css" href="css/theme-red.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-yellow.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-green.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="css/theme-graphite.css" media="screen" />-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="js/jquery-1.3.2.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery-1.3.2.min.js"></script>
        
		<!-- JQuery WYSIWYG plugin script -->
		<script type="text/javascript" src="js/jquery.wysiwyg.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.wysiwyg.js"></script>
        
        <!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="js/jquery.tablesorter.min.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.min.js"></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="js/jquery.tablesorter.pager.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.tablesorter.pager.js"></script>
        
		<!-- JQuery password strength plugin script -->
		<script type="text/javascript" src="js/jquery.pstrength-min.1.2.js" tppabs="http://www.xooom.pl/work/magicadmin/js/jquery.pstrength-min.1.2.js"></script>
        
		<!-- JQuery thickbox plugin script -->
		<script type="text/javascript" src="js/thickbox.js" tppabs="http://www.xooom.pl/work/magicadmin/js/thickbox.js"></script>
        
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
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
		
		
		 <script language = "Javascript">
  
function Validate()
{
    
	
	/*js*/
	
	 var alphacat = /^([a-zA-Z-.&\/]+\s){0,10}[a-zA-Z-.&\/]+$/;
	if (document.forms.frm2.offer_img.value=="")
	{
	  	alert("Please enter offer image!");
	  	document.forms.frm2.offer_img.focus();
	  	return false;
 	}
	  var offer_img = /(.*?)\.(jpg|JPG|jpeg|png|PNG|gif|GIF|bmp|BMP)$/;
	  if(!offer_img.test(document.forms.frm2.offer_img.value))
	  {
      alert("Only .gif, .png , .jpeg, .jpg, .bmp file allowed in product small image!!");
      document.forms.frm2.offer_img.focus();
      return false;
 	  }
	/*if (document.forms.frm2.offer_img.value=="")
	{
	  	alert("image is already exists!");
	  	document.forms.frm2.offer_img.focus();
	  	return false;
 	}*/
	/*if(document.forms.frm2.prod_big_main.value!="")
	{
	
	  var prod_big_main = /(.*?)\.(jpg|JPG|jpeg|png|PNG|gif|GIF|bmp|BMP)$/;
	  if(!prod_big_main.test(document.forms.frm2.prod_big_main.value))
	  {
      alert("Only .gif, .png , .jpeg, .jpg, .bmp file allowed in product Big image!!");
      document.forms.frm2.prod_big_main.focus();
      return false;
 	  }
	
 	}*/
	/*js*/
	/*js*/
	
	/*js*/
	
	if (!document.frm2.status[0].checked && !document.frm2.status[1].checked )
	{
	alert("Please select  status !");
	return false;
	} 

     return true;
}

</script>
<script language="JavaScript" type="text/JavaScript">
function bk()
{
	window.location = "offer_img.php";
}
</script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">
            <?php include("header_master.php"); ?>
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons --><!-- End .grid_7 -->
            
            <!-- Account overview --><!-- End .grid_5 -->
            
          <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                <!-- Notification boxes -->
              <!-- Example table --><!-- End .module -->
</div>
        <!-- End .grid_12 -->
                
            <!-- Categories list --><!-- To-do list --><!-- End .grid_6 -->
          <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Add Offer Image Details </span></h2>
                        
                    <div class="module-body">
                       <form name="frm2" action="" method="post"  onSubmit="return Validate();" enctype="multipart/form-data" autocomplete="off">
                      	<p>
                                <label><font color="#FF3300">*</font>&nbsp;Offer Image</label>
                               
								<input type="file"  value=""    name="offer_img" id="offer_img" class="input-medium"/><font color="#FF0000"><?php echo $msg; ?></font>
                                <!--<span class="notification-input ni-correct">This is correct, thanks!</span>-->
								<p>
                                <label><font color="#FF3300">*</font>&nbsp;status</label>
                            
				
						     <p align="left"><font color="#FF3300"></font>&nbsp;<input type="radio" name="status" value="1" checked/> Active&nbsp;&nbsp;<input type="radio" name="status" value="0"/> Inactive</p>
							<p>&nbsp;</p>
							<p align="left"><input class="submit-green" type="submit" name="submit" value="Submit" /> 
                                <input class="submit-gray" type="button" value="Cancel" onclick="bk();"/></p>
						
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                          
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <!-- Settings--><!-- End .grid_6 -->
                
            <!-- Password --><!-- End .grid_6 -->
          <div style="clear:both;"></div>
            
			<!-- End .grid_3 --><!-- End .grid_3 --><!-- End .grid_6 -->

            
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<?php include("footer.php"); ?>
        </div> <!-- End #footer -->
	</body>
</html>
<?php
if(isset($_POST['submit']))
{
		$mer_id=$_SESSION['merchant_id'];
		$prod_small=$_FILES['offer_img']['name'];
		$status=$_POST['status'];
		
		
		if(!file_exists("../offer_img/".$prod_small))
		{				
				copy($_FILES['offer_img']['tmp_name'],"../banner/".$prod_small);
		
      
				 $sql = mysql_query("insert into offer_image(offer_img,merchant_id,status) values('".$prod_small."','$mer_id','".$_POST['status']."')") or die(mysql_error());
	echo "<script>window.location = 'offer_img.php'</script>";
		}
		else 
		{
				//echo $f=session_id();
				$r="SELECT * FROM offer_image ORDER BY offer_id DESC LIMIT 1";
				$t=mysql_query($r);
				$h=mysql_fetch_array($t);
				$k=$h['offer_id'];
				
				$img=$k.$prod_small;
				copy($_FILES['offer_img']['tmp_name'],"../offer_img/".$img);
				//echo $r="SELECT TOP 1 FROM banner ORDER BY banner_id DESC";
				$ins = mysql_query("insert into offer_image(offer_img,merchant_id,status) values('".$img."','$mer_id','".$_POST['status']."')") or die(mysql_error());
				$g=mysql_query($ins);
				
				
				echo "<script>window.location='offer_img.php';</script>";
			}
	

}
		  
?>
  		
<?php /*?><?php
if(isset($_POST['submit']))
{

		$mer_id=$_SESSION['merchant_id'];		
		$banner_name=$_POST['banner_name'];
	    $prod_small=$_FILES['banner_img']['name'];
	    $status=$_POST['status'];
		
		$f="SELECT * FROM banner WHERE banner_name='$banner_name'";	  
		$q_f=mysql_query($f);
		$cnt=mysql_num_rows($q_f);
		if($cnt>0)
		{
		echo "<script>alert('Banner Name Is Already Exists');window.location = 'banner.php';</script>";
		}
		else
		{				
					
			if(!file_exists("../banner/".$prod_small))
			{				
				copy($_FILES['banner_img']['tmp_name'],"../banner/".$prod_small);
				$ins="INSERT INTO banner(banner_name,banner_img,merchant_id,status) VALUES('$banner_name','$prod_small','$mer_id','$status')";
				$m=mysql_query($ins);
			}
			else 
			{
				//echo $f=session_id();
				$r="SELECT * FROM banner ORDER BY banner_id DESC LIMIT 1";
				$t=mysql_query($r);
				$h=mysql_fetch_array($t);
				$k=$h['banner_id'];
				
				$img=$k.$prod_small;
				copy($_FILES['banner_img']['tmp_name'],"../banner/".$img);
				//echo $r="SELECT TOP 1 FROM banner ORDER BY banner_id DESC";
				echo $ins="INSERT INTO banner(banner_name,banner_img,merchant_id,status) VALUES('$banner_name','$img','$mer_id','$status')";
				$g=mysql_query($ins);
				
				
				echo "<script>window.location='banner.php';</script>";
			}
	}	
}
		  
?>
<?php */?>