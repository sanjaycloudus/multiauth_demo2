<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<style type="text/css">
		label.error {
         color: #dc3545;
         font-size: 20px;
    }
	</style>
</head>
<body>
	<h1>Login</h1>
	<form method="POST" id="form_data">
			@csrf
		<table bgcolor="">
			
			<tr>
				<td>email:</td>
				<td><input type="text" name="email" id="email" value="{{old('email')}}"></td>

			</tr>
			<tr>
				<td>password:</td>
				<td><input type="text" name="password" id="password"></td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="checkbox" name="agree">accept terms and condition*</td>
			</tr>
			<tr>
				<td><input type="submit" name="" id="btnlogin"></td>

			</tr>
			<tr>
				
				<td>dont have account?<br><a href="{{route('register')}}">create one</a></td>
			</tr>

		</table>

	</form>

</body>
<script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script type="text/javascript">
    
$(document).ready(function(){
	$('#btnlogin').click(function(e) {
		
		email = $('#email').val();
		password = $('#password').val();
		//alert(email);
		//alert(password);
		$.ajax({
			type:'POST',
                url:"{{url('login')}}",
                data:{
                	'email':email,
                	'password':password, 
                	 '_token': '{{ csrf_token() }}'
                	},

                success:function($res)
                {
                	//location.reload();
                    $('#dis').html($res);
                    
                    //alert('success');
                    //window.location.replace("/user/dashboard");
                }
		})
	})
})
//
$(document).ready(function() {

            $("#form_data").validate({
            	
                rules: {
                   
                  
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    
                    password: {
                        required: true,
                        minlength: 8
                    },
                   
                     agree:{
                    	required:true,

                    },
                   
                   
                },
                messages: {
                 
                   
                    email: {
                        required: "email is required",
                        email: "email must be a valid email address",
                        maxlength: "email cannot be more than 50 characters",
                    },
                   
                    password: {
                        required: "password is required",
                        minlength: "password must be at least 8 characters"
                    },
                   
                     agree:{
                    	required:"check terms and condition"
                    }
                    
                 
                }
            });
        });     
</script>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<style>
    label.error {
         color: #dc3545;
         font-size: 14px;
    }
</style>
</head>


<body class="my-login-page">
	<section class="h-100">
	<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
			
					<div class="cardx fat mt-5">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" id="form_validation" action="{{route('login')}}">
                                @csrf
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value=""  autofocus placeholder="Enter email">
                                    <span class="text-danger" id="error1"></span>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password"  data-eye placeholder="Enter password">
                                    <span class="text-danger" id="error2"></span>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remeber Me</label>
										<span class="text-danger" id="error3"></span>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" id="btnlogin">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{route('register')}}">Create One</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>


	<script src="{{asset('bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('js/my-login.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script>
//java script validation

$(document).ready(function(){
  $("#form_validation").submit(function(e){
  	e.preventDefault();

  	var email = $('#email').val()
  	var password = $('#password').val()
  	var remember = $('#remember').val()
  	//alert(email);

  	var check =  $('#remember').is(':checked');
  	//alert(check);
   if(email=="")
   {
   		//alert('please enter email');
   		$("#error1").html( "please enter email");
   }
   if(password=="")
   {
   	 //alert('please enter password');
   	 $("#error2").html("please enter password");
   }
   if(check==false)
   {
   		 $("#error3").html("please select checkbox");
   }

  });
});
//validation jquery not working

// $(document).ready(function(){

// 	$('#form_validation').validate({

// 		rules:{

// 			email:{
// 				 required: true,
//                  email: true,
//                  maxlength: 50
// 			},
// 			password:{
// 				required: true,
//                  minlength: 8
// 			}
// 		},
// 		messages:{
			
// 			email:{
// 				 required: "Email is required",
//                  email: "Email must be a valid email address",
//                  maxlength: "Email cannot be more than 50 characters",
// 			},
// 			password:{
// 				required: "Password is required",
//                 minlength: "Password must be at least 8 characters"
// 			}
// 		}
// 	})
// }) 



//login jquery
$(document).ready(function(){
	$('#btnlogin').click(function(e) {
		//alert('hello')
		email = $('#email').val();
		password = $('#password').val();
		//alert(email);
		//alert(password);
		$.ajax({
			type:'POST',
                url:"{{url('login')}}",
                data:{
                	'email':email,
                	'password':password, 
                	'_token': '{{ csrf_token() }}'
                	},

                success:function($res)
                {
                    //$('#dis').html($res);
                    location.reload();
                }
		})
	})
})

//

</script>
 
</body>
</html>
