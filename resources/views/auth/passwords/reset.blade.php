@extends('layouts.app')
@section('title', 'Password Reset')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Password Reset</li>
                </ol>
              </nav>
              <div id="error-page" class="row">
                <div class="col-md-6 mx-auto">
                  <div class="box" align="left">
                <h1>Password Reset</h1>
                <p class="lead">Reset your password.</p>
                <hr>
                <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">

                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Reset Password</button>
                  </div>
                </form>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
