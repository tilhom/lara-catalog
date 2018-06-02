@extends('admin.layouts.auth')

@section('content')
<div class="card card-login mx-auto mt-5">
  <div class="card-header">Reset Password</div>
  <div class="card-body">
   <form method="POST" action="{{ route('password.request') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
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
    </div>
    <div class="form-group">
      <label for="password">Confirm Password</label>
      <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required placeholder="Retype Password">
      @if ($errors->has('password_confirmation'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
      </span>
      @endif
    </div>

    <button type="submit" class="btn btn-primary btn-block">
      Reset Password
    </button>
  </form>
</div>
</div>
@endsection