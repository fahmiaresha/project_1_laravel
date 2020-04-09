<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Register</title>

    <!-- Font Icon -->

    <link rel="stylesheet" href="{{ asset('asset/login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('asset/login/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<div class="main"> 
     <!-- Sign up form -->
     <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                        </div>
                         @endif

                        <form action="{{ url('/registerPost') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="first_name2" id="name" placeholder="First Name" value="{{ old('name') }}"/>
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('name') }}"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}"/>
                            </div>

                            

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repeat_password" id="repeat_password" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" checked disabled/>
                                <label for="agree-term" class="label-agree-term" name="Terms_Of_Service" id="Terms_Of_Service" ><span><span></span></span>I agree all statements in Terms of service</label>
                            </div>
                            <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" >
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('asset/login/images/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ url('/login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

</div>
<!-- JS -->
<script src="{{ asset('asset/login/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/login/js/main.js') }}"></script>
</body>
</html>