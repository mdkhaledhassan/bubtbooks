@extends('layouts.app')
@section('title', 'Settings')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Settings</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">

              <div class="card sidebar-menu">
                <div class="card-header">
                  <img src="/userpic/{{ Auth::user()->userpic }}" style="width:50px; height:50px; float:left; border-radius:50%; margin-right:25px;">
                  <h5>Hello,</h5>
            <h4>{{ Auth::user()->name }}</h4>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link active"><i class="fa fa-chevron-right"></i> Settings</a></ul>
                </div>
              </div>


            </div>
            <div class="col-lg-9">
                  @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
                
              <div class="box">
                <h3>Settings</h3>
                <hr>
                @foreach($allsettings as $als)
                <form action="{{ route('updatesettings') }}" method="post" enctype="multipart/form-data">
                  
                  {{csrf_field()}}

                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{$als->title}}" required="title">
                        @error('title')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="logo">Logo</label>
                        <input id="logo" type="file" class="form-control" name="logo" value="{{$als->logo}}">
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{$als->email}}">
                        @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="cover1">Cover 1</label>
                        <input id="cover1" type="file" class="form-control" name="cover1" value="{{$als->cover1}}">
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="phonenumber">Phone Number</label>
                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{$als->phonenumber}}" required="phonenumber">
                        @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="cover2">Cover 2</label>
                        <input id="cover2" type="file" class="form-control" name="cover2" value="{{$als->cover2}}">
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control" name="address" value="{{$als->address}}" required="address">
                        @error('address')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="cover3">Cover 3</label>
                        <input id="cover3" type="file" class="form-control" name="cover3" value="{{$als->cover3}}">
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="facebook">Facebook Link</label>
                        <input id="facebook" type="text" class="form-control" name="facebook" value="{{$als->facebook}}" placeholder="ex: https://facebook.com/bubtbooks">
                        @error('facebook')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="twitter">Twitter Link</label>
                        <input id="twitter" type="text" class="form-control" name="twitter" value="{{$als->twitter}}" placeholder="ex: https://twitter.com/bubtbooks">
                        @error('twitter')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="instagram">Instagram Link</label>
                        <input id="instagram" type="text" class="form-control" name="instagram" value="{{$als->instagram}}" placeholder="ex: https://instagram.com/bubtbooks">
                        @error('instagram')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="gplus">Google Plus Link</label>
                        <input id="gplus" type="text" class="form-control" name="gplus" value="{{$als->gplus}}" placeholder="ex: https://gplus.com/bubtbooks">
                        @error('gplus')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="mail">Mail Link</label>
                        <input id="mail" type="text" class="form-control" name="mail" value="{{$als->mail}}" placeholder="ex: khaledbubt@gmail.com">
                        @error('mail')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="github">Github Link</label>
                        <input id="github" type="text" class="form-control" name="github" value="{{$als->github}}" placeholder="ex: https://github.com/bubtbooks">
                        @error('github')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                      </div>
                      </div>
                      </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Settings</button>
                  </div>
                  
                  
                </form>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
