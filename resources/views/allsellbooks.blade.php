@extends('layouts.app')
@section('title', 'Old Books For Sell')

@section('content')


<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Old Books For Sell</li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-12">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">
                <h1 align="center">Old Books For Sell</h1>
              </div>

              <div class="row products">



              	@foreach($allsellbooks as $asb)
                @if (Auth::check())
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/sell/books/{{$asb->id}}"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/sell/books/{{$asb->id}}"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/sell/books/{{$asb->id}}" class="invisible"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid" width="450" height="600"></a>
                    <div class="text">
                      <h3><a href="/sell/books/{{$asb->id}}">{{$asb->bookname}}</a></h3>

                      <p class="price">
                        <del></del>৳ {{$asb->price}}
                      </p>

                      <p class="buttons"><a href="/sell/books/{{$asb->id}}" class="btn btn-outline-secondary">View Book</a></p>

                    </div>
                  </div>
                </div>
                @else
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="#" data-toggle="modal" data-target="#login-modal"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="#" data-toggle="modal" data-target="#login-modal"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="#" class="invisible login-launch-modal" data-toggle="modal" data-target="#login-modal"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid" width="450" height="600"></a>
                    <div class="text">
                      <h3><a href="#" data-toggle="modal" data-target="#login-modal">{{$asb->bookname}}</a></h3>

                      <p class="price">
                        <del></del>৳ {{$asb->price}}
                      </p>

                      <p class="buttons"><a href="#" class="btn btn-outline-secondary login-launch-modal" data-toggle="modal" data-target="#login-modal">View Book</a></p>

                    </div>
                  </div>
                </div>
                @endif

                @endforeach

              </div>

              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allsellbooks->links()}}
                    
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