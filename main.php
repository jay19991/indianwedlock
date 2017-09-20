<?php

	include("../connect/config2.php");
	include("secure.php");
	
	$sql1="select * from register";
	$sql11=mysql_query($sql1);
	$res1=mysql_num_rows($sql11);
	
	$sql2="select * from register where status='Active'";
	$sql12=mysql_query($sql2);
	$res2=mysql_num_rows($sql12);
	
	$sql3="select * from register where status='Inactive'";
	$sql13=mysql_query($sql3);
	$res3=mysql_num_rows($sql13);
	
	$sql4="select * from register where status = 'Paid'";
	$sql14=mysql_query($sql4);
	$res4=mysql_num_rows($sql14);
	
	$sql44="select * from register where fstatus = 'Featured'";
	$sql144=mysql_query($sql44);
	$res44=mysql_num_rows($sql144);
	
	$sql5="select * from register where gender= 'Male'";
	$sql15=mysql_query($sql5);
	$res5=mysql_num_rows($sql15);
	
	$sql6="select * from register where gender= 'Female'";
	$sql16=mysql_query($sql6);
	$res6=mysql_num_rows($sql16);
	
	
	$sql7="select * from wedding_planner";
	$sql17=mysql_query($sql7);
	$res7=mysql_num_rows($sql17);
	
	$sql8="select * from advertisement";
	$sql18=mysql_query($sql8);
	$res8=mysql_num_rows($sql18);
	
	$sql9="select * from expressinterest";
	$sql19=mysql_query($sql9);
	$res9=mysql_num_rows($sql19);
	
	$sql10="select * from memship_plan";
	$sql100=mysql_query($sql10);
	$res10=mysql_num_rows($sql100);
	
	$sqls="select * from success_story";
	$sqlss=mysql_query($sqls);
	$res11=mysql_num_rows($sqlss);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: <?php echo $info['title']; ?> - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.smalltextred
{
 color:#660000;
}
</style>
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
            	<td align="right" height="30" style="border:none;">&nbsp;</td>
            </tr>
            <tr>
            	<td style="border:none;" >       
                    <table style="border:solid 5px #7e0000;" width="990px" align="center">
                        <tr>
                            <td height="40" width="300" bgcolor="#CCCCCC">
                                <span style="font-size:15px;  padding-left:5px;" class="red_text"><b>Site Statistics</b></span>                            </td>
                            <td width="690" bgcolor="#CCCCCC">
                                <span style="font-size:15px;  padding-left:5px;" class="red_text">ADMIN MAIN CONTROL</span></td>
                            
                        </tr>
                      
                      
                      <tr>
                      <td valign="top">  <!-- main table--> 
                      
                      
<table width="243" height="433" border="0" cellpadding="0" cellspacing="4" style="border:none;" class="text">
<tr>
<td width="99%" >Total Members : <span class="smalltextred"><?php echo $res1; ?></span></td>
</tr>
<tr>
<td >Active Members : <span class="smalltextred"><?php echo $res2; ?></span></td>
</tr>
<tr>
<td >InActive Members : <span class="smalltextred"><?php echo $res3; ?></span></td>
</tr>
<tr>
<td >Paid Members : <span class="smalltextred"><?php echo $res4; ?></span></td>
</tr>
<tr>
<td >Featured Members : <span class="smalltextred"><?php echo $res4; ?></span></td>
</tr>


