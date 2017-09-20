<?php
include("../BusinessLogic/class.register.php");
include("../connect/config2.php");
include("secure.php");	
$rel=new register();

$msg = "";
session_start();


$condition="";
		if(isset($_REQUEST['search']) and $_REQUEST['search']!='Search By Gender')
		{
			$keyword=$_REQUEST['keywords'];
			$condition .= " AND matri_id like '%$keyword%'";
		}	

$rr="SELECT * FROM register WHERE status!='Suspend'".$condition;
$result = mysql_query($rr); 

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
					<td align="left" style="border:none;width:50%;" class="red_text">Suspend Members</td>        
                  <td align="right" style="border:none;" width="50%">&nbsp;				     </td>
                  </tr>
                </table>                </td>
            </tr>
			<tr>
		   	<td style="border:none;color:#FF0000;">	
        		<?php echo $msg; ?>        	</td>
    	</tr>
             <tr>
    	<td  height="15px" valign="bottom" style="border:none;">
        	<hr color="#A0A741" />        </td>
    </tr>

   <tr>

<form id="search" method="post" action="" onsubmit="return validatesearch();">
<td width="79%" style="border:none;"><table><tr><td style="border:none;">
<input type="text" name="keywords" id="keywords" title="Search By Gender" style="width:250px;color:#999999;" value="<?php if(isset($_REQUEST['keywords']) and $_REQUEST['keywords']!=''){ echo $_REQUEST['keywords']; }else{ echo "Search By Gender"; } ?>" onblur="if (this.value == '') {this.value = 'Search By Gender';}" onfocus="if (this.value == 'Search By Gender') {this.value = ''}" autocomplete="off" />
</td>
<td style="border:none;">
<input type="image" src="images/btn_search.gif" name="search" value="search" /><input type="hidden" name="search" value="search" />
</td>
<td style="border:none;">
<img src="images/btn_showal.gif" onclick="window.location='approve_paid.php'" />
</td>
</tr></table>

</td>
</form>
</tr>
<?php
	if($tcount!=0)
	{
 ?>
		<form name="form1" method="post" action="">
            <tr>
           	  <td style="border:none;"><table style="border:solid 5px #7e0000;" width="990px" align="center" cellspacing="5">
                <tr bgcolor="#CCCCCC" style="color:#7e0000;" class="text">
                  <td height="40px" width="72"><span style="font-size:13px; padding-left:5px;">MatriId</span> </td>
                  <td height="40px" width="104"><span style="font-size:13px; padding-left:5px;">FirstName</span> </td>
                  <td height="40px" width="97"><span style="font-size:13px; padding-left:5px;">LastName</span> </td>
                  <td height="40px" width="148"><span style="font-size:13px; padding-left:5px;">Email</span> </td>
                  <td height="40px" width="104"><span style="font-size:13px; padding-left:5px;">Gender</span> </td>
                  <td height="40px" width="125"><span style="font-size:13px; padding-left:5px;">RegisterDate</span> </td>
                  <td height="40px" width="103"><span style="font-size:13px; padding-left:5px;">Status</span> </td>
                  <td height="40px" width="166"><span style="font-size:13px; padding-left:5px;">Approve As Paid</span> </td>
                </tr>
                <?php					   
                            while(($count<$rpp) && ($i<$tcount)) 
							{
                             mysql_data_seek($result,$i);
                             $row = mysql_fetch_array($result);
                         ?>
                <tr>
                  <td class="text"><?php echo $row['matri_id']; ?></td>
                  <td class="text"><?php echo $row['firstname']; ?></td>
                  <td class="text"><?php echo $row['lastname']; ?></td>
                  <td class="text"><?php echo $row['email']; ?></td>
                  <td class="text"><?php echo $row['gender']; ?></td>
                  <td class="text"><?php echo $row['reg_date']; ?></td>
                  <td class="text"><?php echo $row['status']; ?></td>
                  <td width="166" bgcolor="#999966" ><a href="approve_suspend_sms.php?id=<?php echo $row['matri_id']; ?>&action=suspend" style="color:#FFFFFF; font-size:14px;text-decoration:none; font-weight:bold;" >Suspend Member</a></td>
                </tr>
                <?php
								$i++;
								$count++;
								}
								
						?>
              </table></td>
          </tr>
                    </table>
            	</td>
            </tr>
            <tr>
            	<td style="border:none;" align="left">
                <table width="1000px" align="center">
                    <tr>
					
                       
						
                        <td width="381" align="right" style="border:none;">
                    <?php
					 // call pagination function:
					include("pagination4.php");
					//echo "<font color=#B59D5F> Result Pages:</font>";
					echo paginate_three($reload, $page, $tpages, $adjacents);
					?>                        </td>
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
<?php
	if(isset($_REQUEST['action']) && $_REQUEST['action']=='suspend')
	{
		$id = $row['matri_id'];
		$ssql = "UPDATE register SET status='Suspend' WHERE matri_id = '$id'";
		$fsql = mysql_query($ssql);
	}
?>