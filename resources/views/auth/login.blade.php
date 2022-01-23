@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Sign in</li>
                </ol>
              </nav>
              <div id="error-page" class="row">
                <div class="col-md-6 mx-auto">
                  <div class="box" align="left">
                <h1>Login</h1>
                <p class="lead">Already our member?</p>
                <hr>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="bubtid">BUBT ID</label>
                    <input id="bubtid" type="text" placeholder="bubtid" class="form-control" name="bubtid" class="form-control @error('bubtid') is-invalid @enderror" required autocomplete="bubtid" autofocus>
                    @error('bubtid')
                                   
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>

                  @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
                <br>
                <p class="text-muted">Don’t have an account? <a href="/register"><strong>Register Now </strong></a>!</p>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection