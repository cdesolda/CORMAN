@extends('Layout.mainGuest')


@section('head')
    <link rel="stylesheet" href="{{ url('css/User/login.css') }}">
@endsection

@section('content')
    <!-- Handling Form errors -->
    <div class="row justify-content-center">    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- MultiStep Form -->
    <div class="row">
        <div id="loginBox" class="col-xl-5 col-lg-6 col-md-8 col-sm-12" align="left">
            <form id="msform" action="{{ route('login') }}" method="post" enctype="multipart/form-data" autocomplete="on">
                {{ method_field('POST') }}
                {{csrf_field()}}

                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">LOGIN</h2>
                    <label style="float: left;">Email</label>
                    <input type="email" name="email" value="{{ Request::old('email') }}" placeholder="Es. mariorossi@gmail.com" required >
                    <label style="float: left;">Password</label>
                    <input type="password" name="password" placeholder="informatica95" required>
                    <input class="mb-3" type="submit" name="login" value="Login">
                    <div class="checkbox">
                        <label>Remember me
                            <input type="checkbox">
                        </label>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
