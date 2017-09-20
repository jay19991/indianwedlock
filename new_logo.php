<?php

//print_r($_REQUEST);
 
include("../BusinessLogic/class.religion.php");
include("../connect/config2.php");
include("secure.php");
$msg = "";
$rel=new religion();

		if(isset($_REQUEST['act']) and $_REQUEST['act']!='' || ($_REQUEST['status'] && $_REQUEST['status']!=''))
		{
			$value=intval($_REQUEST['act']);
			$st=trim($_REQUEST['status']);
			 	 $sqlupdt="UPDATE `addnewlogo` SET `status`='$st' WHERE `logo_id`='$value'";
				
				
				 $sqlupdt1="UPDATE `addnewlogo` SET `status`='0' WHERE `logo_id`!='$value'";
				mysql_query($sqlupdt);
				
				mysql_query($sqlupdt1);
			
		}
		
		if(isset($_REQUEST['dact']) and $_REQUEST['dact']!=''|| ($_REQUEST['status'] && $_REQUEST['status']!=''))
		{
			$value=intval($_REQUEST['dact']);
			$st=trim($_REQUEST['status']);
			
			$sqlupdt="UPDATE `addnewlogo` SET `status`='$st' WHERE `logo_id`='$value'";
				mysql_query($sqlupdt);
		}
		
		if(isset($_REQUEST['logo_id']) and $_REQUEST['action']=='del')
		{
			$value=intval($_REQUEST['logo_id']);
			$sqldel="DELETE FROM `addnewlogo` WHERE `logo_id`='$value'";
			mysql_query($sqldel);
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Activate')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$rel->change_status($value,1);
			}
			$msg ="Activated Successfully!";
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Deactivate')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$rel->change_status($value,0);
			}
			$msg ="Deactivated Successfully!";
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Delete')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$rel->del_religion($value);
			}
			$msg ="Deleted Successfully!";
		}
		
		$condition="";
		if(isset($_REQUEST['search']) and $_REQUEST['search']!='Search By Religion')
		{
			$keyword=$_REQUEST['keywords'];
			$condition=" where religion_name like '%$keyword%' ";
		}		
		
		$sql="SELECT * FROM `addnewlogo`";
	$result=mysql_query($sql);

//  extract($row);
$rpp = $info['no_records_admin_page'];; // results per page
$adjacents = 3;
if(isset($_GET["page"]))
{
$page = intval($_GET["page"]);
}
else

$page = 1;
$reload = $_SERVER['PHP_SELF'];
				
// count total number of appropriate listings:
$tcount = mysql_num_rows($result);
					
// count number of pages:
$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
$count = 0;
$i = ($page-1)*$rpp;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="css/paginate.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/valid.js" type="text/javascript"></script>
<script type="text/javascript">
	function validateform1()
	{		
		var a,i,cnt=0;		
		var ac=document.getElementById("action");
		if(ac.value=='')
		{
			return false;
		}
		
		a=document.getElementsByName("ch1[]");
		for(i=0;i<a.length;i++)
		{
			if(a[i].checked)
			{
				cnt++;
			}
		}
		
		if(cnt==0)
		{
			alert("Please Select Atleast One.");
			return false;
		}
		else
		{			
			if(ac.value=='Delete')
			{
				var ans=confirm('Are you sure, you want to delete this Record?');
				if(ans==false)
				return false;
			}
			return true;
		}
	}
	
	function validatesearch()
	{
		var kword=document.getElementById("keywords");
		if(kword.value=='Search By Religion')
		{
			alert("Please Enter Keyword.");
			kword.focus();
			return false;
		}
		return true;
	}
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
        <div id="content">
 
        <table width="1000px" align="center">
        	<tr>
            	<td align="" style="border:none;">
                <table width="100%">
                    <tr>  
					<td align="left" style="border:none;width:50%;" class="red_text">Logo Details</td>        
                  <td align="right" style="border:none;" width="50%">
				  
				  <?php 
				  if($_SESSION['add']=='Yes')
				  {
				  ?>
				  <a href="add_logo.php"><img src="images/btn_add.gif" height="36" width="116" border="0" /></a> 
				  <?php
				  }
				  ?>
				     </td>

                  </tr>
                </table> 
                </td>
            </tr>
			<tr>
		   	<td style="border:none;color:#FF0000;">	
        		<?php echo $msg; ?>
        	</td>
    	</tr>
             <tr>
    	<td  height="15px" valign="bottom" style="border:none;">
        	<hr color="#A0A741" />
        </td>
    </tr>
             <tr>

<form id="search" method="post" action="" onsubmit="return validatesearch();">
<td width="79%" style="border:none;"><table><tr><?php /*?><td style="border:none;">
<input type="text" name="keywords" id="keywords" title="Search By Religion" style="width:250px;color:#999999;" value="<?php if(isset($_REQUEST['keywords']) and $_REQUEST['keywords']!=''){ echo $_REQUEST['keywords']; }else{ echo "Search By Religion"; } ?>" onblur="if (this.value == '') {this.value = 'Search By Religion';}" onfocus="if (this.value == 'Search By Religion') {this.value = ''}" autocomplete="off" />
</td><?php */?>
<?php /*?><td style="border:none;">
<input type="image" src="images/btn_search.gif" name="search" value="search" /><input type="hidden" name="search" value="search" />
</td><?php */?>
<?php /*?><td style="border:none;">
<img src="images/btn_showal.gif" onclick="window.location='religion.php'" />
</td><?php */?></tr></table>

