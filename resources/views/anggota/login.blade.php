<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LS - Skincare | Login </title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container px-4 py-5 mx-auto">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card1">
                    <div class="row justify-content-center my-auto">

                            <div class="col-md-8 col-10 my-5">
                                <div class="row justify-content-center px-3 mb-3">
                                    <a href="{{ route('member.index') }}">
                                        <img id="logo" src="https://lh3.googleusercontent.com/d/1PVOFE-UJYo_lp2_YOIlqpVyba5XD9n94?authuser=0">
                                    </a>
                                </div>
                                <h3 class="mb-5 text-center heading">LS - SKINCARE</h3>
                                <h6 class="msg-info">Harap masuk ke akun Anda</h6>
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <form action="{{ route('login.post') }}" method="post" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">Username</label>
                                        <input id="username" type="text" placeholder="Masukan Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">Password</label>
                                        <input id="password" type="password" placeholder="Masukan Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row justify-content-center my-3 px-3">
                                        <button type="submit" class="btn-block btn-color">Login</button>
                                    </div>
                                </form>
                                {{-- <div class="row justify-content-center my-2"> <a href="#"><small class="text-muted">Forgot Password?</small></a> </div> --}}
                            </div>
                    </div>
                    {{-- <div class="bottom text-center mb-5">
                        <p href="#" class="sm-text mx-auto mb-3">Don't have an account?<button class="btn btn-white ml-2">Create new</button></p>
                    </div> --}}
                </div>
                <div class="card card2">
                    <div class="my-auto mx-md-5 px-md-5 right">
                        <h3 class="text-white">We are more than just a company</h3> <small class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
