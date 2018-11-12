// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		  // asawa_no validation
		  var asawaregex = /^[0-9]+$/;
		 
		 $.validator.addMethod("validno", function( value, element ) {
		     return this.optional( element ) || asawaregex.test( value );
		 }); 
		 
		  // checkbox validation
		 var chechregex = 1;
		  $.validator.addMethod("validcheck", function( value, element ) {
		     return this.optional( element ) || chechregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#register-form").validate({
					
		  rules:
		  {
				full_name: {
					required: true,
					validname: true,
					minlength: 4
				},
				check: {
					required: true
				},
				phone: {
					required: true,
					validphone: true
				},
				location: {
					required: true,
					validlocation: true,
					minlength:

				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				password_again: {
					required: true,
					equalTo: '#password'
				},
				description: {
					required: true,
				},

				reg_no: {
					required: true,
					// validno: true,
					minlength: 4,
					maxlength: 11
				},
				tsc_no: {
					required: true,
					validno: true,
					minlength: 5
				},
				form: {
					required:true
				},
				stream: {
					required: true
				},
				gender: {
					required: true
				},
		   },
		   messages:
		   {
				full_name: {
					required: "Please Enter Full Name",
					validname: "Name must contain only alphabets and space",
					minlength: "Your Name is Too Short"
					  },
				check: {
					 required: "Please Accept  Terms and Conditions",
					  validcheck: "Please Accept Terms and Conditions"
				},
			    phone: {
					  required: "Please Enter your Phone Number",
					  validemail: "Enter Valid Phone Number please"
					   },
		   	    location {
					required: "Please describe where your shop is",
					valid;ocation: "Please enter areas within Moi University",
					
					},
				description: {
					required: "Please Enter your item's description",
					},
				password:{
					required: "Please Enter Password",
					minlength: "Password at least have 8 characters"
					},
				password_again:{
					required: "Please Retype your Password"
					// equalTo: "Password Did not Match !"
					},
				form: {
					required: "Please Select Form"
				},
				gender: {
					required: "Please Select your gender"
				},
				stream: {
					required:"Please select Stream"
				},
				reg_no: {
					required: "Please Enter ADM No",
					// validno: "Please Enter No only",
					minlength: "Please Enter atleast 4 Digits"
				},
				tsc_no: {
					required: "Please Enter TSC No",
					validno: "Please Enter No only",
					minlength: "Please Enter More Than 5 "
				}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
		   
		   		submitHandler: function(form){
					
					alert('All Details filled? Press Ok To register');
					form.submit();
					//var url = $('#register-form').attr('action');
					//location.href=url;
					
				}
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   
		   /*function submitForm(){
			 
			   
			   /*$('#message').slideDown(200, function(){
				   
				   $('#message').delay(3000).slideUp(100);
				   $("#register-form")[0].reset();
				   $(element).closest('.form-group').find("error").removeClass("has-success");
				    
			   });
			   
			   alert('form submitted...');
			   $("#register-form").resetForm();
			      
		   }*/
});


