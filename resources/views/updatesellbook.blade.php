@extends('layouts.app')
@section('title', 'Update Sell Book Information')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/user">My Account</a></li>
                  <li class="breadcrumb-item"><a href="/sellbook">Sell Book</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Update Sell Book Information</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/user" class="nav-link"><i class="fa fa-chevron-right"></i> My Account</a><a href="/orders" class="nav-link"><i class="fa fa-chevron-right"></i> My Orders</a><a href="/sellbook" class="nav-link active"><i class="fa fa-chevron-right"></i> Sell Book</a><a href="/requestbook" class="nav-link"><i class="fa fa-chevron-right"></i> Request Book</a><a href="/update" class="nav-link"><i class="fa fa-chevron-right"></i> Update Account</a><a href="/changepassword" class="nav-link"><i class="fa fa-chevron-right"></i> Change Password</a></ul>
                </div>
              </div>


            </div>
            @foreach($allsellbooks as $asb)
            <div class="col-lg-9">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">

                <h3>Update Sell Book Information</h3>
                <hr>


                
                <form action="{{ route('updatesellbook', ['id' => $asb->id]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                  <input type="hidden" name="id" id="id" value="">


                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input id="bookname" type="text" class="form-control" name="bookname" value="{{$asb->bookname}}" required autocomplete="bookname" autofocus>

                                @error('bookname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="depname">Department Name</label>
                    <input id="depname" type="text" class="form-control" name="depname" value="{{$asb->depname}}" required autocomplete="depname" autofocus>

                                @error('depname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="authorname">Author Name</label>
                    <input id="authorname" type="text" class="form-control" name="authorname" value="{{$asb->authorname}}" required autocomplete="authorname" autofocus>

                                @error('authorname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="semname">Semester Name</label>
                    <input id="semname" type="text" class="form-control" name="semname" value="{{$asb->semname}}" required autocomplete="semname" autofocus>

                                @error('semname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="coursecode">Course Code</label>
                    <input id="coursecode" type="text" class="form-control" name="coursecode" value="{{$asb->coursecode}}" required autocomplete="coursecode" autofocus>

                                @error('coursecode')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="booktype">Book Type</label>
                    <input id="booktype" type="text" class="form-control" name="booktype" value="{{$asb->booktype}}" required autocomplete="booktype" autofocus>

                                @error('booktype')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Note</label>
                    <input id="description" type="text" class="form-control" name="description" value="{{$asb->description}}" autofocus>

                                @error('description')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookpic">Book Photo</label>
                    <input id="bookpic" type="file" class="form-control" name="bookpic" value="{{$asb->bookpic}}" required autocomplete="bookpic" autofocus>

                                @error('bookpic')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{$asb->phonenumber}}" required autocomplete="phonenumber" autofocus>

                                @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="price">Book Price</label>
                    <input id="price" type="text" class="form-control" name="price" value="{{$asb->price}}" required autocomplete="price" autofocus>

                                @error('price')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Update Sell Book</button>
                  </div>
                </form>


                
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
