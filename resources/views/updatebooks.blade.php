@extends('layouts.app')
@section('title', 'Update Book Information')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/admin">Admin Panel</a></li>
                  <li class="breadcrumb-item"><a href="/viewbooks">Books</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Update Book Information</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link active"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
                </div>
              </div>


            </div>
            @foreach($allbooks as $alb)
            <div class="col-lg-9">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">

                <h3>Update Book Information</h3>
                <hr>


                
                <form action="{{ route('updatebook', ['id' => $alb->id]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                  <input type="hidden" name="id" id="id" value="">

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input id="bookname" type="text" class="form-control" name="bookname" value="{{$alb->bookname}}" required autocomplete="bookname" autofocus>

                                @error('bookname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="depname">Department Name</label>
                    <input id="depname" type="text" class="form-control" name="depname" value="{{$alb->depname}}" required autocomplete="depname" autofocus>

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
                    <input id="authorname" type="text" class="form-control" name="authorname" value="{{$alb->authorname}}" required autocomplete="authorname" autofocus>

                                @error('authorname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="semname">Semester Name</label>
                    <input id="semname" type="text" class="form-control" name="semname" value="{{$alb->semname}}" required autocomplete="semname" autofocus>

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
                    <input id="coursecode" type="text" class="form-control" name="coursecode" value="{{$alb->coursecode}}" required autocomplete="coursecode" autofocus>

                                @error('coursecode')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="buyingprice">Buying Price</label>
                    <input id="buyingprice" type="text" class="form-control" name="buyingprice" value="{{$alb->buyingprice}}" required autocomplete="buyingprice" autofocus>

                                @error('buyingprice')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookpic">Book Photo</label>
                    <input id="bookpic" type="file" class="form-control" name="bookpic" value="{{$alb->bookpic}}">

                                @error('bookpic')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="sellingprice">Selling Price</label>
                    <input id="sellingprice" type="text" class="form-control" name="sellingprice" value="{{$alb->sellingprice}}" required autocomplete="sellingprice" autofocus>

                                @error('sellingprice')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookpdf">Book PDF</label>
                    <input id="bookpdf" type="file" class="form-control" name="bookpdf" value="{{$alb->bookpdf}}">

                                @error('bookpdf')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="totalquantity">Quantity</label>
                    <input id="totalquantity" type="text" class="form-control" name="totalquantity" value="{{$alb->totalquantity}}" required autocomplete="totalquantity" autofocus>

                                @error('totalquantity')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Update Book</button>
                  </div>
                </form>


                
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
