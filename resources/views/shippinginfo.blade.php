@extends('layouts.app')
@section('title', 'Shipping Info')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Shipping Info</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="post" action="{{ route('shippinginfo') }}">
                  {{csrf_field()}}

                  <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id }}">
                  <h2>Shipping Info</h2>
                  <hr>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="/shippinginfo" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Shipping Info</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Order Review</a></div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Full Name</label>
                          <input id="name" name="username" value="{{Auth::user()->name }}" type="text" class="form-control">
                          @error('name')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input id="address" name="address" value="BUBT Campus" type="text" class="form-control" readonly>
                          @error('address')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phonenumber">Phone Number</label>
                          <input id="phonenumber" name="phonenumber" type="text" value="{{Auth::user()->phonenumber }}" class="form-control">
                          @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" name="email" type="email" value="{{Auth::user()->email }}" class="form-control">
                          @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="/cart" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Cart</a>
                    <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i></button>
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