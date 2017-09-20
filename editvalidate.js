function validate()
{
		var MatriForm = this.document.MatriForm;
		
		
		if (MatriForm.firstname.value=="")
		{
			alert("Please Enter First name.");
			MatriForm.firstname.focus();
			return false;
		}
		
		if(MatriForm.firstname.value.length>0)			 
		{
			var reg_fname=/^([a-zA-Z]+\s){0,4}[a-zA-Z]+$/;				
			if(!reg_fname.test(MatriForm.firstname.value))
			{
			alert("Please Enter Valid First Name");
			MatriForm.firstname.focus();
			return false;
			}
		}
		if (MatriForm.lastname.value == "")
		{
			alert( "Please Enter Lastname.");
			MatriForm.lastname.focus( );
			return false;
		}
		if(MatriForm.lastname.value.length>0)			 
		{
			var reg_last=/^([a-zA-Z]+\s){0,4}[a-zA-Z]+$/;				
			if(!reg_last.test(MatriForm.lastname.value))
			{
			alert("Please Enter Valid Last Name");
			MatriForm.lastname.focus();
			return false;
			}
		}
		
		 /*if (document.MatriForm.theyear.options[document.MatriForm.theyear.selectedIndex].text=="-Year-")	
		{
				  	alert("Select Year");
					MatriForm.theyear.focus();
					return false;
		}*/
		
		/*if (document.MatriForm.themonth.options[document.MatriForm.themonth.selectedIndex].text=="-Month-")	
		{
				  	alert("Select Month");
					MatriForm.themonth.focus();
					return false;
		}
		if (document.MatriForm.theday.selectedIndex=="-Date-")		
		{
				  	alert("Select Day");
					MatriForm.theday.focus();
					return false;
		}
		
		if ( !MatriForm.m_status[0].checked && !MatriForm.m_status[1].checked && !MatriForm.m_status[2].checked && !MatriForm.m_status[3].checked)
		{
			alert( "Please Select the Marital Status." );
			MatriForm.m_status[0].focus();
			return false;
		}
		*/
		var widow=document.getElementById('widow').checked;
		var divorcee=document.getElementById('divorcee').checked;
		var separated=document.getElementById('separated').checked;
		
		
		if((widow==true) || (divorcee==true) || (separated==true))
		{
			if(document.getElementById('tot_children').selectedIndex==0)
			{
			alert("Please Indicate  Number Of Children");
			document.getElementById('tot_children').focus();
			return false;
			}
		}
		
		
		
if(document.getElementById('tot_children').selectedIndex>1)
		{
			var a=document.getElementById('living').checked;			
			var b=document.getElementById('not_living').checked;
			if((a==false)&&(b==false))
			{
			alert("Please Indicate Whether Child /Children is/are living with you.");
			document.getElementById('living').focus();
			return false;
			}
		
		}
		

		if ( MatriForm.m_tongue.selectedIndex == 0 )
		{
			alert( "Please Select your mothertongue." );	
			MatriForm.m_tongue.focus();
			return false;
		}
		
		// Check Religion
		if ( MatriForm.religion_id.selectedIndex == 0 )
		{
			alert( "Please Select your Religion." );	
			MatriForm.religion_id.focus();
			return false;
		}
		

		if ( MatriForm.caste.selectedIndex == 0 )
		{
			alert( "Please Select your Caste." );	
			MatriForm.caste.focus();
			return false;
		}
		
	

		if( MatriForm.email.value == "" )
		{
			alert( "Please Enter E-mail ID." );
			MatriForm.email.focus();
			return false;
		}
		if( MatriForm.email.value.length>0)
		{
			var expression=/^([a-zA-Z0-9\-\._]+)@(([a-zA-Z0-9\-_]+\.)+)([a-z]{2,5})$/;
			if (!expression.test(document.MatriForm.email.value))
			{
      		alert("Please Enter Invalid Email-Id");
      		document.MatriForm.email.focus();
      		return false;
 			}
		}
		
		
	// Check Education
		if ( MatriForm.education.selectedIndex == 0 )
		{
			alert( "Please Select Education." );	
			MatriForm.education.focus();
			return false;
		}
		
		 //Check Edu details
		if ( MatriForm.edu_detail.selectedIndex == 0 )
		{
			alert( "Please Select Education Details" );	
			MatriForm.edu_detail.focus( );
			return false;
		}
		
		
		// Check Occupation
		if ( MatriForm.occupation.value == "" )
		{
			alert( "Please Select Occupation." );	
			MatriForm.occupation.focus( );
			return false;
		}
		
		// Check Employed in
		if ( MatriForm.emp_in.selectedIndex == 0 )
		{
			alert( "Please Select Employed In Status." );	
			MatriForm.emp_in.focus( );
			return false;
		}
		
		 //Check Weight
		if ( MatriForm.weight.selectedIndex == 0 )
		{
			alert( "Please Select Weight." );	
			MatriForm.weight.focus( );
			return false;
		}
		
		 //Check Height
		if ( MatriForm.height.selectedIndex == 0 )
		{
			alert( "Please Select Height." );	
			MatriForm.height.focus( );
			return false;
		}
		
		
		
		
		// Check Blood Group
		if ( MatriForm.b_group.selectedIndex == 0 )
		{
			alert( "Please Select Blood Group." );	
			MatriForm.b_group.focus( );
			return false;
		}
	
		
		
		// Check Complexion
		if ( MatriForm.complexion.selectedIndex == 0 )
		{
			alert( "Please Select Complexion." );	
			MatriForm.complexion.focus( );
			return false;
		}
		
		
		 //Check Address 
		if ( MatriForm.address.value == "" )
		{
			alert( "Please Enter Address." );
			MatriForm.address.focus( );
			return false;
		}
	
	   if ( MatriForm.country_id.selectedIndex == 0 )
		{
			alert( "Please Select Country" );	
			MatriForm.country_id.focus( );
			return false;
		}
		
		if ( MatriForm.state_id.selectedIndex == 0 )
		{
			alert( "Please Select State" );	
			MatriForm.state_id.focus( );
			return false;
		}
		
		if ( MatriForm.city_id.selectedIndex == 0 )
		{
			alert( "Please Select City" );	
			MatriForm.city_id.focus();
			return false;
		}
	
		var cc=document.getElementById('txtCC').value;
		var ac=document.getElementById('txtAC').value;
		var phone=document.getElementById('phone').value;
		if((cc.length==0)||(ac.length==0)||(phone.length==0))
		{
			alert( "Please Enter Valid Phone Number");	
			document.getElementById('txtCC').focus();
			return false;
		}
		if((cc.length>0)&&(ac.length>0)&&(phone.length>0))
		{
			if((cc.length<2)||(cc.length>3))
			{
			alert( "Please Check Country Code. Minimum 2 And Maximum 3 Allow");	
			document.getElementById('txtCC').focus();
			return false;
			}
			if((cc.length>2)||(cc.length<3))
			{
				var h=/[^0-9\+]/;
				if(cc.match(h)!=null)
				{
				alert( "Please Enter Valid Country Code");	
				document.getElementById('txtCC').focus();
				return false;
				}
			}
			
			if((ac.length<2)||(ac.length>5))
			{
			alert( "Please Check Area Code. Minimum 2 And Maximum 5 Allow");	
			document.getElementById('txtAC').focus();
			return false;
			}
			if((ac.length>2)||(ac.length<5))
			{
				var h1=/[^0-9]/;
				if(ac.match(h1)!=null)
				{
				alert( "Please Enter Valid Area Code");	
				document.getElementById('txtAC').focus();
				return false;
				}
			}
			if((phone.length<8)||(phone.length>11))
			{
			alert( "Please Check Phone Number. Minimum 8 And Maximum 11 Allow");	
			document.getElementById('phone').focus();
			return false;
			}
			if((phone.length>8)||(phone.length<11))
			{
				var h2=/[^0-9]/;
				if(phone.match(h2)!=null)
				{
				alert( "Please Enter Valid Phone Number");	
				document.getElementById('phone').focus();
				return false;
				}
			}
			
		}
		var g=document.getElementById('mobile').value;
		if(g.length>0)
		{
		  if((g.length<10)||(g.length>13))
		  {
		   	alert( "Please Check Mobile Number. Minimum 10 And Maximum 13 Allow");	
			document.getElementById('mobile').focus();
			return false;		
		  }
		  else
		  {
		  	var h3=/[^0-9]/;
			if(g.match(h3)!=null)
			{
			alert( "Please Enter Valid Mobile Number");	
			document.getElementById('mobile').focus();
			return false;
			}
		  }		  
		}
if ( MatriForm.profile_text.value == "" )
		{
			alert( "Please Enter Profile." );
			MatriForm.profile_text.focus( );
			return false;
		}


     if ( MatriForm.profile_text.value.length < 50 )
		{
			alert( "Profile must be atleast 50 characters." );	
			MatriForm.profile_text.focus( );
			return false;
		}
		
		// Profile Max Chars
		if ( MatriForm.profile_text.value.length > 1000 )
		{
			alert( "Please do not enter more than 1000 characters." );	
			MatriForm.profile_text.focus( );
			return false;
		}

  
   if ( !MatriForm.looking_for[0].checked && !MatriForm.looking_for[1].checked && !MatriForm.looking_for[2].checked && !MatriForm.looking_for[3].checked)
		{
			alert( "Please Select the Looking for." );
			MatriForm.looking_for[0].focus( );
			return false;
		}
		
		
		if ( MatriForm.part_country_living.selectedIndex == 0 )
		{
			alert( "Please Select Country living of Your Partner.");	
			MatriForm.part_country_living.focus();
			return false;
		}
		
		// Check Religion
		if ( MatriForm.religion_id1.selectedIndex == 0)
		{
			alert( "Please Select Religion Of Your Partner.");	
			MatriForm.religion_id1.focus( );
			return false;
		}
		
		// Check Caste
		if ( MatriForm.caste_id1.selectedIndex == 0 )
		{
			alert( "Please Select Caste." );	
			MatriForm.caste_id1.focus( );
			return false;
		}
	
	/*if(!(MatriForm.terms.checked) )
		{
		alert("Please read and accept the terms and conditions.");
			return false;
		} 			
		*/
return true;

}
