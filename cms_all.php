<?php

include("../connect/config2.php");
include("../BusinessLogic/class.cms.php");
include("secure.php");
$msg = "";
$cm=new cms();

		if(isset($_REQUEST['act']) and $_REQUEST['act']!='')
		{
			$value=intval($_REQUEST['act']);
			$cm->change_status($value,1);
		}
		
		if(isset($_REQUEST['dact']) and $_REQUEST['dact']!='')
		{
			$value=intval($_REQUEST['dact']);
			$cm->change_status($value,0);
		}
		
		if(isset($_REQUEST['cms_id']) and $_REQUEST['action']=='del')
		{
			$value=intval($_REQUEST['cms_id']);
			$cm->del_cms($value);
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Activate')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$cm->change_status($value,1);
			}
			$msg ="Activated Successfully!";
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Deactivate')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$cm->change_status($value,0);
			}
			$msg ="Deactivated Successfully!";
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Delete')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$cm->del_cms($value);
			}
			$msg ="Deleted Successfully!";
		}
		
		$condition="";
		if(isset($_REQUEST['search']) and $_REQUEST['search']!='Search By title')
		{
			$keyword=$_REQUEST['keywords'];
			$condition=" where cms_title like '%$keyword%'";
		}		
		
	$result=$cm->get_cms($condition);

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
<title>:: Matrimonial Script - Admin Panel ::</title>
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
		if(kword.value=='Search By title')
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
					<td align="left" style="border:none;width:50%;" class="red_text">All CMS Details</td>        
                  <td align="right" style="border:none;" width="50%">
				  <?php 
				  if($_SESSION['add']=='Yes')
				  {
				  ?>
                  <a href="add_cms.php"><img src="images/btn_add.gif" height="36" width="116" border="0" /></a>  
				  
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
<td width="79%" style="border:none;"><table><tr><td style="border:none;">
<input type="text" name="keywords" id="keywords" title="Search By title" style="width:250px;color:#999999;" value="<?php if(isset($_REQUEST['keywords']) and $_REQUEST['keywords']!=''){ echo $_REQUEST['keywords']; }else{ echo "Search By title"; } ?>" onblur="if (this.value == '') {this.value = 'Search By title';}" onfocus="if (this.value == 'Search By title') {this.value = ''}" autocomplete="off" />
</td>
<td style="border:none;">
<input type="image" src="images/btn_search.gif" name="search" value="search" /><input type="hidden" name="search" value="search" />
</td>
<td style="border:none;">
<img src="images/btn_showal.gif" onclick="window.location='cms_all.php'" />
</td></tr></table>

</td>
</form>
</tr>
<?php
	if($tcount!=0)
	{
 ?>
		<form name="form1" id="records" method="post" action="" onsubmit="return validateform1();"> 
            <tr>
            	<td style="border:none;">       
                    <table style="border:solid 5px #7e0000;" width="990px" align="center">
                        <tr bgcolor="#CCCCCC" style="color:#7e0000;">
                            <td>&nbsp;
                            
                            </td>
                            <td height="40px" width="300px">
                                <span class="con_title">Title</span>
                            </td>
							
                            <td width="200px">
                                <span class="con_title">Status</span>
                            </td>
                           <td height="40px" width="200px">
                                <span class="con_title">Display On Page</span>
                            </td>
                           <td align="left">
                                <span class="con_title">Action</span>
                            </td>
                        </tr>
					   <?php					   
                            while(($count<$rpp) && ($i<$tcount)) 
							{
                             mysql_data_seek($result,$i);
                             $row = mysql_fetch_array($result);
                         ?>
                        <tr>
                            <td align="center" width="20px"><input type="checkbox" id="ch1[]" name="ch1[]" value="<?php echo $row['cms_id']; ?>" /></td>
                            <td class="text"><?php echo $row['cms_title']; ?></td>
                            <td class="text"><?php if($row['status']){ echo "Active";} else { echo "Inactive"; } ?></td>
                            
							<td class="text"><?php echo $row['cms_display']; ?></td>
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
                                         <a href="cms_all.php?<?php if(isset($param_1))echo $param_1; ?>dact=<?php echo $row['cms_id']; ?>"><img src="images/btn_deact.gif" height="35" width="35" title="Inactive" border="0"/></a>
                                               <?php
												}
												else
												{
											?>
                                            <a href="cms_all.php?<?php if(isset($param_1))echo $param_1; ?>act=<?php echo $row['cms_id']; ?>"><img src="images/btn_act.gif" height="35" width="35" title="Active" border="0"/></a>
                                             <?php
												}
											}
											?>                                        </td>
                                        <td style="border:none;">
										  <?php 
											  if($_SESSION['edit']=='Yes')
											  {
											  ?>
										<a href="cms.php?<?php if(isset($param_1))echo $param_1; ?>cms_id=<?php echo $row['cms_id']; ?>"><img src="images/btn_edit.gif" height="35" width="35" title="EDIT" border="0"/></a>
										<?php
												}
											?></td>
                                        <!--<td style="border:none;">
										 <?php 
											 // if($_SESSION['delete']=='Yes')
											  //{
											  ?>
                                             <a href="javascript:if(confirm('Are you sure, you want to delete this Record?')) {location.href='cms_all.php?cms_id=<?php //echo $row['cms_id']?>&amp;action=del'};"><img src="images/btn_delete.gif" height="35" width="35" title="DELETE" border="0"/></a>
											 <?php
												//}
											?>                                        </td>
                                        <td style="border:none;display:none;">
                                             <a href="cms_all.php?act=<?php //echo $row['cms_id']; ?>"><img src="images/btn_preview.gif" height="35" width="35" title="Preview" border="0"/></a>                                        </td>-->
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
                        <td width="180px" style="border:none;">
                            <a href="javascript:checkall();" class="green_text">Check All</a> / <a href="javascript: checknone();" class="green_text">Uncheck All</a>
                        </td>
                        <td style="border:none;" width="110px">
                            <select name="action" id="action">	
                                <option value="">Select Option</option>                              
                                <option value="Activate">Active</option>
                                <option value="Deactivate">Inactive</option>
								<!--<option value="Delete">Delete</option>-->
                            </select></td><td style="border:none;" align="left">
							<input type="image" src="images/btn_go.gif" height="30" />
                        </td>
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
