@extends('layouts.app')
@section('title', 'My Cart')

@section('content')


<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>

            @if( Cart::getContent()->count() > 0)
            <div id="basket" class="col-lg-9">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">
                
                <form action="/shippinginfo">
                  {{ csrf_field() }}
                  <h2>Shopping Cart</h2>
                  <p class="text-muted">You currently have {{ Cart::getContent()->count() }} item(s) in your cart.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Book Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach(Cart::getContent() as $pdt)
                        <tr>
                          <th>{{ $pdt->name }}</th>
                          <td>

                            <input type="hidden" value="{{ $pdt->id}}" id="id" name="id">
                            <a href="{{ route('cartdecr', ['id' => $pdt->id ]) }}" class="quantity-minus"><b>-</b></a>

                            <input id="quantity" name="quantity" class="text-center input-text text" type="text" value="{{ $pdt->quantity }}" placeholder="1" readonly>

                            <a href="{{ route('cartincr', ['id' => $pdt->id ]) }}" class="quantity-plus"><b>+</b></a>

                          </td>
                          <td>৳ {{ $pdt->price }}</td>
                          <td>৳ {{ $pdt->getPriceSum() }}</td>
                          <td><a href="{{ route('cartdelete', ['id' => $pdt->id ]) }}"><i class="fa fa-trash-o"></i></a></td>
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
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="/" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue Shopping </a></div>
                    <div class="right">
                      <button type="submit" class="btn btn-primary">Proceed to Checkout <i class="fa fa-chevron-right"></i></button>
                    </div>
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

            @else
        
            <div class="col-lg-12">
              <div id="error-page" class="row">
                <div class="col-md-6 mx-auto">
                  <div class="box text-center py-5">
                    <p class="text-center"><img src="/img/emptycart.png" alt="BUBTBOOKS"></p>
                    <h3>Your Cart is Empty!</h3>
                    <p class="buttons"><a href="/" class="btn btn-primary">Continue Shopping</a></p>
                  </div>
                </div>
              </div>
            </div>

            @endif
          </div>
        </div>
      </div>
    </div>

@endsection