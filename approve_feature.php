<?php
include("../BusinessLogic/class.register.php");
include("../connect/config2.php");
include("secure.php");	
$rel=new register();

$msg = "";
session_start();


//$result = mysql_query("SELECT * FROM register where status != 'Inactive' and status != 'Active' and fstatus != 'Featured' and status != 'Suspend'"); 

// By saumil
$result = mysql_query("SELECT * FROM register where status != 'Inactive' and status != 'Active' and fstatus IS NULL and status != 'Suspend'"); 



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
		if(kword.value=='Search By Religion')
		{
			alert("Please Enter Keyword.");
			kword.focus();
			return false;
		}
		return true;
	}
</script>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function goSend() 
{ 
    var recslen =  document.forms[0].length; 
    var checkboxes="" 
    for(i=1;i<recslen;i++) 
    { 
        if(document.forms[0].elements[i].checked==true) 
        checkboxes+= " " + document.forms[0].elements[i].name 
    } 
    
    if(checkboxes.length>0) 
    { 
        var con=confirm("Are you sure you want to Select this Matri Id"); 
        if(con) 
        { 
            document.forms[0].action="approve_feature_sms.php?recsno="+checkboxes 
            document.forms[0].submit() 
        } 
    } 
    else 
    { 
        alert("No record is selected.") 
    } 
} 

function selectall() 
{ 
 var recslen = document.forms[0].length; 
        
        if(document.forms[0].topcheckbox.checked==true) 
            { 
                for(i=1;i<recslen;i++) { 
                document.forms[0].elements[i].checked=true; 
                } 
    } 
    else 
    { 
        for(i=1;i<recslen;i++) 
        document.forms[0].elements[i].checked=false; 
    } 
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
					<td align="left" style="border:none;width:50%;" class="red_text">Approve Paid to Featured Member</td>        
                  <td align="right" style="border:none;" width="50%">&nbsp;
				  
				
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


<?php
	if($tcount!=0)
	{
 ?>
		<form name="form1" method="post" action=""> 
            <tr>
            	<td style="border:none;">       
                     <table style="border:solid 5px #7e0000;" width="990px" align="center" cellspacing="5">
                        <tr bgcolor="#CCCCCC" style="color:#7e0000;" class="text">
                            <td><b>Check&nbsp;All</b><input name="topcheckbox" type="checkbox" class="check" id="topcheckbox" onclick="selectall();" value="ON" />
                   </td>
                            <td height="40px" width="97">
                                <span style="font-size:13px; padding-left:5px;">MatriId</span>                            </td>
							<td height="40px" width="141">
                                <span style="font-size:13px; padding-left:5px;">FirstName</span>                            </td>
							<td height="40px" width="141">
                                <span style="font-size:13px; padding-left:5px;">LastName</span>                            </td>
							<td height="40px" width="141">
                                <span style="font-size:13px; padding-left:5px;">Email</span>                            </td>
							<td height="40px" width="141">
                                <span style="font-size:13px; padding-left:5px;">Gender</span>                            </td>
						    <td height="40px" width="141">
                                <span style="font-size:13px; padding-left:5px;">RegisterDate</span>                            </td>
							<td height="40px" width="141">
                                <span style="font-size:13px; padding-left:5px;">Status</span>                            </td>
                           
                        </tr>
					   <?php					   
                            while(($count<$rpp) && ($i<$tcount)) 
							{
                             mysql_data_seek($result,$i);
                             $row = mysql_fetch_array($result);
                         ?>
                        <tr>
                          <td align="center" width="121"><input name="<?php echo $row['index_id']; ?>" type="checkbox" class="check" /></td>
                            <td class="text"><?php echo $row['matri_id']; ?></td>
							<td class="text"><?php echo $row['firstname']; ?></td>
							<td class="text"><?php echo $row['lastname']; ?></td>
							<td class="text"><?php echo $row['email']; ?></td>
							<td class="text"><?php echo $row['gender']; ?></td>
							<td class="text"><?php echo $row['reg_date']; ?></td>
							<td class="text"><?php echo $row['status']; ?></td>
                            
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
            	<td style="border:none;" align="left">
                <table width="1000px" align="center">
                    <tr>
					<td width="120" bgcolor="#999966" ><a href="javascript:goSend()" style="color:#FFFFFF; font-size:14px;text-decoration:none; font-weight:bold;">Approve As Featured Member</a></td>
                       
						
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
