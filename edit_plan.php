<?php
	include("../connect/config2.php");
	include("secure.php");
	include("../BusinessLogic/class.plan.php");
	$pmatri_id=$_GET['pmatri_id'];
	
	
	$ob=new plan();
	/*if(isset($_POST['submit']) and $_POST['submit']!='')
	{
		$country_name=mysql_real_escape_string($_POST['country']);
		$status=$_POST['status'];
		$ob->update_plan($country_id,$country_name,$status);	
		if(isset($_REQUEST['page']) and $_REQUEST['page']!='')
		{
			echo "<script>window.location='country.php?page=".$_REQUEST['page']."'</script>";
		}
		else
		{
			echo "<script>window.location='country.php'</script>";
		}
	}
	
	$cnres=$ob->get_country_by_id($country_id);
	$cnrow=mysql_fetch_array($cnres);*/
?>
<html>
<head>
<script language="javascript">
function valid()
{
	var plan=document.getElementById('plan').selectedIndex;
	if(plan==0)
	{
		alert("Please Select Plan");
		document.getElementById('plan').focus();
		return false;		
	}
	return true;
}
</script>
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
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
            	<td align="left" style="border:none;">
               <span class="red_text">Edit Country Details</span>
                </td>
            </tr>
            <tr>
            	<td style="border:none;">
				<br /> 
                   
					<form id="countryform" action="" method="post" onSubmit="return valid();">
                    <?php
					 $pmatri_id=$_GET['pmatri_id'];
					 $t="select * from payments where 	pmatri_id='$pmatri_id'";  
					 $t1=mysql_query($t);
					 $cnrow=mysql_fetch_array($t1);
					 $cnt=mysql_num_rows($t);
					 ?>  
                    <table style="border:solid 5px #7e0000;" width="530px">
                        <tr>
                        <td height="40" width="160"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Name:</span></td>
                        <td class="errormsg"><input name="fname" type="text" id="fname" value="<?php echo $cnrow['pname']; ?>" disabled>&nbsp;</td>
                       </tr>
                       <tr>
                        <td height="40"><font id="star">*</font>&nbsp;<span style="font-size:13px; padding-left:5px;">Plan:</span></td>
                        <td>
                       <select name="plan" id="plan" class="input-medium">
          <option value=""> -- Select Plan -- </option>
          <?php
			$c = "SELECT * FROM memship_plan";
			$cq = mysql_query($c);
			//$cn = mysql_num_rows($cq);
			while ($cf = mysql_fetch_array($cq))
			{ 
				$r="";
				if($cf['plan_name']==$cnrow['p_plan'])
				{
				$r="selected='selected'";
				}			
			?>
          <option value="<?php echo $cf['plan_id']; ?>" <?php echo $r; ?>> <?php echo $cf['plan_name']; ?> </option>
          <?php
			}
			?>
        </select>
					</td>
                    </tr>
						<tr>
						<td style="border:none;" class="text">
									</td>
						<td style="border:none;" class="errormsg">						</td>
						</tr>
			
                       </tr>
                       
                       <tr>
                        <td height="40">&nbsp;</td>
                        <td><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onClick="window.location='plan.php'" /></td>
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
if(isset($_POST['submit']))
	{
		$pmatri_id=$_GET['pmatri_id'];				
		$plan=$_POST['plan'];
		$sel=mysql_query("SELECT * FROM memship_plan WHERE plan_id='$plan'");
		$m=mysql_fetch_array($sel);
		$h=$m['plan_name'];
		$p=$m['plan_duration'];
		$k=$m['plan_amount'];
		$l=$m['profile'];
		$n=$m['plan_contacts'];
		$r=$m['plan_free_msg'];		
		
		
		$up="UPDATE payments SET p_plan='$h',plan_duration='$p',p_amount='$k',profile='$l',p_no_contacts='$n',p_msg='$r' WHERE pmatri_id='$pmatri_id'";
		$g=mysql_query($up);
		echo "<script>window.location='plan.php';</script>";
		
		
		//$ob->update_country($country_id,$country_name,$status);	
		
	}
?>