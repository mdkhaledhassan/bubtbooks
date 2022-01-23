@extends('layouts.app')
@foreach($alldepartments as $ald)
@section('title', $ald->depname)
@endforeach
@section('content')


<div id="all">
          <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                @foreach($alldepartments as $ald)                
                  <h2 class="mb-0">{{$ald->depname}} Semesters</h2>
                  @endforeach
                </div>
              </div>
            </div>
          </div>


          <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              @if($allsemesters->count() > 0)
          @foreach($allsemesters as $als)

                  <div class="col-md-4 mb-4">
                  <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                      <h3><a href="/books/{{$als->depname}}/{{$als->semname}}">{{$als->semname}}</a></h3>
                  </div>
                </div>

        @endforeach
        @else
                
        @endif 
		      </div>
		        </div>
		        </div>
		      </div>

          </div>
        </div>



@endsection