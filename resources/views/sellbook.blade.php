@extends('layouts.app')
@section('title', 'Sell Book')

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
                  <li aria-current="page" class="breadcrumb-item active">Sell Book</li>
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
            <div class="col-lg-9">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">
                  
                  <h3><p style="text-align:left;">
                        Sell Books
                        <span style="float:right;">
                          <a href="#" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#reqbook-modal">Sell Book</a>
                        </span>
                    </p>
                  </h3>
                <hr>
                


                  <div id="reqbook-modal" tabindex="-1" role="dialog" aria-labelledby="Add Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Selling Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="/sellbook" method="post" enctype="multipart/form-data">
                        @csrf
                  <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">
                  <input type="hidden" name="bubtid" id="bubtid" value="{{ Auth::user()->bubtid }}">
                  <input type="hidden" name="email" id="email" value="{{ Auth::user()->email }}">
                  <input type="hidden" name="phonenumber" id="phonenumber" value="{{ Auth::user()->phonenumber }}">
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
                    <input id="coursecode" type="text" class="form-control" name="coursecode" value="{{ old('coursecode') }}" required autocomplete="coursecode" autofocus>

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
                      <option value="New">New</option>
                      <option value="Used">Used</option>
                    </select>
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Note</label>
                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" autofocus>

                                @error('description')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bookpic">Book Photo</label>
                    <input id="bookpic" type="file" class="form-control" name="bookpic" value="{{ old('bookpic') }}" required autocomplete="bookpic" autofocus>

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
                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->phonenumber }}" required autocomplete="phonenumber" autofocus>

                                @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="price">Book Price</label>
                    <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Sell Book</button>
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
                       <th>Book Type</th>                       
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allsellbooks as $asb)
                      <tr>
                        <th><img src="/bookpic/{{$asb->bookpic}}" alt="{{$asb->bookname}}" height="32" width="32"></th>
                      <th>{{$asb->bookname}}</th>
                      <th>{{$asb->booktype}}</th> 
                      <th>{{$asb->status}}</th>
                      <td><a href="#" data-bookname="{{$asb->bookname}}" data-authorname="{{$asb->authorname}}" data-depname="{{$asb->depname}}" data-id="{{$asb->id}}" data-semname="{{$asb->semname}}" data-coursecode="{{$asb->coursecode}}" data-status="{{$asb->status}}" data-booktype="{{$asb->booktype}}" data-phonenumber="{{$asb->phonenumber}}" data-price="{{$asb->price}}" data-description="{{$asb->description}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a>
                        <a href="/updatesellbook/{{$asb->id}}"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="{{$asb->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>


          <div id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Sell Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Sell Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to delete sell book?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/sellbooks" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('deletesellbook', ['id' => $asb->id]) }}" method="post">
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


          <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="Sell Book Info" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Sell Book Information</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updatesellstatus', ['id' => $asb->id]) }}" method="post">
                        {{csrf_field()}}
                  <input type="hidden" name="id" id="id" value="">
                <div id="post-content">
                  <p><h5 align="left"><strong>Book Name : </strong><input id="bookname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Author Name : </strong><input id="authorname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Department : </strong><input id="depname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Semester : </strong><input id="semname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Course Code : </strong><input id="coursecode" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Book Type : </strong><input id="booktype" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Book Price : </strong><input id="price" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Note : </strong><input id="description" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Phone Number : </strong><input id="phonenumber" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Status : </strong><input id="status" class="border-0" readonly></h5></p>
                </div>


                <div class="box">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" type="text" class="form-control" name="status" required autocomplete="status">
                      <option value="Published">Published</option>
                      <option value="Sold">Sold</option>
                    </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
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
                    
                      {{$allsellbooks->links()}}
                    
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
      var price = a.data('price') 
      var description = a.data('description') 
      var phonenumber = a.data('phonenumber') 
      var status = a.data('status') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #bookname').val(bookname);
      modal.find('.modal-body #authorname').val(authorname);
      modal.find('.modal-body #depname').val(depname);
      modal.find('.modal-body #semname').val(semname);
      modal.find('.modal-body #coursecode').val(coursecode);
      modal.find('.modal-body #booktype').val(booktype);
      modal.find('.modal-body #price').val(price);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #phonenumber').val(phonenumber);
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