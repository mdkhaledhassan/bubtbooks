@extends('layouts.app')
@section('title', 'Download Book')

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
                  
                  <li class="breadcrumb-item"><a href="/{{$alb->depname}}">{{$alb->depname}}</a></li>
                  
                  
                  <li class="breadcrumb-item"><a href="/{{$alb->depname}}/{{$alb->semname}}">{{$alb->semname}}</a></li>
                  
                  
                  <li aria-current="page" class="breadcrumb-item active">{{$alb->bookname}}</li>
                  
                  
                </ol>
              </nav>
            </div>

            
            <div class="col-lg-12 order-1 order-lg-2">
              <div id="productMain" class="row">
                <div class="col-md-12">
                  <div class="box">
                    <h2 class="text-center">{{$alb->bookname}}</h2>
                    <p class="price"></p>
                    <p class="text-center buttons"><a href="/bookdownload/{{$alb->bookpdf}}" class="btn btn-outline-primary">Download PDF Book</a></p>

                  </div>
                </div>              
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

@endsection