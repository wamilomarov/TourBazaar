@extends('admin.app')

@section('panel')
    <div class="loginwrapper whiter">
        <span class="circle"></span>
        <div class="loginone">
            <header>
                <a href="{{url('')}}"><img src="assets/images/logodark.png" alt="" /></a>
                <p>Enter your credentials to login to your account</p>
            </header>
            <form role="form" method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="username form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" id="email" class="form-control" name="email" placeholder="Enter your username" value="{{ old('email') }}" required autofocus />
                    <i class="glyphicon glyphicon-user"></i>
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="password form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="password"/>
                    <i class="glyphicon glyphicon-lock"></i>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="custom-radio-checkbox checkbox">
                    <input tabindex="1" type="checkbox" class="minimalcheckradios" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label>Remember me</label>
                </div>
                <script>
                    $(document).ready(function(){
                        $('.minimalcheckradios').iCheck({
                            checkboxClass: 'icheckbox_minimal',
                            radioClass: 'iradio_minimal',
                            increaseArea: '20%' // optional
                        });
                    });
                </script>
                <input type="submit" class="btn btn-default" value="Sign In" />
            </form>
            <footer>
                <a class="forgot pull-left" href="{{ route('password.request') }}">I forgot my password</a>
                <div class="clear"></div>
            </footer>
        </div>
    </div>
@endsection




{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}