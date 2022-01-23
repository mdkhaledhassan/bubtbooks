@extends('layouts.app')
@section('title', 'Order Review')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Order Review</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="post" action="{{ route('orderreview') }}">
                  {{csrf_field()}}
                  @foreach($allorders as $alo)

                  <input type="hidden" name="orderid" id="orderid" value="{{ $alo->id }}">

                  <input type="hidden" name="userid" id="userid" value="{{ $alo->userid }}">

                  <input type="hidden" name="username" id="username" value="{{ $alo->username }}">

                  <input type="hidden" name="address" id="address" value="{{ $alo->address }}">

                  <input type="hidden" name="phonenumber" id="phonenumber" value="{{ $alo->phonenumber }}">

                  <input type="hidden" name="email" id="email" value="{{ $alo->email }}">

                  <input type="hidden" name="status" id="status" value="{{ $alo->status }}">

                  @endforeach
                  
                  @foreach($allpayments as $alp)

                  <input type="hidden" name="paymentid" id="paymentid" value="{{ $alp->id }}">

                  <input type="hidden" name="senderphonenumber" id="senderphonenumber" value="{{ $alp->senderphonenumber }}">

                  <input type="hidden" name="trxid" id="trxid" value="{{ $alp->trxid }}">

                  <input type="hidden" name="paymentmethod" id="paymentmethod" value="{{ $alp->paymentmethod }}">

                  <input type="hidden" name="totalamount" id="totalamount" value="{{ $alp->totalamount }}">

                  <input type="hidden" name="paymentamount" id="paymentamount" value="{{ $alp->paymentamount }}">

                  @endforeach
                  <h2>Order Review</h2>
                  <hr>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="/shippinginfo" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Shipping Info</a><a href="/payment" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money">                      </i>Payment Method</a><a href="/orderreview" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Order Review</a></div>

                  <div class="content">
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
                        @foreach(Cart::getContent() as $pdt)
                        
                        <form>
                          <input type="hidden" name="bookid" id="bookid" value="{{ $pdt->id }}">
                          <input type="hidden" name="bookname" id="bookname" value="{{ $pdt->name }}">
                          <input type="hidden" name="quantity" id="quantity" value="{{ $pdt->quantity }}">
                          <input type="hidden" name="bookprice" id="bookprice" value="{{ $pdt->price }}">
                          </form>
                        

                        <tr>

                          <th>{{ $pdt->name }}</th>
                          <td>{{ $pdt->quantity }}</td>
                          <td>৳ {{ $pdt->price }}</td>
                          <td>৳ {{ $pdt->getPriceSum() }}</td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3">Total</th>
                          <th colspan="2">৳ {{ Cart::getTotal() }}</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </div>

                  <div class="box-footer d-flex justify-content-between"><a href="/payment" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Payment Method</a>
                    <button type="submit" class="btn btn-primary">Place an Order<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Order Summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order Total</td>
                        <th>৳ {{ Cart::getTotal() }}</th>
                      </tr>
                      <tr>
                        <td>Shipping</td>
                        <th>Free</th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>৳ {{ Cart::getTotal() }}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection