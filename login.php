<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>    
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container login">
        <div class="row">
            <div class="col-12">
                <div class="col-6 card text-center">
                    <h1>Attendance Management Login</h1>
                    <form method="post" action="login_process.php" id="login">
                        <input type="email" name="email" class="form-control" placeholder="Your email id...">
                        <input type="password" name="password" class="form-control" placeholder="Your password...">
                        <button class="btn btn-light" type="submit">Login</button>
                    </form>
                </div>  
            </div>
        </div>
    </div>

    <!-- cdn for validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#login').validate({
                errorClass: 'error',
                rules:{
                    email:{
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                },
                messages:{
                    email: {
                        required: 'Please enter email address.',
                        email: 'Please enter a valid email address.'
                    },
                    password: {
                        required: 'Please enter password.',
                        minlength: 'Password must be at least 8 characters long.'
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>