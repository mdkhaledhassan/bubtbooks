@extends('layouts.app')
@section('title', 'Requested Books')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/viewreqbook">Requests</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Requested Books</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link active"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
                  
                  <h3><p style="text-align:left;">
                        Requested Books
                        <span style="float:right;">
                          <a href="#" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#addreqbook-modal">Add Request Book</a>
                        </span>
                    </p>
                  </h3>
                <hr>
                


                  <div id="addreqbook-modal" tabindex="-1" role="dialog" aria-labelledby="Add Requesting Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Requesting Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="/reqbooks" method="post" enctype="multipart/form-data">
                        @csrf
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input id="bookname" type="text" class="form-control" name="bookname" value="{{ old('bookname') }}" required autocomplete="bookname" autofocus>

                                @error('bookname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="depname">Department Name</label>
                    <input id="depname" type="text" class="form-control" name="depname" value="{{ old('depname') }}" required autocomplete="depname" autofocus>

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
                    <input id="authorname" type="text" class="form-control" name="authorname" value="{{ old('authorname') }}" required autocomplete="authorname" autofocus>

                                @error('authorname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="semname">Semester Name</label>
                    <input id="semname" type="text" class="form-control" name="semname" value="{{ old('semname') }}" required autocomplete="semname" autofocus>

                                @error('semname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookpic">Book Photo</label>
                    <input id="bookpic" type="file" class="form-control" name="bookpic" value="{{ old('bookpic') }}" required autocomplete="bookpic" autofocus>

                                @error('bookpic')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="coursecode">Course Code</label>
                    <input id="coursecode" type="text" class="form-control" name="coursecode" value="{{ old('coursecode') }}" required autocomplete="coursecode" autofocus>

                                @error('coursecode')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookpdf">Book PDF</label>
                    <input id="bookpdf" type="file" class="form-control" name="bookpdf" value="{{ old('bookpdf') }}" required autocomplete="bookpdf" autofocus>

                                @error('bookpdf')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="reqby">Request By</label>
                    <input id="reqby" type="text" class="form-control" name="reqby" value="{{ old('reqby') }}" required autocomplete="reqby" autofocus>

                                @error('bookpdf')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Add Request Book</button>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>




                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>   
                      <th>Picture</th>                   
                       <th>Book Name</th>
                       <th>Requested By</th>                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allreqbooks as $arb)
                      <tr>
                        <th><img src="/bookpic/{{$arb->bookpic}}" alt="{{$arb->bookname}}" height="32" width="32"></th>
                      <th>{{$arb->bookname}}</th> 
                      <th>{{$arb->reqby}}</th>
                      <td><a href="#" data-reqby="{{$arb->reqby}}" data-bookname="{{$arb->bookname}}" data-authorname="{{$arb->authorname}}" data-depname="{{$arb->depname}}" data-id="{{$arb->id}}" data-semname="{{$arb->semname}}" data-coursecode="{{$arb->coursecode}}" data-bookpic="{{$arb->bookpic}}" data-bookpdf="{{$arb->bookpdf}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a><a href="/updatereqbook/{{$arb->id}}"><i class="fa fa-pencil"></i></a></td>
                      </tr>


          <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="Request Book Info" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Request Book Information</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form>
                        {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="">
                <div id="post-content">
                  <p><h5 align="left"><strong>Book Name : </strong><input id="bookname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Author Name : </strong><input id="authorname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Department : </strong><input id="depname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Semester : </strong><input id="semname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Course Code : </strong><input id="coursecode" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Requested By : </strong><input id="reqby" class="border-0" readonly></h5></p>

                </div>                
              </form>

                </div>
            </div>
          </div>
        </div>


                      @endforeach
                       
                    </tbody>
                  </table>
                </div>

              </div>

              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allreqbooks->links()}}
                    
                  </ul>
                </nav>
              </div>

            </div>
        </div>
      </div>
    </div>
        <script type="text/javascript" src="/js/app.js"></script>
        

<script> 

  $('#view-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var bookname = a.data('bookname') 
      var authorname = a.data('authorname') 
      var depname = a.data('depname') 
      var semname = a.data('semname') 
      var coursecode = a.data('coursecode') 
      var bookpdf = a.data('bookpdf')
      var bookpic = a.data('bookpic') 
      var reqby = a.data('reqby')
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #bookname').val(bookname);
      modal.find('.modal-body #authorname').val(authorname);
      modal.find('.modal-body #depname').val(depname);
      modal.find('.modal-body #semname').val(semname);
      modal.find('.modal-body #coursecode').val(coursecode);
      modal.find('.modal-body #bookpdf').val(bookpdf);
      modal.find('.modal-body #bookpic').val(bookpic);
      modal.find('.modal-body #reqby').val(reqby);
      modal.find('.modal-body #id').val(id);
})
</script>
@endsection