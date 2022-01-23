@extends('layouts.app')
@section('title', 'Update Notice')

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
                  <li class="breadcrumb-item"><a href="/viewnotice">Notices</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Update Notice</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link active"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
                </div>
              </div>


            </div>
            


            @foreach($allnotice as $aln)
            <div class="col-lg-9">
                  @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
                
              <div class="box">
                <h3>Update Notice</h3>
                <hr>
                <form action="{{ route('updatenotice', ['id' => $aln->id]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="">
                  <div class="form-group">
                    <label for="title">Notice Title</label>
                    <input id="title" type="text" value="{{$aln->title}}" class="form-control" name="title" autofocus>

                                @error('title')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" type="text" class="form-control" name="description" rows="5" cols="50" autofocus>{{$aln->description}}</textarea>

                                @error('description')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="file">File</label>
                    <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" autofocus>

                                @error('file')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Notice</button>
                  </div>
                </form>
              </div>
            </div>

            @endforeach


          </div>
        </div>
      </div>
    </div>
@endsection
