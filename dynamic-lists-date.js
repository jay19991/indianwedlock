 /*
  *  Retrieve data using the XMLHttpRequest object
  *
  */
function ajax_call_server(url, vars)
{
 var xml = null;
 try
 {
     xml = new ActiveXObject("Microsoft.XMLHTTP");
 }
 catch(exception)
 {
     xml = new XMLHttpRequest();
 }

 if(xml!=null)
 {
     xml.open("GET",url + vars, false);
     xml.send(null);
     if(xml.status == 404) alert("Error 404: Incorrect url.");
     return xml.responseText;
 }
 alert("Your browser does not support XMLHTTP.");
 return "";
}


 /*
  *  AJAX dynamic javascript "eval()" function usage to fill
  *  the options of a SELECT list.
  *
  */
function get_days_of_month()
{
 var year = document.getElementById("theyear").value;
 var month = document.getElementById("themonth").value;
 var response = ajax_call_server( "calculate-days.php",
                                  "?y="+year+"&m="+month);
 eval(response);
}