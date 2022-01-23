@extends('layouts.app')
@section('title', 'My Orders')

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
                  <li aria-current="page" class="breadcrumb-item active">My Orders</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/user" class="nav-link"><i class="fa fa-chevron-right"></i> My Account</a><a href="/orders" class="nav-link active"><i class="fa fa-chevron-right"></i> My Orders</a><a href="/sellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Book</a><a href="/requestbook" class="nav-link"><i class="fa fa-chevron-right"></i> Request Book</a><a href="/update" class="nav-link"><i class="fa fa-chevron-right"></i> Update Account</a><a href="/changepassword" class="nav-link"><i class="fa fa-chevron-right"></i> Change Password</a></ul>
                </div>
              </div>


            </div>
            <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h3>My Orders</h3>
                <hr>


                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allorders as $alo)
                      <tr>
                        <th>#{{$alo->invoice}}</th>
                        <th>{{$alo->created_at->timezone('Asia/Dhaka')->format('d M Y ')}}</th>
                        <th>{{$alo->created_at->timezone('Asia/Dhaka')->format('h:i A')}}</th>
                        <th>{{$alo->address}}</th>
                        <th>{{$alo->status}}</th>
                        <td><a href="/orderbooks/{{$alo->id}}"><i class="fa fa-eye"></i></a><a href="/invoice/{{$alo->id}}"><i class="fa fa-print"></i></a></td>
                      </tr>
                    @endforeach 
                    </tbody>
                  </table>
                </div>

              </div>

              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allorders->links()}}
                    
                  </ul>
                </nav>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection