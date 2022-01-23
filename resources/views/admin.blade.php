@extends('layouts.app')
@section('title', 'Admin Panel')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Admin Panel</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link active"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
                </div>
              </div>

            </div>
            <div class="col-lg-9">
              <div class="box">
                <h3>Dashboard</h3>
                <hr>

                <div id="hot">
                    <div id="advantages">
                    <div class="container">
                      <div class="row mb-3">
                        <div class="col-md-3">
                          <a href="/viewadmins">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:Tomato;">
                            <h4 style="color:white;">Admins</h4>
                            <p class="mb-0" style="color:white;">{{ $admins }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/viewusers">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:MediumSeaGreen;">
                            <h4 style="color:white;">Users</h4>
                            <p class="mb-0" style="color:white;">{{ $users }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/viewbooks">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:SlateBlue;">
                            <h4 style="color:white;">Books</h4>
                            <p class="mb-0" style="color:white;">{{ $books }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/viewsellbook">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100"  style="background-color:#6F4E37;">
                            <h4 style="color:white;">Sell Books</h4>
                            <p class="mb-0" style="color:white;">{{ $sellbooks }}</p>
                          </div>
                        </a>
                        </div>
                      </div>


                      <div class="row mb-3">
                        <div class="col-md-3">
                          <a href="/departments">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:DodgerBlue;">
                            <h4 style="color:white;">Departments</h4>
                            <p class="mb-0" style="color:white;">{{ $departments }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/semesters">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:Orange;">
                            <h4 style="color:white;">Semesters</h4>
                            <p class="mb-0" style="color:white;">{{ $semesters }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/vieworders">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100 bg-dark">
                            <h4 style="color:white;">Orders</h4>
                            <p class="mb-0" style="color:white;">{{ $orders }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/viewnotice">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:#d9534f;">
                            <h4 style="color:white;">Notices</h4>
                            <p class="mb-0" style="color:white;">{{ $notices }}</p>
                          </div>
                        </a>
                        </div>
                      </div>


                      <div class="row mb-3">
                        <div class="col-md-3">
                          <a href="/viewreqbook">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:Violet;">
                            <h4 style="color:white;">Requests</h4>
                            <p class="mb-0" style="color:white;">{{ $requests }}
                           </p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/viewreqbook">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:#48CCCD;">
                            <h4 style="color:white;">N. Request</h4>
                            <p class="mb-0" style="color:white;">
                            @if(\App\Requests::where('is_seen','0')->count() > 0)
                             <span style="color:red">{{\App\Requests::where('is_seen','0')->count()}}</span>
                             @else
                             <span style="color:white">0</span>
                             @endif
                           </p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/reqbooks">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100" style="background-color:#7E354D;">
                            <h4 style="color:white;">R. Books</h4>
                            <p class="mb-0" style="color:white;">{{ $requestbooks }}</p>
                          </div>
                        </a>
                        </div>
                        <div class="col-md-3">
                          <a href="/trashbox">
                          <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100"  style="background-color:Gray;">
                            <h4 style="color:white;">Trash Box</h4>
                            <p class="mb-0" style="color:white;">{{ $trashbox }}</p>
                          </div>
                        </a>
                        </div>              
                      </div>

                      <br>
                      <br>

                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection