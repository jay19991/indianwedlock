
<?
	$sql="SELECT logo_path FROM `addnewlogo` where status='1'";
	$sql_result=mysql_query($sql);
	$row=mysql_fetch_array($sql_result);
	
?>


<table border="0" width="100%">
<tr>
<td style="padding-top:15px;" width="652"><a href="main.php"><img src="../images/<? echo $row['logo_path'];?>" height="71" width="420" /></a></td>
<td width="313" align="right" valign="top" class="red_text" style="padding-top:15px;">
       <?php
	   if(isset($_SESSION['username']))
	   { 
	   ?> 	
      <table>
      <tr>
      <td class="red_text" align="right">      
       <?php 
			  echo "Welcome, ";
			  echo $_SESSION['username'];
		?>
        &nbsp;||&nbsp;<a href="logout.php" class="red_text">Logout</a> 
		
       </td>
       </tr>
       <tr style="margin-top:20px;" align="right">
       <td>
       <a href="main.php" class="green_text" style="text-decoration:none;">Home</a> || <?php  if($_SESSION['site']=='Yes')
				  {?><a href="site_config.php" class="green_text" style="text-decoration:none;">Site Settings</a><?php } else { ?> <a href="#" class="green_text" style="text-decoration:none;">Site Settings</a><?php } ?> || <a href="change_pass.php" class="green_text" style="text-decoration:none;">Change Password</a>
       </td>
       </tr>
       </table>  
       <?php  
		}
	    ?>
</td>
</tr>
</table>
 