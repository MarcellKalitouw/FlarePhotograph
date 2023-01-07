<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Flare Photography</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset ('../template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset ('../template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset ('../template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset ('../template/css/style.css')}}" rel="stylesheet">
</head>

<body class="login-page" style="background-color: #2196F3">
    <div class="login-box">
        <div class="logo">
            <div style="width:100%;text-align:center">
            {{-- <img src="{{url('/template/images/icon_imigrasi.png')}}" width="100px"/> --}}
            <i class="material-icons" style="font-size:100px">supervisor_account</i>
            </div>
            <a href="javascript:void(0);">Admin<b><br> Flare Photography</b></a>
            <p class="text-white text-center" style="color:white;">Flare Photography Web
            {{-- <small>Admin BootStrap Based - Material Design</small> --}}
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{route('login.store')}}">
                    @csrf
                    <div class="msg">Silahkan <i>Login</i> untuk memulai <br>aktivitas di Halaman Pengguna / Admin</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-xs-4" style="margin: 0;
                                            position: absolute;
                                            top: 100%;
                                            left: 50%;
                                            -ms-transform: translate(-50%, -50%);
                                            transform: translate(-50%, -50%);"
                        >
                            <button class="btn btn-block bg-pink waves-effect" type="submit">MASUK</button>
                        </div>
                    </div>
                    
                    @if (session('error'))
                        <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{session('error')}}  
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{session('success')}}  
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif  
                    {{-- <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> --}}
                    <div class="m-t-10 m-b-15 align-center">
                        <a href="{{ route('register') }}">Daftar akun baru?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/examples/sign-in.js"></script>
</body>

</html>