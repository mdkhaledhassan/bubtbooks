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
                  <li class="breadcrumb-item"><a href="/admin">Admin Panel</a></li>
                  <li class="breadcrumb-item"><a href="/vieworders">Orders</a></li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link active"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
                </div>
              </div>


            </div>
            <div class="col-lg-9">
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