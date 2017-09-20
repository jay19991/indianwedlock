<?php
	include("../connect/config2.php");
	include("secure.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Matrimonial Script - Admin Panel ::</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

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
               <span class="red_text">Database CheckUp</span>
                </td>
            </tr>
			  <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
			
            <tr>
            	<td style="border:none;">      
			<?php
if ($_SERVER['REQUEST_METHOD'] == "POST")
  { 

		$strquery = $_POST['txtquery'];
        $SQL = "($strquery)";
        $result = mysql_query($SQL);
        if (!$result) { echo("ERROR: " . mysql_error() . "\n$SQL\n");    }
        echo ("<P><B>New Link Added</B></P>\n");
 }
?>
				<form id="form1" name="form1" method="post" action="sqldb_result.php">
                <table style="border:solid 5px #7e0000;" width="900px" border="0" cellspacing="10" cellpadding="0">
                  <tr>
                    <td style="border:none;" class="text">TYPE YOUR MYSQL QUERY: </td>
                  </tr>
                  <tr>
                    <td style="border:none;"><textarea name="txtquery" cols="90" rows="10" id="txtquery"></textarea></td>
                  </tr>
                 <tr>
                       
                        <td style="border:none;"><input type="image" name="submit" src="images/btn_submit.gif" value="submit" /><input type="hidden" name="submit" value="submit" /><img src="images/btn_cancel.gif" onclick="window.location='main.php'" /></td>
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
