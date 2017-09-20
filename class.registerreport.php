<?php
	class registerreport
	{
		public function add_wp($wp_name,$wp_desc,$wp_contact,$wp_mobile,$wp_email,$wp_rate_from,$wp_rate_to,$status)
		{
			$sql="insert into wedding_planner(wp_name,wp_desc,wp_contact,wp_mobile,wp_email,wp_rate_from,wp_rate_to,status) values('$wp_name','$wp_desc','$wp_contact','$wp_mobile','$wp_email','$wp_rate_from','$wp_rate_to','$status')";
			mysql_query($sql) or mysql_error();
		}
		
		public function update_wp($wp_id,$wp_name,$wp_desc,$wp_contact,$wp_mobile,$wp_email,$wp_rate_from,$wp_rate_to,$status)
		{
			$sql="update wedding_planner set wp_name='$wp_name',wp_desc='$wp_desc',wp_desc='$wp_desc',wp_contact='$wp_contact',wp_mobile='$wp_mobile',wp_email='$wp_email',wp_rate_from='$wp_rate_from',wp_rate_to='$wp_rate_to',status='$status' where wp_id='$wp_id'";
			mysql_query($sql) or mysql_error();
		}
		
		public function change_status($wp_id,$status)
		{
			$sql="update wedding_planner set status='$status' where wp_id='$wp_id'";
			mysql_query($sql) or mysql_error();
		}
		
		public function get_wp_by_id($wp_id)
		{
			$sql="select * from wedding_planner where wp_id='$wp_id'";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
	
		
		public function get_wp_by_status($status)
		{
			$sql="select * from wedding_planner where status='$status'";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
		public function get_wp($condition="")
		{
			$sql="select * from wedding_planner ".$condition."order by wp_id";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
		public function del_wp($wp_id)
		{
			$sql="delete from wedding_planner where wp_id='$wp_id'";
			mysql_query($sql) or mysql_error();			
		}		
	}
?>