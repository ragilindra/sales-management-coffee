<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Halaman Login | SIMAPEN</title>
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/mystyle.css') }}" rel="stylesheet" />

    <link rel="shortcut icon" type="image/jpg" href="{{ URL::asset('images/Picture3 2.png') }}" />
</head>

<body class="login">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center">
                            <img src="{{ URL::asset('images/logo.png') }}" width="60%" />
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form action="{{ route('postlogin') }}" method="POST">
                                @csrf

                                <div class="form-group text-left font-italic">
                                    <label class="small mb-1" for="inputEmailAddress">Officer ID</label>
                                    <input class="form-control py-4 shadow-sm" id="officer_id" name="officer_id"
                                        type="text" placeholder="Enter Officer ID" />
                                    @if ($errors->first('officer_id'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('officer_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group text-left font-italic">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control py-4 shadow-sm" id="inputPassword" name="password"
                                        type="password" placeholder="Enter password" />
                                    @if ($errors->first('password'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group d-flex mt-4 mb-0 float-right">
                                    <input type="submit" class="btn btn-dark shadow-sm" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
