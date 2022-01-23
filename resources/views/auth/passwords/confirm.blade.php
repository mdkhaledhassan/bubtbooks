@extends('layouts.app')
@section('title', 'Confirm Password')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Confirm Password</li>
                </ol>
              </nav>
              <div id="error-page" class="row">
                <div class="col-md-6 mx-auto">
                  <div class="box" align="left">
                <h1>Confirm Password</h1>
                <p class="lead">Confirm your password.</p>
                <hr>
                <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                  <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Confirm Password</button>
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
