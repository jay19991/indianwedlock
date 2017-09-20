<?php
$q=$_GET["q"];

include("../connect/report.php");
include("secure.php");

$sql="SELECT * FROM register WHERE matri_id = '".$q."' and gender='Female'";

$result = mysql_query($sql);


if(mysql_num_rows($result)==0)
{
	echo "";
}
else
{
	$fname=mysql_result($result,0,"firstname");
	$lname=mysql_result($result,0,"lastname");
	$fullname=$fname." ".$lname;
	echo $fullname;
}


mysql_close($con);
?> 