<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    {{-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> --}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section class="h-100 mt-3">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                  
                    @if (Session::has('fail'))
                        <div class="text-danger text-center">{{ Session('fail') }}</div>
                    @endif
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form method="POST" action="{{ Route('login-process') }}" class="needs-validation"
                                novalidate="" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="web_email"
                                        value="" required autofocus>
                                    @if ($errors->has('web_email'))
                                        <div class="text-danger">{{ $errors->first('web_email') }}</div>
                                    @endif
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <a href="{{ url('/forgot-password') }}" class="float-end">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="web_password"
                                        required>
                                    @if ($errors->has('web_password'))
                                        <div class="text-danger">{{ $errors->first('web_password') }}</div>
                                    @endif
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="web_remember" id="remember"
                                            class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-auto"
                                        style="background-color: #3b71ca">
                                        Login
                                    </button>
                                </div>
                                <h6 class="text-center"> Or</h6>
                            </form>
                            <div class="social mt-4">
                                <a href="{{route('login.facebook')}}"><button style="width: 100%;height:40px;border-radius:5px;background-color:#3b71ca;color:white;border:1px solid #3b71ca"><i class="icon-facebook"></i> Continue with Facebook</button></a>
                              <a href="{{route('login.google')}}"><button class="mt-4" style="width: 100%;height:40px;border-radius:5px;background-color:rgb(221, 75, 57);color:white;border:1px solid rgb(221, 75, 57);"><i class="icon-google-plus"></i> Continue with Google</button> </a>
                            </div>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Don't have an account? <a href="{{ url('/register') }}" class="text-dark">Create One</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('site-asset/js/login.js') }}"></script>
</body>

</html>
