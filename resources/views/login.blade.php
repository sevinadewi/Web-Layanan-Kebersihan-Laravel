<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    
    <div class="container" id="container">
        <div class="form-container sign-up">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
    
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->has('email'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'Invalid email and password. Please try again',
                    });
                </script>
            @endif

            <form method="POST" action="{{route('signUp.post')}}" onsubmit="return validateSignUp()" novalidate>
                @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
                <span>or use your email for registration</span>

                <input type="text" id="register_name" name="register_name" placeholder="Name">
                <input type="email" id="register_email" name="register_email" placeholder="Email">
                <input type="password" id="register_password" name="register_password" placeholder="Password">

                <button>Sign Up</button>
            </form>
        </div>

        @if($errors->any())
        <script>
            alert("{{$errors->first()}}");
        </script>
        @endif

        <div class="form-container sign-in">
            <form method="POST" action="{{route('signIn.post')}}" onsubmit="return validateSignIn()" >
                @csrf
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
                <span>or use your email and password</span>
                <input type="email" id="login_email" placeholder="Email" name="email">
                <input type="password" id="login_password" placeholder="Password" name="password">
                <a href="">Forgot your email or password?</a>
                <button>Sign in</button>
            </form>
        </div>
             
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, User!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/loginAnimation.js') }}"></script>
    <script>
        function validateSignIn() {
            const email = document.getElementById('login_email').value;
            const password = document.getElementById('login_password').value;
           
        
            if (!email && !password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Email and Password must be filled out.',
                });
                return false;
            }
            if (!email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Email must be filled out.',
                });
                return false;
            }

            if (!email.includes('@')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please include "@" in your email address.',
                });
                return false;
            }
           
            if (!password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Password must be filled out.',
                });
                return false;
            }
            return true;
        }

        function validateSignUp() {
            const name = document.getElementById('register_name').value;
            const email = document.getElementById('register_email').value;
            const password = document.getElementById('register_password').value;

      
            if (!name && !email && !password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Name, Email, and Password must be filled out.',
                });
                return false;
            }
            if (!name && !password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Name and Password must be filled out.',
                });
                return false;
            }
            if (!email && !password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: ' Email and Password must be filled out.',
                });
                return false;
            }
            if (!name && !email ) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Name and Email must be filled out.',
                });
                return false;
            }
            if (!name) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Name must be filled out.',
                });
                return false;
            }
            if (!email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Email must be filled out.',
                });
                return false;
            }
            if (!/\S+@\S+\.\S+$/.test(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please provide a valid email address.',
                });
                return false;
            }

            if (!password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Password must be filled out.',
                });
                return false;
            }

            if (password.length > 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Password',
                    text: 'Password must be 8 characters or fewer.',
                });
                return false;
            }
            if (/\s/.test(password)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Password',
                    text: 'Password cannot contain spaces.',
                });
                return false;
    }

            return true;
        }


       
    </script>
  
</body>
</html>