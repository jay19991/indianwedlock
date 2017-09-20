<?php /*?><!--For Admin-->

<?php
	$con=mysql_connect("localhost","root","") or die("not connected.");
	mysql_select_db("matrimony",$con) or die("database not found.");
	error_reporting(E_NOTICE ^ E_WARNING ^ E_ALL);
	session_start();

require_once("../BusinessLogic/class.config.php");
	
	$id='1';
	$ob=new siteconfig();
	$result=$ob->get_site_by_id($id);	
	$info=mysql_fetch_array($result);	

?>

<script src="js/jquery.js" type="text/javascript"></script><?php */?>

<!--For Admin-->
<script src="js/jquery.js" type="text/javascript"></script>
<?php
	$con=mysql_connect("mysql917.ixwebhosting.com","C278619_matphp","Rashid154n") or die("not connected.");
	mysql_select_db("C278619_matphp",$con) or die("database not found.");
	error_reporting(E_NOTICE ^ E_WARNING ^ E_ALL);
	session_start();

require_once("../BusinessLogic/class.config.php");
	
	$id='1';
	$ob=new siteconfig();
	$result=$ob->get_site_by_id($id);	
	$info=mysql_fetch_array($result);
	
$host = 'mysql917.ixwebhosting.com'; // MYSQL database host adress
$db = 'C278619_matphp'; // MYSQL database name
$user = 'C278619_matphp'; // Mysql Datbase user
$pass = 'Rashid154n'; // Mysql Datbase password 	

?>




