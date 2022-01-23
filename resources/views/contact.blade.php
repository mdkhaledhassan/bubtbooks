@extends('layouts.app')
@section('title', 'Contact')

@section('content')

<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Contact</li>
                </ol>
              </nav>
            </div>
            
            <div class="col-lg-12">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div id="contact" class="box">
                <h1>Contact</h1>
                <hr>
                <form action="{{ route('contact') }}" method="post">
                  {{csrf_field()}}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" name="firstname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" name="lastname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="subject">Subject</label>
                        <input id="subject" name="subject" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send Message</button>
                    </div>
                  </div>

                </form>
                <hr>

                <div class="row">
                  @foreach(\App\Settings::all()->where('id', '1') as $als)
                  <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i> Address</h3>
                    <p><strong>{{$als->address}}</strong></p>
                  </div>
                  <div class="col-md-4">
                    <h3><i class="fa fa-phone"></i> Phone Number</h3>
                    <p><strong>{{$als->phonenumber}}</strong></p>
                  </div>
                  <div class="col-md-4">
                    <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                    <p><strong><a href="mailto:">{{$als->email}}</a></strong></p>
                  </div>
                  @endforeach
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

@endsection