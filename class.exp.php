<?php
	class expdata
	{
		public function add_exp($religion_id,$caste_name,$status)
		{
			$sql="insert into caste(religion_id,caste_name,status) values('$religion_id','$caste_name','$status')";
			mysql_query($sql) or mysql_error();
		}
		
		public function update_caste($religion_id,$caste_id,$caste_name,$status)
		{
			$sql="update caste set religion_id='$religion_id',caste_name='$caste_name',status='$status' where caste_id='$caste_id'";
			mysql_query($sql) or mysql_error();
		}
		
		public function change_status($caste_id,$status)
		{
			$sql="update caste set status='$status' where caste_id='$caste_id'";
			mysql_query($sql) or mysql_error();
		}
		
		public function get_caste_by_id($caste_id)
		{
			$sql="select * from caste where caste_id='$caste_id'";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
		public function get_caste_religion_id($religion_id)
		{
			$sql="select * from caste where religion_id='$religion_id'";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
		public function get_caste_by_status($status)
		{
			$sql="select * from caste where status='$status'";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
		public function get_castes($condition)
		{
			$sql="select c.*,r.religion_name from caste c inner join religion r using(religion_id) ".$condition."order by caste_id";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}
		
		public function del_caste($caste_id)
		{
			$sql="delete from caste where caste_id='$caste_id'";
			mysql_query($sql) or mysql_error();			
		}
		
		public function get_caste()
		{
			$sql="select * from caste order by caste_id ASC LIMIT 0,20";
			$result=mysql_query($sql) or mysql_error();	
			return $result;
		}
				
	}
?>