<?php
	include("../connect/config2.php");
	include("secure.php");
	
	$recsno=$_GET["recsno"]; 
	$data=trim($recsno); 
	$ex=explode(" ",$data); 
	$size=sizeof($ex); 
	
	
	for($i=0;$i<$size;$i++) 
	{ 
		$id=trim($ex[$i]); 
	  //  $sql="delete from successstory where ID='$id'"; 
	   // $result=mysql_query($sql);
	  
	  	$sql = "update register set status='Active' where status='Inactive' && index_id IN ('$id');";
	    $result=@mysql_query($sql);
	  
	

	   
	}	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.validate.js" type="text/javascript"></script>
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
               <span class="red_text">	Inactive To Active Members</span>
                </td>
            </tr>
			  <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
			
            <tr>
            	<td style="border:none;" class="text2">      
	
				Selected Members successfully Approved As Inactive To Active.
              </td>
            </tr>
			 <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
			<tr>
            	<td align="left" style="border:none;">
	               <a href="member.php" class="text2">Check Members</a>
                </td>
            </tr>
          </table>
		
        </div>
        <div id="footer" style="margin-top:250px;">
        	<?php include('footer.php'); ?>
        </div>
    </div>
    </center>
 </center>
</body>
</html>
