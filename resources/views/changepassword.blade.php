@extends('layouts.app')
@section('title', 'Change Password')

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
                  <li aria-current="page" class="breadcrumb-item active">Change Password</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/user" class="nav-link"><i class="fa fa-chevron-right"></i> My Account</a><a href="/orders" class="nav-link"><i class="fa fa-chevron-right"></i> My Orders</a><a href="/sellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Book</a><a href="/requestbook" class="nav-link"><i class="fa fa-chevron-right"></i> Request Book</a><a href="/update" class="nav-link"><i class="fa fa-chevron-right"></i> Update Account</a><a href="/changepassword" class="nav-link active"><i class="fa fa-chevron-right"></i> Change Password</a></ul>
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
                <h3>Change Password</h3>
                <hr>
                <form action="{{ route('changepassword') }}" method="post" enctype="multipart/form-data">
                  
                  {{csrf_field()}}

                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="oldpassword">Old Password</label>
                        <input id="oldpassword" type="password" class="form-control" name="oldpassword">
                        @error('oldpassword')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input id="newpassword" type="password" class="form-control" name="newpassword">
                        @error('newpassword')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Change Password</button>
                  </div>
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
