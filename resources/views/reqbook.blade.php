@extends('layouts.app')
@foreach($allreqbooks as $alb)
@section('title', $alb->bookname)
@endforeach
@section('content')

@foreach($allreqbooks as $alb) 
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>

                  <li class="breadcrumb-item"><a href="/requests/books">Requests Books</a></li>
                  
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
                    <h4 class="text-center" style="color:green;">Requested By {{$alb->reqby}}</h4>
                    <br>

                    @if (Auth::check())
                    <p class="text-center buttons">
                      <a href="/bookdownload/{{$alb->bookpdf}}" class="btn btn-outline-primary">Download PDF</a><a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#read-modal">Read Book</a>
                      
                    </p>
                    @else
                    <p class="text-center buttons">
                      <a href="#" class="btn btn-outline-primary login-launch-modal" data-toggle="modal" data-target="#login-modal">Download PDF</a><a href="#" class="btn btn-outline-primary login-launch-modal" data-toggle="modal" data-target="#login-modal">Read Book</a>
                      
                    </p>
                    @endif
                    

                    <hr>
                <p style="text-align:left;">
                        <h2>Book Details
                        <span style="float:right;">
                          <div class="fb-share-button" data-href="https://bubtbooks.com/requests/books/{$arb->id}/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbubtbooks.com%2Frequests%2Fbooks%2F%257B%24arb-%3Eid%257D%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
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
                <center><iframe src="{{url('bookpdf/'.$alb->bookpdf)}}#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" frameborder="0" scrolling="auto" width="750" height="650" style="border: 1px solid black;"/></iframe></center>
            </div>
          </div>
        </div>


                  </div>
                </div>              
              </div>
            </div>
            @endforeach


            <div class="box">
                <h1 align="center">Related Request Books</h1>
              </div>

              <div class="row products">

                @foreach(\App\RequestBook::all()->where('depname', $alb->depname)->where('semname', $alb->semname)->where('id', '!=', $alb->id) as $alb)
                <div class="col-lg-3 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="/requests/books/{{$alb->id}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="/requests/books/{{$alb->id}}"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="/requests/books/{{$alb->id}}" class="invisible"><img src="/bookpic/{{$alb->bookpic}}" alt="" class="img-fluid" width="450" height="600"></a>
                    <div class="text">
                      <h3><a href="/requests/books/{{$alb->id}}">{{$alb->bookname}}</a></h3>

                      <p class="buttons"><a href="/requests/books/{{$alb->id}}" class="btn btn-outline-secondary">View Book</a>
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