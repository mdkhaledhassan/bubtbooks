@extends('layouts.app')
@section('title', 'Search Results')

@section('content')


<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Search Results</li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-12">
              <div class="box">
                <h1 align="center">Search Results: {{ $query }}</h1>
              </div>

              <div class="row products">


              	@if($allbooks->count() > 0)
              	@foreach($allbooks as $alb)
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/department/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/department/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/department/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}" class="invisible"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid" width="450" height="600"></a>
                    <div class="text">
                      <h3><a href="/department/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}">{{$alb->bookname}}</a></h3>
                      @if( $alb->sellingprice > 0)
                      <p class="price">
                        <del></del>৳ {{$alb->sellingprice}}
                      </p>
                      @else
                      @endif
                      <form action="{{ route('cartadd') }}" method="post">
                                    {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $alb->id }}">
                      <p class="buttons"><a href="/department/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}" class="btn btn-outline-secondary">View Book</a>

                        @if (Auth::check())
                        @if( $alb->totalquantity > 0)
                        <a href="{{ route('cartadd', ['id' => $alb->id ]) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                        @else
                        <a href="#" class="btn btn-outline-secondary">Not Available</a>
                        @endif

                        @else

                        @if( $alb->totalquantity > 0)
                        <a href="#" data-id="{{$alb->id}}" class="btn btn-primary" data-toggle="modal" data-target="#login-modal"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                        @else
                        <a href="#" class="btn btn-outline-secondary">Not Available</a>
                        @endif

                        @endif

                    </form>
                    </div>
                  </div>
                </div>

                @endforeach
                @else
                <div class="col-lg-12">
              <div class="box">
                <h1 align="center">No results found.</h1>
              </div>
              </div>
                @endif

              </div>


              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allbooks->links()}}
                    
                  </ul>
                </nav>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
@endsection