</td>
</form>
</tr>
<?php
	if($tcount!=0)
	{
 ?>
		<form name="form1"  id="records" method="post" action="" onsubmit="return validateform1();" > 
            <tr>
            	<td style="border:none;">       
                    <table style="border:solid 5px #7e0000;" width="990px" align="center">
                        <tr bgcolor="#CCCCCC" style="color:#7e0000;">
                            <td>&nbsp;
                            
                            </td>
                            <td height="40px" width="400px">
                                <span style="font-size:13px; padding-left:5px;"><b>Logo</b></span>
                            </td>
                            <td width="300px">
                                <span style="font-size:13px;  padding-left:5px;"><b>Status</b></span>
                            </td>
                           
                           <td align="left">
                                <span style="font-size:13px;  padding-left:5px;"><b>Action</b></span>
                            </td>
                        </tr>
					   <?php					   
                            while(($count<$rpp) && ($i<$tcount)) 
							{
                             mysql_data_seek($result,$i);
                             $row = mysql_fetch_array($result);
                         ?>
                        <tr>
                            <td align="center" width="20px"><input type="checkbox" id="ch1[]" name="ch1[]" value="<?php echo $row['logo_id']; ?>" /></td>
                            <td class="text"><img src="../images/<?php echo $row['logo_path'];?>" height="22px;" width="22px;"/></td>
                            <td class="text"><?php if($row['status']){ echo "Active";} else { echo "Inactive"; } ?></td>
                            <td width="140px">
                                <table align="center">
                                    <tr>
                                        <td style="border:none;">
                                        <?php
										if(isset($_REQUEST['page']) && $_REQUEST['page']!='')
													{
														$param_1="page=".$_REQUEST['page']."&";	
													}
													else
													{
														$param1="";
													}
													 
											  if($_SESSION['profile_status']=='Yes')
											  {
											  
												if($row['status']=='1')
												{													
										?>
                                         <a href="new_logo.php?<?php if(isset($param_1))echo $param_1; ?>dact=<?php echo $row['logo_id']; ?>&status=0"><img src="images/btn_deact.gif" height="35" width="35" title="Inactive" border="0"/></a>
                                               <?php
												}
												else
												{
											?>
                                            <a href="new_logo.php?<?php if(isset($param_1))echo $param_1; ?>act=<?php echo $row['logo_id']; ?>&status=1"><img src="images/btn_act.gif" height="35" width="35" title="Active" border="0"/></a>
                                             <?php
												}
											}
											?>                                        </td>
                                       <?php /*?> <td style="border:none;">
										  <?php 
											  if($_SESSION['edit']=='Yes')
											  {
											  ?>
										<a href="edit_logo.php?<?php if(isset($param_1))echo $param_1; ?>logo_id=<?php echo $row['logo_id']; ?>"><img src="images/btn_edit.gif" height="35" width="35" title="EDIT" border="0"/></a>
										<?php
												}
											?></td><?php */?>
                                        <td style="border:none;">
										 <?php 
											 if($_SESSION['delete']=='Yes')
											  {
												  $logo_id=$_REQUEST['logo_id'];
												  $delsql="delete from addnewlogo where logo_id=".$_REQUEST['logo_id'];

												mysql_query($delsql);
											  ?>
                                             <a href="javascript:if(confirm('Are you sure, you want to delete this Record?')) {location.href='new_logo.php?logo_id=<?php echo $row['logo_id']?>&amp;action=del'};"><img src="images/btn_delete.gif" height="35" width="35" title="DELETE" border="0"/></a>
                                             
                                             
                                             
											 <?php
												}
												
												
											?>                        </td>
                                       <?php /*?> <td style="border:none;display:none;">
                                             <a href="new_logo.php?act=<?php echo $row['logo_id']; ?>"><img src="images/btn_preview.gif" height="35" width="35" title="Preview" border="0"/></a>  </td><?php */?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        
          	<?php
								$i++;
								$count++;
								}
								
						?>
					        </table>
                            </td>
                        </tr>
                    </table>
            	</td>
            </tr>
            <tr>
            	<td style="border:none;">
                <table width="1000px" align="center">
                    <tr>
					 <?php 
						if($_SESSION['delete']=='Yes' && $_SESSION['profile_status']=='Yes')
						{
					  ?>
                        <?php /*?><td width="180px" style="border:none;">
                            <a href="javascript:checkall();" class="green_text">Check All</a> / <a href="javascript: checknone();" class="green_text">Uncheck All</a>
                        </td>
                        <td style="border:none;" width="110px">
                            <select name="action" id="action">	
                                <option value="">Select Option</option>                              
                                <option value="Activate">Active</option>
                                <option value="Deactivate">Inactive</option>
								<option value="Delete">Delete</option>
                            </select></td><td style="border:none;" align="left">
							<input type="image" src="images/btn_go.gif" height="30" />
                        </td><?php */?>
						<?php } ?>
                        <td style="border:none;" align="right">
                    <?php
					 // call pagination function:
					include("pagination4.php");
					//echo "<font color=#B59D5F> Result Pages:</font>";
					echo paginate_three($reload, $page, $tpages, $adjacents);
					?>
                        </td>
                    </tr>
                </table>
            	</td>
            </tr>
			</form>
<?php
 }
 else
 {
 	echo "<tr><td style=\"border:none;color:#FF0000;\" class='text2'>No Records Found.</td></tr>";
 }
?>
			</table>
     		   
        </div>
        <div id="footer">
        	<?php include('footer.php'); ?>
        </div>
    </div>
 </center>
</body>
</html>
