@extends('layouts.app')
@section('title', 'Read Book')

@section('content')

<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/{{$ob->depname}}">{{$ob->depname}}</a></li>
                  <li class="breadcrumb-item"><a href="/{{$ob->depname}}/{{$ob->semname}}">{{$ob->semname}}</a></li>
                  <li aria-current="page" class="breadcrumb-item active">{{$ob->bookname}}</li>
                </ol>
              </nav>
            </div>
            <div id="blog-post" class="col-lg-12">
              <div class="box">
                <h1>{{$ob->bookname}}</h1>
                <p class="author-date">Author Name: {{$ob->authorname}} | Department: {{$ob->depname}} | Semester: {{$ob->semname}}</p>
                <div id="post-content">
                  <p> <center> 


                    <embed src="{{url('bookpdf/'.$ob->bookpdf)}}" type="application/pdf" width="100%" height="600px" />
                    
                    <embed src="{{url('bookpdf/'.$ob->bookpdf)}}#toolbar=0&scrollbar=0&navpanes=0&embedded=true&statusbar=0&view=Fit;readonly=true;disableprint=true;" frameborder="0" scrolling="auto" width="800" height="650" style="border: 1px solid black;"/>


                    </center> </p>
                </div>


              </div>

            </div>

          </div>
        </div>
      </div>
    </div>





@endsection