@extends('layouts.app')
@section('title', 'Sell Books')

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
                  <li aria-current="page" class="breadcrumb-item active">Sell Books</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewbooks" class="nav-link active"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
                  
                <h3>Sell Books</h3>
                <hr>

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
                        <td><a href="#" data-name="{{$asb->name}}" data-email="{{$asb->email}}" data-bubtid="{{$asb->bubtid}}" data-bookname="{{$asb->bookname}}" data-authorname="{{$asb->authorname}}" data-depname="{{$asb->depname}}" data-id="{{$asb->id}}" data-semname="{{$asb->semname}}" data-coursecode="{{$asb->coursecode}}" data-status="{{$asb->status}}" data-booktype="{{$asb->booktype}}" data-phonenumber="{{$asb->phonenumber}}" data-price="{{$asb->price}}" data-description="{{$asb->description}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a><a href="#" data-id="{{$asb->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
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


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/viewsellbooks" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('viewdeletesellbook', ['id' => $asb->id]) }}" method="post">
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
                <form action="{{ route('viewupdatesellstatus', ['id' => $asb->id]) }}" method="post">
                        {{csrf_field()}}
                  <input type="hidden" name="id" id="id" value="">
                <div id="post-content">
                  <p><h5 align="left"><strong>User Name : </strong><input id="name" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>User BUBT ID : </strong><input id="bubtid" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Book Name : </strong><input id="bookname" class="border-0" readonly></h5></p>

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
                      <option value="Hold">Hold</option>
                      <option value="Review">Review</option>
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
      var name = a.data('name') 
      var email = a.data('email') 
      var bubtid = a.data('bubtid') 
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
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #bubtid').val(bubtid);
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
