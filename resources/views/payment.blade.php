@extends('layouts.app')
@section('title', 'Payment Method')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Payment Method</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="post" action="{{ route('payment') }}">
                  {{csrf_field()}}
                  @foreach($allorders as $alo)

                  <input type="hidden" name="orderid" id="orderid" value="{{ $alo->id }}">

                  @endforeach
                  <h2>Payment Method</h2>
                  <hr>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="/shippinginfo" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Shipping Info</a><a href="/payment" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="box">
                          <center><img src="/img/bkash.webp"></center>
                          
                          <div class="box-footer text-center">
                            <input type="radio" id="paymentmethod" name="paymentmethod" value="bKash" class="form-control">
                            @error('paymentmethod')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div id="payments" class="box">
                          <center><img src="/img/rocket.webp"></center>
                          
                          
                          <div class="box-footer text-center">
                            <input type="radio" id="paymentmethod" name="paymentmethod" value="Rocket" class="form-control">
                            @error('paymentmethod')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div id="payments" class="box">
                          <center><img src="/img/cod.webp"></center>
                          <div class="box-footer text-center">
                            <input type="radio" id="paymentmethod" name="paymentmethod" value="COD" class="form-control">
                            @error('paymentmethod')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                          </div>
                        </div>

                      </div>
                    </div>

                    
                    <div id="payment" class="alert alert-success mt-2 text-center">
                  <h3>Order Payment</h3>
                  <hr>
                  <p>
                    <strong>Account No :  01733000689</strong>
                    <br>
                    <strong>Account Type : Personal</strong>
                  </p>

                  <div class="alert alert-success">
                    Please send the above money to this Account Number and write sender phone number & transaction id below there..
                  </div>
                  <div class="form-group">
                          <input type="text" id="senderphonenumber" name="senderphonenumber" placeholder="Sender Phone Number" class="form-control">

                                @error('senderphonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                          </div>
                  <div class="form-group">
                          <input type="text" id="trxid" name="trxid" placeholder="TrxID" class="form-control">

                                @error('trxid')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                          </div>
                </div>
                    


                  </div>


                  <div class="box-footer d-flex justify-content-between"><a href="/shippinginfo" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Shipping Info</a>
                    <button type="submit" class="btn btn-primary">Continue to Order Review<i class="fa fa-chevron-right"></i></button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript">
      $('input[type="radio"]').click(function(e) {
  if(e.target.value == 'bKash') {
    $('#payment').show();
  } 
  else if(e.target.value == 'Rocket')
  {
    $('#payment').show();
  }
  else {
    $('#payment').hide();
  }
})

$('#payment').hide();
    </script>
@endsection