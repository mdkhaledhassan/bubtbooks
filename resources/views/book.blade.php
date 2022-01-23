@extends('layouts.app')
@foreach($allbooks as $alb)
@section('title', $alb->bookname)
@endforeach

@section('content')

@foreach($allbooks as $alb)
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  
                  <li class="breadcrumb-item"><a href="/books/{{$alb->depname}}">{{$alb->depname}}</a></li>
                  
                  
                  <li class="breadcrumb-item"><a href="/books/{{$alb->depname}}/{{$alb->semname}}">{{$alb->semname}}</a></li>
                  
                  
                  <li aria-current="page" class="breadcrumb-item active">{{$alb->bookname}}</li>
                  
                  
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
                        <div class="front"><a href="#"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                </div>

                <div class="col-md-8">
                  <div class="box">
                    <h1 class="text-center"><b>{{$alb->bookname}}</b></h1>
                    @if( $alb->sellingprice > 0)
                      <h2 class="text-center" style="color:green;"><b>৳ {{$alb->sellingprice}}</b></h2>
                      @else
                      <h2 class="text-center" style="color:red;">(Only PDF Available)</h2>
                      @endif
                    

                    <p class="text-center buttons">
                      @if (Auth::check())
                      @if( $alb->totalquantity > 0)
                      <a href="{{ route('cartadd', ['id' => $alb->id ]) }}" class="btn btn-outline-primary">Buy Book</a>
                      @else
                      <a href="#" class="btn btn-outline-primary">Not Available</a>
                      @endif

                      <a href="/bookdownload/{{$alb->bookpdf}}" class="btn btn-outline-primary">Download PDF</a><a href="#" data-id="{{$alb->id}}" class="btn btn-outline-primary read-launch-modal" data-toggle="modal" data-target="#read-modal">Read Book</a>
                      @else

                      @if( $alb->totalquantity > 0)
                      <a href="#" class="btn btn-outline-primary login-launch-modal" data-toggle="modal" data-target="#login-modal">Buy Book</a>
                      @else
                      <a href="#" class="btn btn-outline-primary">Not Available</a>
                      @endif

                      <a href="#" class="btn btn-outline-primary login-launch-modal" data-toggle="modal" data-target="#login-modal">Download PDF</a><a href="#" class="btn btn-outline-primary login-launch-modal" data-toggle="modal" data-target="#login-modal">Read Book</a>
                      @endif
                      
                    </p>

                    <hr>
                <p style="text-align:left;">
                        <h2>Book Details
                        <span style="float:right;">
                          <div class="fb-share-button" data-href="https://bubtbooks.com/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbubtbooks.com%2Fbooks%2F%257B%257B%24alb-%3Edepname%257D%257D%2F%257B%257B%24alb-%3Esemname%257D%257D%2F%257B%257B%24alb-%3Ebookname%257D%257D%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        </span>
                      </h2>
                    </p>
                <hr>
                <div id="post-content">
                  <p><h5><strong>Book Name : </strong>{{$alb->bookname}}</h5></p>
                  <p><h5><strong>Book Author : </strong>{{$alb->authorname}}</h5></p>
                  <p><h5><strong>Course Code : </strong>{{$alb->coursecode}}</h5></p>
                  <p><h5><strong>Department : </strong>{{$alb->depname}}</h5></p>
                  <p><h5><strong>Semester : </strong>{{$alb->semname}}</h5></p>
                </div>




          <div id="read-modal" tabindex="-1" role="dialog" aria-labelledby="Read Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-lg modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">{{$alb->bookname}}</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <center><embed type="application/pdf" src="{{url('bookpdf/'.$alb->bookpdf)}}#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" frameborder="0" scrolling="auto" width="750" height="650" style="border: 1px solid black;"/></center>
            </div>
          </div>
        </div>

                  </div>
                </div>              
              </div>
            </div>
            @endforeach
            
            
            
            <div class="box">
                <h1 align="center">Related Books</h1>
              </div>

              <div class="row products">

                @foreach(\App\Book::all()->where('semname', $alb->semname)->where('id', '!=', $alb->id) as $alb)
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}" class="invisible"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid" width="450" height="600"></a>
                    <div class="text">
                      <h3><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}">{{$alb->bookname}}</a></h3>
                      @if( $alb->sellingprice > 0)
                      <p class="price">
                        <del></del>৳ {{$alb->sellingprice}}
                      </p>
                      @else
                      @endif

                      <p class="buttons"><a href="/books/{{$alb->depname}}/{{$alb->semname}}/{{$alb->bookname}}" class="btn btn-outline-secondary">View Book</a>
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
<script src="{{asset('js/app.js')}}"></script>
<script>
$('#read-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>

@endsection