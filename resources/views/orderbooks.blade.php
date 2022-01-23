@extends('layouts.app')
@section('title', 'Order Books')

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
                  <li class="breadcrumb-item"><a href="/orders">My Orders</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Order Books</li>
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
                <h3>Order Books</h3>
                <hr>
                


                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Book Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($allorderbooks as $alob)
                        <tr>
                          <th>{{ $alob->bookname }}</th>
                          <th>{{ $alob->quantity }}</th>
                          <td>৳ {{ $alob->bookprice }}</td>
                          <td>৳ {{ $alob->total }}</td>
                        </tr>
                        @endforeach

                      </tbody>

                      <tfoot>
                        <tr>
                          <th colspan="3">Total Amount</th>
                          @foreach($total as $tol)
                          <th colspan="2">৳ {{ $tol->totalamount }}</th>
                          @endforeach
                        </tr>

                        <tr>
                          <th colspan="3">Paid Amount</th>
                          @foreach($payment as $pay)
                          <th colspan="2">৳ {{ $pay->paymentamount }}</th>
                          @endforeach
                        </tr>

                        <tr>
                          <th colspan="3">Due Amount</th>
                          @foreach($payment as $pay)
                          <th colspan="2">৳ {{ $tol->totalamount - $pay->paymentamount }}</th>
                          @endforeach
                        </tr>
                      </tfoot>
                    </table>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection