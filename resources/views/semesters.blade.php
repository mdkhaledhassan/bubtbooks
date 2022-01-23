@extends('layouts.app')
@section('title', 'Semesters')

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
                  <li aria-current="page" class="breadcrumb-item active">Semesters</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link active"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
                        Semesters
                        <span style="float:right;">
                          <a href="#" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#addsemester-modal">Add Semester</a>
                        </span>
                    </p>
                  </h3>
                <hr>
                

                <div id="addsemester-modal" tabindex="-1" role="dialog" aria-labelledby="Add Semester" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding Semester</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="/semesters" method="post">
                        @csrf
                  <div class="form-group">
                    <label for="depname">Department Name</label>
                    <select id="depname" type="text" class="form-control" name="depname">
                      <option value="">Select Department</option>
                      @foreach($alldepartments as $ald)
                      <option value="{{$ald->depname}}">{{$ald->depname}}</option>
                      @endforeach 
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="semname">Semester Name</label>
                    <input id="semname" type="text" class="form-control" name="semname" value="{{ old('semname') }}" required autocomplete="semname" autofocus>

                                @error('semname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Add Semester</button>
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
                       <th>Semester Name</th> 
                       <th>Department Name</th>                      
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allsemesters as $als)
                      <tr>
                        <th>{{$als->semname}}</th>
                        <th>{{$als->depname}}</th>
                        <td>
                        <a href="#" data-semname="{{$als->semname}}" data-id="{{$als->id}}" data-depname="{{$als->depname}}" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="{{$als->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Semester" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Department</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to trash semester?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="semesters" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('deletesemester', ['id' => $als->id]) }}" method="post">
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





        <div id="update-modal" tabindex="-1" role="dialog" aria-labelledby="Update Semester" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Semester</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updatesemester', ['id' => $als->id]) }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                    <label for="depname">Department Name</label>
                    <select id="depname" type="text" class="form-control" name="depname">
                      <option value="">Select Department</option>
                      @foreach($alldepartments as $ald)
                      <option value="{{$ald->depname}}">{{$ald->depname}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="semname">Semester Name</label>
                    <input id="semname" type="text" class="form-control" name="semname" required autocomplete="semname" autofocus>

                                @error('semname')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Semester</button>
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
                    
                      {{$allsemesters->links()}}
                    
                  </ul>
                </nav>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>



        <script src="{{asset('js/app.js')}}"></script>

<script>
  
  $('#update-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var depname = a.data('depname')
      var semname = a.data('semname')  
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #depname').val(depname);
      modal.find('.modal-body #semname').val(semname);
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
