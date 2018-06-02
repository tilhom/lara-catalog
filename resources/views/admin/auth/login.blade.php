@extends('admin.layouts.auth')

@section('content')
<div class="card card-login mx-auto mt-5">
  <div class="card-header">Login</div>
  <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <label for="email">Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>

        @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
        @if ($errors->has('password'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
        <div class="form-group mt-2">
          <div class="form-check ">
            <label class="form-check-label">
              <input class="form-check-input " type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">
          Login
        </button>
      </form>
      <div class="text-center">
       <a class="d-block small mt-3" href="{{ route('password.request') }}">
        Forgot Your Password?
      </a>
    </div>
  </div>
</div>
@endsection