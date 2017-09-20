<?php
include("../BusinessLogic/class.register.php");
include("../connect/config2.php");
	include("secure.php");
$msg = "";
$cn=new register();

		if(isset($_REQUEST['act']) and $_REQUEST['act']!='')
		{
			$value=intval($_REQUEST['act']);
			$cn->change_status($value,1);
		}
		
		if(isset($_REQUEST['dact']) and $_REQUEST['dact']!='')
		{
			$value=intval($_REQUEST['dact']);
			$cn->change_status($value,0);
		}
		
		if(isset($_REQUEST['id']) and $_REQUEST['action']=='del')
		{
			$value=intval($_REQUEST['id']);
			$cn->del_country($value);
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Activate')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$cn->change_status($value,1);
			}
			$msg ="Activated Successfully!";
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Deactivate')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$cn->change_status($value,0);
			}
			$msg ="Deactivated Successfully!";
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='Delete')
		{	
			foreach($_POST['ch1'] as $key => $value)
			{
				$cn->del_country($value);
			}
			$msg ="Deleted Successfully!";
		}
		
			
	/*$result = mysql_query("SELECT matri_id, status,date_format(mship_expire,'%d-%M-%Y') as mship_expire, DATEDIFF( CURRENT_DATE, mship_expire ) AS expdays
FROM register
WHERE DATEDIFF( CURRENT_DATE, mship_expire ) >1
LIMIT 0 , 30 ");*/
$dt=date('d-m-Y');
 // $sql2="select r.*,p.* from register r,payments p where  r.matri_id=p.pmatri_id && p.exp_date >= '$dt' ";
 	$sql2="select r.*,p.* from register r,payments p where r.matri_id=p.pmatri_id && STR_TO_DATE(p.exp_date, '%d-%m-%Y') >= STR_TO_DATE('$dt', '%d-%m-%Y') group by p.pmatri_id order by p.payid desc";
							$result=mysql_query($sql2)  or die(mysql_error());
							


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
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var win = null;
function newWindow(mypage,myname,w,h,features) {
  var winl = (screen.width-w)/2;
  var wint = (screen.height-h)/2;
  if (winl < 0) winl = 0;
  if (wint < 0) wint = 0;
  var settings = 'height=' + h + ',';
  settings += 'width=' + w + ',';
  settings += 'top=' + wint + ',';
  settings += 'left=' + winl + ',';
  settings += features;
  win = window.open(mypage,myname,settings);
  win.window.focus();
}
//  End -->
</script>
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
		if(kword.value=='Search By MatriId')
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
					<td align="left" style="border:none;width:50%;" class="red_text">Comming Renewal Membership Details</td>        
                  <td align="right" style="border:none;" width="50%">
				  
				 
				  
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
       <!--      <tr>

<form id="search" method="post" action="" onsubmit="return validatesearch();">
<td width="79%" style="border:none;"><table><tr><td style="border:none;">
<input type="text" name="keywords" id="keywords" title="Search By MatriId" style="width:250px;color:#999999;" value="<?php if(isset($_REQUEST['keywords']) and $_REQUEST['keywords']!=''){ echo $_REQUEST['keywords']; }else{ echo "Search By MatriId"; } ?>" onblur="if (this.value == '') {this.value = 'Search By MatriId';}" onfocus="if (this.value == 'Search By MatriId') {this.value = ''}" autocomplete="off" />
</td>
<td style="border:none;">
<input type="image" src="images/btn_search.gif" name="search" value="search" /><input type="hidden" name="search" value="search" />
</td>
<td style="border:none;">
<img src="images/btn_showal.gif" onclick="window.location='renew_member.php'" />
</td></tr></table>

</td>
</form>
</tr>-->
<?php
	if($tcount!=0)
	{
 ?>
		<form name="form1" id="records" method="post" action="" onsubmit="return validateform1();"> 
            <tr>
            	<td style="border:none;">       
                    <table style="border:solid 5px #7e0000;" width="990px" align="center">
                        <tr bgcolor="#CCCCCC" style="color:#7e0000;">
                            
                            <td height="40px" width="97">
                                <span class="con_title">MatriId</span>                            </td> 
                      <td height="40px" width="209">
                                <span class="con_title">Membership Activate Date</span>                            </td>
					  <td height="40px" width="153">
                                <span class="con_title">Expired Date On</span>                            </td>
					  <td height="40px" width="137">
                                <span class="con_title">Days</span>                            </td>
                      <td width="103">
                                <span class="con_title">Status</span>                            </td>
                           	<td width="83">
                            	<span class="con_title">Send SMS</span>                            </td>
<td align="left">
                                <span class="con_title">Action</span>
                          </td>
                        </tr>
					   <?php
					   
					   						 
function dateDiff($dformat, $endDate, $beginDate)
{
    $date_parts1=explode($dformat, $beginDate);
    $date_parts2=explode($dformat, $endDate);
    $start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
    $end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
    return $end_date - $start_date;
}						 
						 
			
					   
					   
					   					   
                            while(($count<$rpp) && ($i<$tcount)) 
							{
                             mysql_data_seek($result,$i);
                             $row = mysql_fetch_array($result);
                         

						 
						 	$d1=$row['pactive_dt'];
				
				$d11= date('m-d-Y',strtotime($d1));
				
				$dt=date('Y-m-d');
				$d22=date('m-d-Y',strtotime($dt)); 

 

//print "If we subtract " . $date1 . " from " . $date2 . " we get " . dateDiff("-", $d22, $d11) . ".";
$dt33=dateDiff("-", $d22, $d11);
						 
						 ?>
						 
                        <tr>
                           
                            <td class="text"><?php echo $row['matri_id']; ?></td>
							 <td class="text"><?php echo $row['pactive_dt']; ?></td>
							  <td class="text"><?php echo $row['exp_date']; ?></td>
							  <td class="text"><?php 
				/*	$start = strtotime('2012-03-05');
$end = strtotime('2012-06-03');

echo $days_between = ceil(abs($end - $start) / 86400);
							  
							  
							  */echo $dt33 ?> Days</td>

							   <td class="text"><?php echo $row['status']; ?></td>                              <td><a href="renew_sms.php?id=<?php echo $row['matri_id']; ?>" class="green_text">Send SMS</a></td>
                            <td width="168">
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
												?>                                 </td>
                                      
                                        <td style="border:none;" class="red_text">
										<a href="#" onClick="newWindow('approve_paid_form.php?id=<?php  echo $row['matri_id']?>','','520','550')"
				 class="red_text" >Renew Now</a>
                                      </td>
                                        <td style="border:none;">
                                             <a href="member_detail.php?id=<?php echo $row['matri_id']; ?>"><img src="images/btn_preview.gif" height="35" width="35" title="Preview" border="0"/></a>                                        </td>
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
                         
                        </td>
                        <td style="border:none;" width="110px">
                            
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
