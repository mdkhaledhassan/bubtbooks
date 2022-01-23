@extends('layouts.app')
@section('title', 'Live Chat')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Live Chat</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12">
              <div class="box">
                <h3>Live Chat</h3>
                <hr>



                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allusers as $alu)
                      <tr>
                        <th>{{$alu->sendername}}</th>
                        <th>
                          @if(Cache::has('is_online' . $alu->senderid))
                          <span class="badge badge-success">Online</span>
                      @else
                          <span class="badge badge-danger">Offline</span>
                      @endif
                        </th>
                        <td><a href="/adminchat/{{$alu->senderid}}"><i class="fa fa-comment"></i></a>
                          @if(\App\Chat::groupBy('senderid')->where('senderid', $alu->senderid)->where('receiverid', Auth::user()->id)->where('is_seen','0')->count() > 0)
                          <span class="badge badge-danger">{{ \App\Chat::groupBy('senderid')->where('senderid', $alu->senderid)->where('receiverid', Auth::user()->id)->where('is_seen','0')->count() }}</span>
                          @else
                          <span class="badge badge-danger"></span>
                          @endif
                        </td>
                      </tr>
                    @endforeach 
                    </tbody>
                  </table>
                </div>


                
            </div>


            <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allusers->links()}}
                    
                  </ul>
                </nav>
              </div>


          </div>
        </div>
      </div>
    </div>
@endsection



