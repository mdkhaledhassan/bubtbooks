@extends('layouts.app')
@section('title', 'User Profile')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">My Account</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/user" class="nav-link active"><i class="fa fa-chevron-right"></i> My Account</a><a href="/orders" class="nav-link"><i class="fa fa-chevron-right"></i> My Orders</a><a href="/sellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Book</a><a href="/requestbook" class="nav-link"><i class="fa fa-chevron-right"></i> Request Book</a><a href="/update" class="nav-link"><i class="fa fa-chevron-right"></i> Update Account</a><a href="/changepassword" class="nav-link"><i class="fa fa-chevron-right"></i> Change Password</a></ul>
                </div>
              </div>


            </div>
            <div class="col-lg-9">
              <div class="box">
                <h3>Personal Information</h3>
                <hr>
                <form>

                  <div class="row" align="center">
                    <div class="col-md-6">
                      <div id="post-content">
                  <p><h5 align="left"><strong>Name : </strong>{{Auth::user()->name }}</h5></p>
                  <p><h5 align="left"><strong>User Email : </strong>{{Auth::user()->email }}</h5></p>
                  <p><h5 align="left"><strong>Phone Number : </strong>{{Auth::user()->phonenumber }}</h5></p>
                  <p><h5 align="left"><strong>Gender : </strong>{{Auth::user()->gender }}</h5></p>
                </div>
                    </div>
                    <div class="col-md-6">
                      <div id="post-content">
                  <p><h5 align="left"><strong>BUBT ID : </strong>{{Auth::user()->bubtid }}</h5></p>
                  <p><h5 align="left"><strong>Department : </strong>{{Auth::user()->department }}</h5></p>
                  <p><h5 align="left"><strong>Intake : </strong>{{Auth::user()->intake }}</h5></p>
                  <p><h5 align="left"><strong>Section : </strong>{{Auth::user()->section }}</h5></p>
                </div>
                </div>
                </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection