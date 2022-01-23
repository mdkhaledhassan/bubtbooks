@extends('layouts.app')
@section('title', $allnotice->title)

@section('content')

<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/notices">Notices</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{$allnotice->title}}</li>
                </ol>
              </nav>
            </div>
            <div id="blog-post" class="col-lg-12">
              <div class="box">
                <h1>{{$allnotice->title}}</h1>
                <p style="text-align:left;">
                        <div class="author-date">Date: {{$allnotice->created_at->timezone('Asia/Dhaka')->format('d M Y ')}} | Time: {{$allnotice->created_at->timezone('Asia/Dhaka')->format('h:i A')}} 
                        <span style="float:right;">
                          <div class="fb-share-button" data-href="https://bubtbooks.com/notice/{{$allnotice->id}}/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbubtbooks.com%2Fnotice%2F%257B%257B%24allnotice-%3Eid%257D%257D%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        </span>
                      </div>
                    </p> 
                <hr>
                <div id="post-content">
                  <p> 
                    {{$allnotice->description}}
                    <br>
                    <hr>
                    <center>


                    @if($allnotice->file == 'notice.jpg')
                       
                    @else
                    <iframe src="{{url('file/'.$allnotice->file)}}#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" frameborder="0" scrolling="auto" width="800" height="650"></iframe>
                    @endif
                    

                    </center> </p>
                </div>


              </div>

            </div>

          </div>
        </div>
      </div>
    </div>





@endsection