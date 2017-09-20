<?php
	class plan
	{
		
		/*public function get_plans($condition)
		{
			$sql="select * from payments ".$condition." order by pmatri_id";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}*/
		
		/*public function get_countries()
		{
			$sql="select * from payments";
			$result=mysql_query($sql) or mysql_error();
			return $result;
		}*/
		
		
		
		public function get_countries($condition)
		{
			$sql1="select * from payments ".$condition." order by pmatri_id";
		
			$result=mysql_query($sql1) or mysql_error();
			return $result;
		}
			
	}
?>