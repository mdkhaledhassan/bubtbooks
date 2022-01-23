@extends('layouts.app')
@foreach(\App\Settings::all()->where('id', '1') as $als)
@section('title', $als->title)
@endforeach

@section('content') 

    <div id="all">
      <div id="content">
        <div class="container">
          <div class="col-md-14">
            @foreach($allsettings as $als)
              <div id="main-slider" class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img src="/img/{{$als->cover1}}" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="/img/{{$als->cover2}}" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="/img/{{$als->cover3}}" alt="Get inspired" class="img-fluid"></a></div>
              </div>
            @endforeach
            </div>
        </div>

        @if(\App\Department::count() > 0)
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Departments</h2>
                </div>
              </div>
            </div>
          </div>


          <div id="advantages">
          <div class="container">
            <div class="row mb-4">
          @foreach($alldepartments as $ald)

                  <div class="col-md-4 mb-4">
                  <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                      <h3><a href="{{ route('show', ['depname' => $ald->depname]) }}">{{$ald->depname}}</a></h3>
                  </div>
                </div>

        @endforeach
      </div>
        </div>
        </div>
      </div>
      @else
      @endif
      
      
      @if(\App\Book::count() > 0)
      <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Recently Added Books</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">

            <div class="product-slider owl-carousel owl-theme">

              @foreach($allnewbooks as $alb)
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}" class="invisible"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}">{{$alb->bookname}}</a></h3>
                  </div>
                </div>
              </div>

              @endforeach


            </div>
          </div>
        </div>
        @else
        @endif



        @if(\App\Book::count() > 0)
          <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Popular Books</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">

            <div class="product-slider owl-carousel owl-theme">

              @foreach($allbooks as $alb)
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}" class="invisible"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}">{{$alb->bookname}}</a></h3>
                  </div>
                </div>
              </div>

              @endforeach


            </div>
          </div>
        </div>
        @else
        @endif



        @if(\App\SellBook::count() > 0)
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Old Books For Sell</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">

            <div class="product-slider owl-carousel owl-theme">

              @foreach($allsellbooks as $asb)

              @if (Auth::check())
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">

                      <div class="front"><a href="/sell/books/{{$asb->id}}"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="/sell/books/{{$asb->id}}"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="/sell/books/{{$asb->id}}" class="invisible"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="/sell/books/{{$asb->id}}">{{$asb->bookname}}</a></h3>   
                  </div>
                </div>
              </div>
              @else
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">

                      <div class="front"><a href="#" data-toggle="modal" data-target="#login-modal"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="#" data-toggle="modal" data-target="#login-modal"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="#" class="invisible login-launch-modal" data-toggle="modal" data-target="#login-modal"><img src="/bookpic/{{$asb->bookpic}}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="#" data-toggle="modal" data-target="#login-modal">{{$asb->bookname}}</a></h3>   
                  </div>
                </div>
              </div>
              @endif

              

              @endforeach


            </div>
        @if(\App\SellBook::count() > 25)
          <div class="col-md-14" align="center">
            <div id="blog-homepage" align="center">
              <div class="post">
                <h4><a href="/allsellbooks">View All Books</a></h4>
                </div>
            </div>
        </div>
        @else
        @endif
          </div>
        </div>
        @else
        @endif


        @if(\App\RequestBook::count() > 0)
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Requested Books</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">

            <div class="product-slider owl-carousel owl-theme">

              @foreach($allreqbooks as $alb)
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="/requests/books/{{$alb->id}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="/requests/books/{{$alb->id}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="/requests/books/{{$alb->id}}/{{$alb->semname}}/{{$alb->bookname}}" class="invisible"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="/requests/books/{{$alb->id}}">{{$alb->bookname}}</a></h3>
                  </div>
                </div>
              </div>

              @endforeach


            </div>
          </div>
        </div>
        @else
        @endif




        @if(\App\Notice::count() > 0)
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Notice Board</h2>
                </div>
              </div>
            </div>
          </div>
          
          <div class="container">
          <div class="row">
            @foreach($allnotice as $aln)
            <div class="col-md-6">
            <div id="blog-homepage">
              
                <div class="post">
                  <h4>{{ $aln->title }}</h4>
                  <hr>

                  <p class="intro">{{ $aln->description }} <p class="read-more"><a href="/notice/{{$aln->id}}" class="btn btn-primary">Continue reading</a></p></p>
                </div>
              
            </div>
          </div>
            @endforeach
          </div> 

          @if(\App\Notice::count() > 6)
          <div class="col-md-14" align="center">
            <div id="blog-homepage" align="center">
              <div class="post">
                <h4><a href="/notices">View All Notices</a></h4>
                </div>
            </div>
        </div>
        @else
        @endif

        </div>
        
        </div>

        @else
        @endif
        


        <div class="container">
          <div class="row">
            
            <div class="col-lg-12">
              <div id="contact" class="box">

                

                <div class="row">
                  <div class="col-md-3">
                    <h4><i class="fa fa-phone"></i> Help Line</h4>
                    <p>24 Hours a Day, 7 Days a Week</p>
                  </div>

                  <div class="col-md-3">
                    <h4><i class="fa fa-money"></i> Pay cash on delivery</h4>
                    <p>Pay cash at your doorstep</p>
                  </div>

                  <div class="col-md-3">
                    <h4><i class="fa fa-truck"></i> Service</h4>
                    <p>BUBT Campus</p>
                  </div>

                  <div class="col-md-3">
                    <h4><i class="fa fa-thumbs-up"></i> Satisfaction</h4>
                    <p>100% satisfaction guaranteed</p>
                  </div>

                </div>


                
              </div>
            </div>

            
          </div>
        </div>

 

    </div>
  </div>
@endsection
