@extends('layouts.app')
@section('title', 'Order Payments')

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
                  <li aria-current="page" class="breadcrumb-item active">Order Payments</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link active"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a></ul>
                </div>
              </div>


            </div>
            @foreach($allpayments as $pay)
            <div class="col-lg-9">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">
                <h3>Payment Information</h3>
                <hr>

                
                <div id="post-content"> 
                  
                  
                  <p><h5 align="left"><strong>Book OrderID : </strong>{{$pay->id}}</h5></p>
                  
                  <p><h5 align="left"><strong>Total Amount : </strong>{{$pay->totalamount}}</h5></p>

                  <p><h5 align="left" ><strong>Payment Amount : </strong>{{$pay->paymentamount}}</h5></p>

                  <p><h5 align="left" ><strong>Due Amount : </strong>{{$pay->totalamount - $pay->paymentamount}}</h5></p>

                  <p><h5 align="left"><strong>Payment Method : </strong>{{$pay->paymentmethod}}</h5></p>

                  <p><h5 align="left"><strong>Sender Phone Number : </strong>{{$pay->senderphonenumber}}</h5></p>

                  <p><h5 align="left"><strong>TrxID : </strong>{{$pay->trxid}}</h5></p>
                </div>


              </div>



              <div class="box">
                <h3>Update Payment</h3>
                <hr>
              <div class="modal-body">
                <form action="{{ route('updatepayment', ['id' => $pay->id]) }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="">
                  <div class="form-group">
                    <label for="paymentamount">Payment Amount</label>
                    <input id="paymentamount" type="text" class="form-control" name="paymentamount">

                                @error('paymentamount')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>   
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Payment</button>
                  </div>
                </form>
                </div>
              </div>


            </div>

            @endforeach
          </div>
        </div>
      </div>
    </div>
@endsection