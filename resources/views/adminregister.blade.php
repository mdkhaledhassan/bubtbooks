@extends('layouts.app')
@section('title', 'Admin Register')
@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Admin New account</li>
                </ol>
              </nav>
              <div id="error-page" class="row">
                <div class="col-md-9 mx-auto">
                <div class="box" align="left">
                <h1>Admin New account</h1>
                <p class="lead">Not our registered admin yet?</p>
                <hr>
                <form action="adminregister" method="post">
                        @csrf
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bubtid">BUBT ID</label>
                    <input id="bubtid" type="text" class="form-control" name="bubtid" value="{{ old('bubtid') }}" required autocomplete="bubtid" autofocus>

                                @error('bubtid')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">

                                @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" type="text" class="form-control" name="department" required autocomplete="department">
                      <option value="">Select Department</option>
                      <option value="CSE">CSE</option>
                      <option value="CSIT">CSIT</option>
                      <option value="BBA">BBA</option>
                      <option value="EEE">EEE</option>
                      <option value="LLB">LLB</option>
                      <option value="Civil">Civil</option>
                      <option value="Textile">Textile</option>
                      <option value="English">English</option>
                      <option value="Economics">Economics</option>
                    </select>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" type="text" class="form-control" name="gender" required autocomplete="gender">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="intake">Intake</label>
                    <input id="intake" type="intake" class="form-control" name="intake" value="{{ old('intake') }}" class="form-control @error('intake') is-invalid @enderror" required autocomplete="intake">

                                @error('intake')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">

                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="section">Section</label>
                    <input id="section" type="section" class="form-control" name="section" value="{{ old('section') }}" class="form-control @error('section') is-invalid @enderror" required autocomplete="section">

                                @error('section')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>

                                @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register Admin</button>
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
