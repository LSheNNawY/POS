
<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{-- favicon --}}
  <link rel="icon" href="{{ asset('pasta.ico') }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/font-awesome/css/font-awesome.min.css">
 @if(app()->getLocale() == 'ar')
  <!-- Cairo font -->
  <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700" rel="stylesheet">
  <!-- font awesome rtl -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/font-awesome-rtl.min.css">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/bower_components/bootstrap/dist/css/bootstrap-rtl.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/AdminLTE-rtl.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/skins/_all-skins-rtl.min.css">
@else
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/skins/_all-skins.min.css">
@endif
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>@lang('site.site_name')</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">@lang('site.sign_to_start')</p>
    <div class="credentials">
        <h5 class="text-danger">login credentials:</h5>
        <p style="margin-left: 20px; margin-bottom: 5px">EMAIL: "superadmin@site.com"</p>
        <p style="margin-left: 20px">PASSWORD: "123456"</p>
    </div>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <!-- email -->
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('site.email')" required autofocus>

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->any())
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <!-- password -->
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" name="password"  placeholder="@lang('site.password')" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> @lang('site.remember_me')
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    @if (Route::has('password.request'))
      <a class="btn btn-link" href="{{ route('password.request') }}">
          @lang('site.forgot_password')
      </a><br>
    @endif
  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('AdminLTE') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('AdminLTE') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ asset('AdminLTE') }}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
