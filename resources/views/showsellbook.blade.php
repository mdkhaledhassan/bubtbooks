@extends('layouts.app')
@foreach($allsellbooks as $asb)
@section('title', $asb->bookname)
@endforeach
@section('content')

@foreach($allsellbooks as $asb) 
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>

                  <li class="breadcrumb-item"><a href="/sell/books">Old Books For Sell</a></li>
                  
                  <li aria-current="page" class="breadcrumb-item active">{{$asb->bookname}}</li>
                  
                  
                </ol>
              </nav>
            </div>

            
            <div class="col-lg-12 order-1 order-lg-2">

              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
                  
              <div id="productMain" class="row">

                <div class="col-md-4">
                  <div class="flipper">
                        <div class="front"><a href="#"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                </div>

                <div class="col-md-4">
                  <div class="box">
                    <h2 class="text-center"><b>{{$asb->bookname}}</b></h2>
                    <h3 class="text-center" style="color:green;"><b>৳ {{$asb->price}}</b></h3>
                    <hr>
                <p style="text-align:left;">
                        <h2>Book Details
                        <span style="float:right;">
                          <div class="fb-share-button" data-href="https://bubtbooks.com/sell/books/{{$asb->id}}/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbubtbooks.com%2Fsell%2Fbooks%2F%257B%257B%24asb-%3Eid%257D%257D%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        </span>
                      </h2>
                    </p>
                <hr>
                <div id="post-content">
                  <p><h5><strong>Book Name : </strong>{{$asb->bookname}}</h5></p>
                  <p><h5><strong>Book Author : </strong>{{$asb->authorname}}</h5></p>
                  <p><h5><strong>Course Code : </strong>{{$asb->coursecode}}</h5></p>
                  <p><h5><strong>Department : </strong>{{$asb->depname}}</h5></p>
                  <p><h5><strong>Semester : </strong>{{$asb->semname}}</h5></p>
                  <p><h5><strong>Book Type : </strong>{{$asb->booktype}}</h5></p>
                  <p><h5><strong>Description : </strong>{{$asb->description}}</h5></p>
                </div>


                </div>
                </div>

                <div class="col-md-4">
                  <div class="box">
                    <h2 class="text-center">Seller Information</h2>
                  <hr>
                  
                    <h2 class="text-center"><b>{{$asb->name}}</b></h2>
                    <h3 class="text-center" style="color:green;"><i class="fa fa-phone"></i> <b>{{$asb->phonenumber}}</b></h3>
                    <h4 class="text-center" style="color:grey;"><i class="fa fa-envelope"></i> <b>{{$asb->email}}</b></h4>
                  
                </div>              
              </div>
            </div>
            @endforeach


            <div class="box">
                <h1 align="center">Related Sell Books</h1>
              </div>

              <div class="row products">

                @foreach(\App\SellBook::all()->where('depname', $asb->depname)->where('semname', $asb->semname)->where('status', 'Published')->where('id', '!=', $asb->id) as $asb)
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

                      <p class="buttons"><a href="/sell/books/{{$asb->id}}" class="btn btn-outline-secondary">View Book</a>
                      </p>
                    </div>
                  </div>
                </div>

                @endforeach

              </div>

          </div>
        </div>
      </div>
    </div>

@endsection