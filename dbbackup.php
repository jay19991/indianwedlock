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
               <span class="red_text">Database BackUp</span>
                </td>
            </tr>
			  <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
			   <tr>
                    <td style="border:none;"><a href="exampleScript.php" class="green_text" style="text-decoration:none;">Take Full Backup OF Database Now</a></td>
              </tr>
             <tr>
            <td style="border:none;">&nbsp;</td>
            </tr>
             <tr>
            <td style="border:none;"> <a href="main.php" class="text2">Go Back</a></td>
            </tr>
           
          </table>
		
        </div>
        <div id="footer" style="margin-top:280px;">
        	<?php include('footer.php'); ?>
        </div>
    </div>
 </center>
</body>
</html>
<?php 
backup_tables('localhost','root','','matrimony');
/* backup the db OR just a table */ 
include("../connect/config2.php");
include("secure.php");

function backup_tables($host,$user,$pass,$name,$tables = '*') 
{ 
$link = mysql_connect($host,$user,$pass);
 mysql_select_db($name,$link);

//get all of the tables 
		if($tables == '*') 
			{ 
		 $tables = array();
		$result = mysql_query('SHOW TABLES');
		 while($row = mysql_fetch_row($result)) 
			{ 
			$tables[] = $row[0];
				 }
			 }

		else 
		 { 
 			$tables = is_array($tables) ? $tables : 
			explode(',',$tables);
		 } 

//cycle through 

		 foreach($tables as $table) 
		 { 
 		$result = mysql_query('SELECT * FROM '.$table);
		 $num_fields = mysql_num_fields($result);

 		$return.= 'DROP TABLE '.$table.';';
 		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));

		$return.= "\n\n".$row2[1].";\n\n";

			for ($i = 0; $i < $row = mysql_fetch_row($result); $i++) 
 			{ 
 			$return.= 'INSERT INTO '.$table.' VALUES(';
			 for($j=0; $j<$num_fields; $j++) 
				{ 
				 $row[$j] = addslashes($row[$j]);
 					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
 				if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; } 
 				if ($j<($num_fields-1)) { $return.= ','; } 
				 } 
			 $return.= ");\n";
			
 			} 
		 } 
 	//$return.="\n\n\n";
//} 

//save file 
 $now = date("F j, Y");
 $myfoldername = 'backup/';
$handle = fopen($myfoldername.$now.'.sql','w+');
//$handle = fopen(getcwd().$myfoldername.'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
 fwrite($handle,$return);
 
fclose($handle);

//$filename = 'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
//Header("Content-type: application/octet-stream");
//Header("Content-Disposition: attachment; filename=$filename");
//echo $return;
}
?>