<tr>
<td style="border:none;">&nbsp;</td>
</tr>
<tr>
<td >Male Profiles : <span class="smalltextred"><?php echo $res5; ?></span></td>
</tr>
<tr>
<td >Female Profiles : <span class="smalltextred"><?php echo $res6; ?></span></td>
</tr>
<tr>
<td style="border:none;">&nbsp;</td>
</tr>
<tr>
<td >Advertisement : <span class="smalltextred"><?php echo $res8; ?></span></td>
</tr>
<tr>
<td >Wedding Planners : <span class="smalltextred"><?php echo $res7; ?></span></td>
</tr>
<tr>
<td >Express Interest : <span class="smalltextred"><?php echo $res9; ?></span> </td>
</tr>
<tr>
<td >Membership Plans : <span class="smalltextred"><?php echo $res10; ?></span> </td>
</tr>
<tr>
<td >Success Story : <span class="smalltextred"><?php echo $res11; ?></span> </td>
</tr>
</table>

                     
                      
                       <!-- main table-->
                       </td>
                      
                      <td>
                      
                     <!-- main table-->
                      <table width="651" cellpadding="5" cellspacing="">
                     
          <tr>
            <td height="15" colspan="2" valign="top" class="red_text" align="left"><strong>Site Configuration </strong></td>
           <td height="15" colspan="2" valign="top" class="red_text" align="left"><strong>Members Approval</strong></td>
            </tr>
          <tr>
            <td height="15" valign="top"><img src="images/icon24.gif" width="19" height="16" /></td>
            <td height="15" valign="top"  align="left"><?php  if($_SESSION['site']=='Yes')
				  {?><a href="site_config.php" class="text" style="text-decoration:none;">Website Parameter Settings </a><?php } else { ?> <a href="#" class="text" style="text-decoration:none;">Website Parameter Settings </a><?php } ?></td>
			<td height="15" valign="top" ><img src="images/icom34.gif" width="16" height="16" /></td>
            <td height="15" valign="top"  align="left"><a href="approve_active.php" class="text" style="text-decoration:none;">Approve Inactive to Active </a></td>
           </tr>
          <tr>
		    <td height="15" valign="top"><img src="images/licon.jpg" width="22" height="22" /></td>
            <td height="15" valign="top"  align="left">
          <a href="new_logo.php" class="text" style="text-decoration:none;">LOGO Settings </a> 
            
			<?php /*?><?php  if($_SESSION['users']=='Yes') { ?><a href="sms_setting.php" class="text" style="text-decoration:none;">SMS Settings </a> <?php } else { ?> <a href="#" class="text" style="text-decoration:none;">SMS Settings </a><?php } ?><?php */?>
            </td>
            <td height="15" valign="top" ><img src="images/icom34.gif" width="16" height="16" /></td>
            <td height="15" valign="top"   align="left"><a href="approve_paid.php"  class="text" style="text-decoration:none;">Approve Active to Paid </a></td>
          </tr>
          <tr>
		   <td height="15" valign="top" ><img src="images/icon29.gif" width="19" height="16" /></td>
            <td height="15" valign="top"  align="left" ><a href="change_pass.php"  class="text" style="text-decoration:none;">Set Password </a></td>
            <td height="15" valign="top" ><img src="images/icom34.gif" width="16" height="16" /></td>
            <td height="15" valign="top"   align="left"><a href="approve_feature.php"  class="text" style="text-decoration:none;">Approve Paid to Featured </a></td>
          </tr>
           <tr>
            <td valign="top"><img src="images/members.gif" width="16" height="16" /></td>
          <td align="left"><?php  if($_SESSION['mship']=='Yes') { ?><a href="memship_plan.php" class="text" style="text-decoration:none;">Edit Membership Plans </a><?php } else { ?> <a href="#" class="text" style="text-decoration:none;">Edit Membership Plans</a><?php } ?></td>
          <td height="15" valign="top" ><img src="images/icom34.gif" width="16" height="16" /></td>
          <td height="15" valign="top"   align="left"><a href="approve_suspend.php"  class="text" style="text-decoration:none;">Suspend Member</a></td>
		  
			</tr>
              <tr>
           
		  <td valign="top"><img src="images/chat.jpeg" width="22" height="22" /></td>
          <td align="left"><a href="https://hosted.comm100.com/adminmanage/login.aspx" class="text" style="text-decoration:none;" target="_blank">Online Live Chat With Admin</a></td>
          <td valign="top"><img src="images/chat.jpeg" width="22" height="22" /></td>
          <td align="left" colspan=""><?php  if($_SESSION['mship']=='Yes') { ?><a href="chat.php" class="text" style="text-decoration:none;">Customer Chat Details</a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Customer Chat Details</a><?php } ?></td>
			</tr>
          
		            <tr>
                      <td style="border:none;" colspan="4">&nbsp;</td>
                     </tr>		 
					 
			 
          <tr>
            <td height="15" colspan="2" valign="top" class="red_text"><strong>Members Photo Approval </strong></td>
            <td colspan="2" valign="top" class="red_text"><strong>Success Story Approval </strong></td>
            </tr>
          <tr>
           <td width="5%" valign="top"><img src="images/icon22.gif" width="19" height="16" /></td>
            <td width="41%" valign="top"><a href="photo1.php" class="text" style="text-decoration:none;">Photo 1 Approval </a></td>
            <td width="5%" valign="top"><img src="images/icon16.gif" width="19" height="16" /></td>
            <td width="41%" valign="top"><a href="story.php" class="text" style="text-decoration:none;">UnApprove/Delete Successstory</a></td>
          </tr>
          <tr>
            <td width="5%" valign="top"><img src="images/icon22.gif" width="19" height="16" /></td>
            <td width="41%" valign="top"><a href="photo2.php" class="text" style="text-decoration:none;">Photo 2 Approval </a></td>
            <td valign="top"><img src="images/icon13.gif" width="19" height="16" /></td>
            <td valign="top"><a href="story.php" class="text" style="text-decoration:none;">Approve Successstory </a>
		</td>
          </tr>
          <tr>
           <td width="5%" valign="top"><img src="images/icon22.gif" width="19" height="16" /></td>
            <td width="41%" valign="top"><a href="photo3.php" class="text" style="text-decoration:none;">Photo 3 Approval </a></td>
               <td colspan="2" valign="top" class="red_text"><strong>Video Approval </strong></td>
          </tr>
		   <tr>
           <td width="5%" valign="top"><img src="images/icon22.gif" width="19" height="16" /></td>
            <td width="41%" valign="top"><a href="photo4.php" class="text" style="text-decoration:none;">Photo 4 Approval </a></td>
            <td valign="top"><img src="images/vedio.jpeg" width="22" height="22" /></td>
            <td valign="top"><a href="vedio.php" class="text" style="text-decoration:none;">Approve/UnApprove Video </a></td>
          </tr>
         <tr>
              <td style="border:none;" colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" valign="top" class="red_text"><strong>Horoscope Approval </strong></td>
            <td colspan="2" valign="top" class="red_text"><strong>Payment Details</strong></td>
            </tr>
          <tr>
            <td valign="top"><img src="images/hor.jpeg" width="20" height="20" /></td>
            <td valign="top"><a href="horscope.php" class="text" style="text-decoration:none;">Approve/UnApprove Horoscope </a></td>
            <td valign="top"><img src="images/pay.jpeg" width="22" height="22" /></td>
            <td valign="top"><?php  if($_SESSION['pay']=='Yes') { ?><a href="payment_option.php" class="text" style="text-decoration:none;">Payment Options </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Payment Options</a><?php } ?></td>
          </tr>
        
                   <tr>
                      <td style="border:none;" colspan="4">&nbsp;</td>
                     </tr>
         
                     
          <tr>
            <td colspan="2" valign="top" class="red_text"><strong>Members Status </strong></td>
            <td colspan="2" valign="top" class="red_text"><strong>Members Report </strong></td>
            </tr>
          <tr>
            <td valign="top"><img src="images/icon7.gif" width="19" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="member_status.php?status=Inactive" class="text" style="text-decoration:none;">InActive Members </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">InActive Members</a><?php } ?></td>
            <td valign="top"><img src="images/small_xlicon.gif" width="18" height="19" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="member_report.php" class="text" style="text-decoration:none;">Members Report in Excel File </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Members Report in Excel File</a><?php } ?></td>
          </tr>
          <tr>
            <td valign="top"><img src="images/icon5.gif" width="19" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="member_status.php?status=Active" class="text" style="text-decoration:none;">Active Members  </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Active Members</a><?php } ?></td>
            <td valign="top"><img src="images/small_xlicon.gif" width="18" height="19" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="import_member.php" class="text" style="text-decoration:none;">Import Members By Excel File</a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Import Members By Excel File</a><?php } ?></td>
          </tr>
          <tr>
            <td valign="top"><img src="images/icon8.gif" width="19" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="member_status.php?status=Paid" class="text" style="text-decoration:none;">Paid Members </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Paid Members </a><?php } ?></td>
			<td valign="top"><img src="images/icon28.gif" width="19" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="sales_report.php" class="text" style="text-decoration:none;">Sales Reports </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Sales Reports</a><?php } ?></td>
          </tr>
          <tr>
            <td valign="top"><img src="images/icom34.gif" width="19" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="member_feature.php" class="text" style="text-decoration:none;">Featured Members </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Featured Members </a><?php } ?></td>
			<td valign="top"><img src="images/icon21.gif" width="19" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="email_member.php" class="text" style="text-decoration:none;">Send Emails to Members </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Send Emails to Members</a><?php } ?></td>
          </tr>
          <tr>
            <td valign="top"><img src="images/icon10.gif" width="16" height="16" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="member.php" class="text" style="text-decoration:none;">View All Members  </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">View All Members </a><?php } ?></td>
            <td valign="top"><img src="images/contact-us.gif" width="21" height="20" /></td>
            <td valign="top"><?php  if($_SESSION['member']=='Yes') { ?><a href="group_email.php" class="text" style="text-decoration:none;">Send Group Mails </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Send Group Mails</a><?php } ?></td>
          </tr>
           <tr>
           <td style="border:none;" colspan="4">&nbsp;</td>
          </tr>
          
          <tr> 
           <td colspan="4" valign="top" align="left" class="red_text"><strong>Renewal Of Membership </strong></td>
          </tr>
          <tr>
           <td valign="top"><img src="images/checkmark.gif" width="20" height="18" /></td>
           <td align="left"><?php  if($_SESSION['member']=='Yes') { ?><a href="renew_member.php" class="text" style="text-decoration:none;">Renew Membership Expired</a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Renew Membership Expired</a><?php } ?></td>
           <td height="15" valign="top" ><img src="images/icom34.gif" width="16" height="16" /></td>
           <td height="15" valign="top"   align="left"><?php  if($_SESSION['member']=='Yes') { ?><a href="comming_renewal.php"  class="text" style="text-decoration:none;">Coming Renewal </a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Coming Renewal</a><?php } ?></td>
            </tr>
          <tr>
           <td style="border:none;" colspan="4">&nbsp;</td>
          </tr>
          
          <tr> 
           <td colspan="4" valign="top" align="left" class="red_text"><strong>Database </strong></td>
          </tr>
          <tr>
            <!--<td valign="top"><img src="images/icon12.gif" width="19" height="16" /></td>
            <td valign="top" align="left">&nbsp;</td>-->
               <td valign="top"><img src="images/icon12.gif" width="19" height="16" /></td>
            <td valign="top" align="left"><a href="dbbackup.php" class="text" style="text-decoration:none;">Database BackUp</a></td>
            </tr>
			
		            <tr>
                      <td style="border:none;" colspan="4">&nbsp;</td>
                     </tr>		 
					 
			 
          <tr> 
           <td colspan="4" valign="top" align="left" class="red_text"><strong>Add New Details </strong></td>
          </tr>
          <tr>
            <td valign="top"><img src="images/ad.jpeg" width="25" height="25" /></td>
            <td valign="top" align="left"><a href="advertisement.php" class="text" style="text-decoration:none;">Advertisement</a><!--<?php  if($_SESSION['adv']=='Yes') { ?><a href="advertisement.php" class="text" style="text-decoration:none;">Advertisement</a><?php } else { ?><a href="#" class="text" style="text-decoration:none;">Advertisement</a><?php } ?>--></td>
               <td valign="top"><img src="images/wedding.jpeg" width="22" height="22" /></td>
            <td valign="top" align="left"><?php  if($_SESSION['wp']=='Yes') { ?><a href="wplanner.php" class="text" style="text-decoration:none;">Wedding Planners</a><?php } else { ?><a href="wplanner.php" class="text" style="text-decoration:none;">Wedding Planners</a><?php } ?></td>
            </tr>
			<tr>
            <td valign="top"><img src="images/icon3.gif" width="19" height="16" /></td>
            <td valign="top" align="left"><a href="story.php" class="text" style="text-decoration:none;">Success Story </a></td>
               <td valign="top"><img src="images/icon6.gif" width="19" height="16" /></td>
            <td valign="top" align="left"><a href="admin_user.php" class="text" style="text-decoration:none;">Franchiese / Staff Users</a></td>
            </tr>
         </table>
           <!-- main table-->
        </td>
        </tr>
       </table>
           	  
                 </td>
            </tr>
            <tr>
            	<td style="border:none;">&nbsp;</td>
          </tr>
        </table>
        </div>
        <div id="footer">
        	<?php include('footer.php'); ?>
        </div>
    </div>
 </center>
</body>
</html>
