@extends('layouts.app')
@section('title', 'Update Account')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/user">My Account</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Update Account</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">

              <div class="card sidebar-menu">
                <div class="card-header">
                  <img src="/userpic/{{ Auth::user()->userpic }}" style="width:50px; height:50px; float:left; border-radius:50%; margin-right:25px;">
                  <h5>Hello,</h5>
            <h4>{{ Auth::user()->name }}</h4>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column"><a href="/user" class="nav-link"><i class="fa fa-chevron-right"></i> My Account</a><a href="/orders" class="nav-link"><i class="fa fa-chevron-right"></i> My Orders</a><a href="/sellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Book</a><a href="/requestbook" class="nav-link"><i class="fa fa-chevron-right"></i> Request Book</a><a href="/update" class="nav-link active"><i class="fa fa-chevron-right"></i> Update Account</a><a href="/changepassword" class="nav-link"><i class="fa fa-chevron-right"></i> Change Password</a></ul>
                </div>
              </div>


            </div>
            <div class="col-lg-9">
                  @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
                
              <div class="box">
                <h3>Update Information</h3>
                <hr>
                <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                  
                  {{csrf_field()}}

                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                        @error('name')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="department">Department</label>
                        <select id="department" type="text" class="form-control" value="{{ $user['department'] }}" name="department">
                          <option value="{{ $user['department'] }}">{{ $user['department'] }}</option>
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
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{ $user['email'] }}">
                        @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="intake">Intake</label>
                        <input id="intake" type="text" class="form-control" name="intake" value="{{ $user['intake'] }}">
                        @error('intake')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" type="text" class="form-control" value="{{ $user['gender'] }}" name="gender">
                      <option value="{{ $user['gender'] }}">{{ $user['gender'] }}</option>
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="section">Section</label>
                        <input id="section" type="text" class="form-control" name="section" value="{{ $user['section'] }}">
                        @error('section')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="phonenumber">Phone Number</label>
                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ $user['phonenumber'] }}">
                        @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="userpic">Profile Picture</label>
                        <input id="userpic" type="file" class="form-control" name="userpic">
                      </div>
                      </div>
                      </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Account</button>
                  </div>
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
