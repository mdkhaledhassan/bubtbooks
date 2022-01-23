@extends('layouts.app')
@section('title', 'Requests Books')

@section('content')


<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Requests Books</li>
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
                <h1 align="center">Requests Books</h1>
              </div>

              <div class="row products">



              	@foreach($allreqbooks as $alb)
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

              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allreqbooks->links()}}
                    
                  </ul>
                </nav>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

@endsection