<?php
  /*
   *  Printed code here is Javascript code 
   *  evaluated in real time with eval().
   *
   *  date("t",mktime(0,0,0,$month,1,$year) returns
   *  the number of days for a given month and year
   *
   */

    // Drop existing items
  print 'document.getElementById("theday").options.length=0;';

  if( isset($_GET["y"]) )   $year=$_GET["y"]+0;
  if( isset($_GET["m"]) )   $month=$_GET["m"]+0;

  if( isset($year)  && strlen($year)==4 && 
      isset($month) && $month>=1 && $month<=12 )
  {
         // Get the max number of days for this month and year
       $max_days = date("t",mktime(0,0,0,$month,1,$year));
       $index=0;
       for($d=1;$d<=$max_days;$d++)
	       print 'document.getElementById("theday").options['.
                 $index++.'] = new Option("'.$d.'","'.$d.'");'; 
  }
  else
       print 'document.getElementById("theday").options[0]'.
             ' = new Option("Date",0);';
?>