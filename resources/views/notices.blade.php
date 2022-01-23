@extends('layouts.app')
@section('title', 'Notice')

@section('content')
<div id="all">
      <div id="content">
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

          <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allnotice->links()}}
                    
                  </ul>
                </nav>
              </div>

        </div>
        </div>
      </div>
    </div>
@endsection