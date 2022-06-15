<html lang="en">
<head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

<div class="container panel panel-default">
        <h2 class="panel-heading">Registration</h2>
    <form id="contact-form">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name">
            <span class="text-danger" id="name-error"></span>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email">
            <span class="text-danger" id="email-error"></span>
        </div>

        <div class="form-group">
            <input type="text" name="password" class="form-control" placeholder="Enter password" id="password">
            <span class="text-danger" id="password-error"></span>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" id="submit">Submit</button>

        </div>
        <a href="{{route('login')}}">login</a>
        <div class="form-group">
            <b><span class="text-success" id="success-message"> </span><b>
        </div>
    </form>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contact-form').on('submit', function(event){
        event.preventDefault();
        $('#name-error').text('');
        $('#email-error').text('');
        $('#password-error').text('');
       

        name = $('#name').val();
        email = $('#email').val();
        password = $('#password').val();
      

        $.ajax({
          url: '/register',
          type: "POST",
          data:{
              name:name,
              email:email,
              password:password,
              
          },
          success:function(response){
            console.log(response);
            if (response) {
              $('#success-message').text(response.success);
              $("#contact-form")[0].reset();
              //location.reload();
              //alert('from submited successfully');

            }
          },
          error: function(response) {
              $('#name-error').text(response.responseJSON.errors.name);
              $('#email-error').text(response.responseJSON.errors.email);
              $('#password-error').text(response.responseJSON.errors.password);
            
          }
         });
        });

    
      </script>
 </body>
</html>