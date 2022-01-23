@extends('layouts.app')
@section('title', 'Messages')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/admininbox">Inbox</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Messages</li>
                </ol>
              </nav>
              <div id="error-page" class="row">
                <div class="col-md-9 mx-auto">
                  @if(session()->has('notif'))
                    <ul class="breadcrumb">
                    
                 {{ session()->get('notif') }} 

                </ul>
                    @endif
                  <div class="box" align="left">
                <h3>Messages</h3>
                <hr>
                
                <div class="col-lg-14">
                  <div class="card border-primary mb-3" id="auto_load_div">
                    <div class="row">


                      <div class="col-lg-12">
                      <div class="card-body">
                        
                        
                        @foreach($messages as $ms) 
                        @if( $ms->receiverid == Auth::user()->id &&$ms->senderid == $senderid )
                        <div class="box-footer text-left"><div id="blog-post"><p class="author-date">{{$ms->sendername}} - {{$ms->created_at->timezone('Asia/Dhaka')->format('d M - h:i A')}}</p></div>{{$ms->message}}</div>
                        @elseif( $ms->senderid == Auth::user()->id && $ms->receiverid == $senderid )
                        <div class="box-footer text-right"><div id="blog-post"><p class="author-date">{{$ms->sendername}} - {{$ms->created_at->timezone('Asia/Dhaka')->format('d M - h:i A')}}</p></div>{{$ms->message}}</div>
                        @endif
                        @endforeach 
                           
                      </div>
                      </div>

                  </div>
                </div>
                </div>



                <form action="{{ route('adminchat') }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="senderid" id="senderid" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="sendername" id="sendername" value="{{ Auth::user()->name }}">
                  @foreach($allusers as $alu)
                  <input type="hidden" name="receiverid" id="receiverid" value="{{ $alu->senderid }}">
                  @endforeach 
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea type="text" name="message" id="message" class="form-control" placeholder="write message..."></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <button class="btn btn-primary">Send Message</button>
                      </div>
                    </div>
                  </form>


                  
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

