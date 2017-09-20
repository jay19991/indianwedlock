<?php
session_start();
include('../connect/config2.php');
require_once('../BusinessLogic/class.register.php');
include("secure.php");
if(isset($_POST['submit']))
{

		$firstname=$_POST['fname'];	 
		$lastname=$_POST['lname'];		 
		$gender=$_POST['gender'];	
		
		$theyear=$_POST['theyear'];
		$themonth=$_POST['themonth'];
		$theday=$_POST['theday'];	
	    $birthdate=$theyear."-".$themonth."-".$theday; 	
		
		$m_status=$_POST['m_status'];	 
		$tot_children=$_POST['tot_children'];	 
		$status_children=$_POST['status_children'];	 
		$m_tongue=$_POST['mtongue'];	 
		$religion=$_POST['religion_id'];	 
		$caste=$_POST['caste_id'];	 
		/*$subcaste=$_POST['subcaste'];	 
		$profileby=$_POST['profileby'];	 
		$reference=$_POST['reference'];	 */	
		$email=$_POST['email'];	 
		$password=md5($_POST['password']);	 	
		/*$gothra=$_POST['gothra'];	 
		$star=$_POST['star'];	 
		$moonsign=$_POST['moonsign'];	 
		$horoscope=$_POST['horoscope'];	 
		$manglik=$_POST['manglik'];	 
		$birthplace=$_POST['birthplace'];	 
		$birthtime=$_POST['birthtime'];*/	 
		$terms=$_POST['terms'];	
		$education=$_POST['education'];	 
		$edu_detail=$_POST['edu_detail'];	 
		/*$income=$_POST['txtIncome'];*/		 
		$occupation=$_POST['occupation'];	 
		$emp_in=$_POST['emp_in'];		 
		$weight=$_POST['weight'];		 
		$height=$_POST['height'];		 
		$b_group=$_POST['b_group'];		 
		$complexion=$_POST['complexion'];		 
		/*$bodytype=$_POST['bodytype'];		 
		$diet=$_POST['diet'];			 
		$smoke=$_POST['smoke'];		 
		$drink=$_POST['drink'];	*/	 
		$address=$_POST['address'];		 
		$country=$_POST['country_id'];		 
		$state=$_POST['state_id'];		 
		$city=$_POST['city_id'];	
		$locality=$_POST['loc_id'];
		
		$txtCC=$_POST['txtCC'];
		$txtAC=$_POST['txtAC'];
		$phone=$_POST['phone'];
		$phone=$txtCC."-".$txtAC."-".$phone;
				 
			 
		$mobile=$_POST['mobile'];		 
		$residence=$_POST['res'];
		
		$profile_text=$_POST['txtmsg'];		 
		/*$family_details=$_POST['txtFD'];	  
		$family_value=$_POST['family_value'];	  
		$family_type=$_POST['family_type'];	  
		$family_status=$_POST['family_status'];	  
		$family_origin=$_POST['family_origin'];	  	 
		$no_of_brothers=$_POST['no_of_brothers'];	  
		$no_marri_brother=$_POST['nbm'];	  
		$no_of_sisters=$_POST['no_of_sister'];	  
		$no_marri_sister=$_POST['nsm'];	  
		$father_living_status=$_POST['falive'];	  
		$father_name=$_POST['fathername'];	  
		$father_occupation=$_POST['father_occupation'];	  
		$mother_living_status=$_POST['malive'];	  
		$mother_name=$_POST['mother_name'];	  
		$mother_occupation=$_POST['mother_occupation'];	*/  
		$looking_for= $_POST['looking_for'];	  
		/*$part_frm_age=$_POST['Fromage'];	  
		$part_to_age=$_POST['Toage'];	  
		$part_edu=$_POST['txtPEdu'];
		$part_expect=$_POST['txtPPE'];//remina	*/  
		$part_country_living=$_POST['part_country_living'];	  
		/*$part_height=$_POST['height'];	  
		$part_complexation=$_POST['txtPComplexion'];*/	  	 	  	 
		$part_religion=$_POST['religion_id'];	  
		$part_caste=$_POST['caste_id'];	
		$adminrole_id=$_POST['adminrole_id'];
		$adminrole_view_status=$_POST['adminrole_view_status'];
		
$status='Inactive';

$tm=mktime(date('h')+5,date('i')+30,date('s'));
$rdt=date('Y-m-d h:i:s',$tm);

$ip=$_SERVER['REMOTE_ADDR']; 
$status='Inactive';  

/*$part_resi_status=$_POST['txtPReS'];	  
$hobby=$_POST['hobby'];	  
$interest=$_POST['interest'];	

$tm=mktime(date('h')+5,date('i')+30,date('s'));
$reg_date=date('Y-m-d h:i:s',$tm);
			
$ip=$_SERVER['REMOTE_ADDR'];                
//$ref=$_SERVER['HTTP_REFERER'];
$agent=$_SERVER['HTTP_USER_AGENT'];  

$order_status = "No";
$photo_protect = "No";
$hor_check = "No";

$photo_chk_list = "No";     
$video_chk_list = "No"; 
$video_chk_list = "No"; 
*/
$s="select * from register";
$rr=mysql_query($s);
$dd=mysql_fetch_array($rr);

$p=$dd['prefix'];
// check if the username is taken
$check = "select email from register where email = '".$_POST['email']."';"; 
$qry = mysql_query($check) or die ("Could not match data because ".mysql_error());
$num_rows = mysql_num_rows($qry); 
if ($num_rows != 0) 
{ 
	echo "<script>alert('Email Already Exists.')</script>";
	echo "<script>window.location='add_member.php'</script>";
} 
else 
{

			$sql2="select * from admin_role where role_name='". $_SESSION['role'] ."'";
			$res2=mysql_query($sql2);
			$rr=mysql_fetch_array($res2);
			
			 $rid=$rr['role_id']; 


 $sql="insert into register(prefix, terms,email,password,m_status,profileby,firstname,lastname,gender,birthdate,tot_children,status_children,education,edu_detail,occupation,emp_in,religion,caste,m_tongue,height,weight,b_group,complexion,address,country_id,state_id,city,phone,mobile,residence,profile_text,looking_for,part_country_living,part_religion,part_caste,adminrole_id,adminrole_view_status,status,reg_date,ip)
 values
('$p','$terms','$email','$password','$m_status','$profileby','$firstname','$lastname','$gender','$birthdate','$tot_children','$status_children','$education','$edu_detail','$occupation','$emp_in','$religion','$caste','$m_tongue','$height','$weight','$b_group','$complexion','$address','$country','$state','$city','$phone','$mobile','$residence','$profile_text','$looking_for','$part_country_living','$part_religion','$part_caste','$rid','Yes','Inactive','$rdt','$ip')";

$result=mysql_query($sql) or mysql_error();
/*$pid=mysql_insert_id($result);
echo $idd=$prefix+$pid;

echo $ins1="update register set matri_id='$idd' where index_id='$pid'";
mysql_query($ins1) or die(mysql_error());*/

print "<script>";
print " self.location='add_member_confirm.php?email=$email';"; 
print "</script>";

/*echo "<script>window.location='member.php'</script>"; */

}

}
?>
