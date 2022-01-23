@extends('layouts.app')
@section('title', 'Request Book')

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
                  <li aria-current="page" class="breadcrumb-item active">Request Book</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/user" class="nav-link"><i class="fa fa-chevron-right"></i> My Account</a><a href="/orders" class="nav-link"><i class="fa fa-chevron-right"></i> My Orders</a><a href="/sellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Book</a><a href="/requestbook" class="nav-link active"><i class="fa fa-chevron-right"></i> Request Book</a><a href="/update" class="nav-link"><i class="fa fa-chevron-right"></i> Update Account</a><a href="/changepassword" class="nav-link"><i class="fa fa-chevron-right"></i> Change Password</a></ul>
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
                        Request Books
                        <span style="float:right;">
                          <a href="#" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#reqbook-modal">Request Book</a>
                        </span>
                    </p>
                  </h3>
                <hr>
                


                  <div id="reqbook-modal" tabindex="-1" role="dialog" aria-labelledby="Add Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Requesting Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="/requestbook" method="post">
                        @csrf
                  <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">
                  <input type="hidden" name="bubtid" id="bubtid" value="{{ Auth::user()->bubtid }}">
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
                    <label for="coursecode">Course Code</label>
                    <input id="coursecode" type="text" class="form-control" name="coursecode" value="{{ old('coursecode') }}" autofocus>

                                @error('coursecode')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="booktype">Book Type</label>
                    <select id="booktype" type="text" class="form-control" name="booktype" required autocomplete="booktype">
                      <option value="">Select Book Type</option>
                      <option value="Soft Copy">Soft Copy</option>
                      <option value="Hard Copy">Hard Copy</option>
                    </select>
                  </div>
                  </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Request Book</button>
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
                       <th>Book Name</th> 
                       <th>Book Type</th>                       
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allreqbooks as $arb)
                      <tr>
                      <th>{{$arb->bookname}}</th>
                      <th>{{$arb->booktype}}</th> 
                      <th>{{$arb->status}}</th>
                      <td><a href="#" data-bookname="{{$arb->bookname}}" data-authorname="{{$arb->authorname}}" data-depname="{{$arb->depname}}" data-id="{{$arb->id}}" data-semname="{{$arb->semname}}" data-coursecode="{{$arb->coursecode}}" data-status="{{$arb->status}}" data-booktype="{{$arb->booktype}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a><a href="#" data-bookname="{{$arb->bookname}}" data-authorname="{{$arb->authorname}}" data-depname="{{$arb->depname}}" data-id="{{$arb->id}}" data-semname="{{$arb->semname}}" data-coursecode="{{$arb->coursecode}}" data-status="{{$arb->status}}" data-booktype="{{$arb->booktype}}" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil"></i></a><a href="#" data-id="{{$arb->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



          <div id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Request" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Request</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to delete request?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/requestbook" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('deleterequest', ['id' => $arb->id]) }}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="id" id="id" value="">
        </form>
        </div>

                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="" class="btn btn-primary navbar-btn" data-dismiss="modal" aria-label="Close" class="close">No</a></div>

              </div>
              </div>
            </div>
          </div>
        </div>


        <div id="update-modal" tabindex="-1" role="dialog" aria-labelledby="Update Request" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Request</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updaterequest', ['id' => $arb->id]) }}" method="post">
                        {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="">

                    <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input id="bookname" type="text" class="form-control" name="bookname" value="{{$arb->bookname}}" required autocomplete="bookname" autofocus>

                                @error('bookname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="depname">Department Name</label>
                    <input id="depname" type="text" class="form-control" name="depname" value="{{$arb->depname}}" required autocomplete="depname" autofocus>

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
                    <input id="authorname" type="text" class="form-control" name="authorname" value="{{$arb->authorname}}" required autocomplete="authorname" autofocus>

                                @error('authorname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="semname">Semester Name</label>
                    <input id="semname" type="text" class="form-control" name="semname" value="{{$arb->semname}}" required autocomplete="semname" autofocus>

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
                    <input id="coursecode" type="text" class="form-control" name="coursecode" value="{{$arb->coursecode}}" autofocus>

                                @error('coursecode')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="booktype">Book Type</label>
                    <input id="booktype" type="text" class="form-control" name="booktype" value="{{$arb->booktype}}" autofocus>

                                @error('booktype')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Request</button>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>


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
                <div id="post-content">
                  <p><h5 align="left"><strong>Book Name : </strong><input id="bookname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Author Name : </strong><input id="authorname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Department : </strong><input id="depname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Semester : </strong><input id="semname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Course Code : </strong><input id="coursecode" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Book Type : </strong><input id="booktype" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Status : </strong><input id="status" class="border-0" readonly></h5></p>
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
      var booktype = a.data('booktype')
      var status = a.data('status') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #bookname').val(bookname);
      modal.find('.modal-body #authorname').val(authorname);
      modal.find('.modal-body #depname').val(depname);
      modal.find('.modal-body #semname').val(semname);
      modal.find('.modal-body #coursecode').val(coursecode);
      modal.find('.modal-body #booktype').val(booktype);
      modal.find('.modal-body #status').val(status);
      modal.find('.modal-body #id').val(id);
})


  $('#update-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var bookname = a.data('bookname') 
      var authorname = a.data('authorname') 
      var depname = a.data('depname') 
      var semname = a.data('semname') 
      var coursecode = a.data('coursecode') 
      var booktype = a.data('booktype')
      var status = a.data('status') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #bookname').val(bookname);
      modal.find('.modal-body #authorname').val(authorname);
      modal.find('.modal-body #depname').val(depname);
      modal.find('.modal-body #semname').val(semname);
      modal.find('.modal-body #coursecode').val(coursecode);
      modal.find('.modal-body #booktype').val(booktype);
      modal.find('.modal-body #status').val(status);
      modal.find('.modal-body #id').val(id);
})

  $('#delete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>
@endsection