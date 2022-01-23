@extends('layouts.app')
@section('title', 'Requests')

@section('content')
<div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Requests</li>
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
                        Requests
                        <span style="float:right;">
                          <a href="/reqbooks" class="btn btn-primary navbar-btn">Requested Books</a>
                        </span>
                    </p>
                  </h3>
                <hr>
                

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
                      <td><a href="#" data-name="{{$arb->name}}" data-bubtid="{{$arb->bubtid}}" data-bookname="{{$arb->bookname}}" data-authorname="{{$arb->authorname}}" data-depname="{{$arb->depname}}" data-id="{{$arb->id}}" data-semname="{{$arb->semname}}" data-coursecode="{{$arb->coursecode}}" data-status="{{$arb->status}}" data-booktype="{{$arb->booktype}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a><a href="#" data-id="{{$arb->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
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


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/viewreqbook" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('viewdeleterequest', ['id' => $arb->id]) }}" method="post">
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


          <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="Request Book Info" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Request Book Information</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updatereqstatus', ['id' => $arb->id]) }}" method="post">
                        {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="">
                <div id="post-content">
                  <p><h5 align="left"><strong>Name : </strong><input id="name" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>BUBT ID : </strong><input id="bubtid" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Book Name : </strong><input id="bookname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Author Name : </strong><input id="authorname" class="border-0" readonly></h5></p>
                  <p><h5 align="left"><strong>Department : </strong><input id="depname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Semester : </strong><input id="semname" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Course Code : </strong><input id="coursecode" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Book Type : </strong><input id="booktype" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Status : </strong><input id="status" class="border-0" readonly></h5></p>
                </div>

                <div class="box">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" type="text" class="form-control" name="status" required autocomplete="status">
                      <option value="">Select Status</option>
                      <option value="Pending">Pending</option>
                      <option value="Seen">Seen</option>
                      <option value="Accept">Accept</option>
                      <option value="Not Available">Not Available</option>
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
      var name = a.data('name')
      var bubtid = a.data('bubtid')
      var bookname = a.data('bookname') 
      var authorname = a.data('authorname') 
      var depname = a.data('depname') 
      var semname = a.data('semname') 
      var coursecode = a.data('coursecode') 
      var booktype = a.data('booktype')
      var status = a.data('status') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #bubtid').val(bubtid);
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