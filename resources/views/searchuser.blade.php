@extends('layouts.app')
@section('title', 'Search User')

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
                  <li class="breadcrumb-item"><a href="/viewusers">Users</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Search User</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link active"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
                        Search Users
                        <span style="float:right;">
                          <a data-toggle="collapse" id="searchus" href="#" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><i class="fa fa-search"></i></a>
                        </span>
                    </p>
                  </h3>
                <hr>


                    <div id="searchusers" class="collapse">
                  <div class="container">
                    <form method="GET" action="{{ route('searchusers') }}" role="search" class="ml-auto">
                      <div class="input-group">
                        <input type="text" name="search" placeholder="Search User" class="form-control">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <br>
                </div>



                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allusers as $alu)
                      <tr>
                        <th><img src="/userpic/{{$alu->userpic}}" alt="{{$alu->name}}" height="32" width="32"></th>
                        <th>{{$alu->name}}</th>
                        <th>{{$alu->email}}</th>
                        <th>{{$alu->phonenumber}}</th>
                        <td><a href="#" data-name="{{$alu->name}}" data-gender="{{$alu->gender}}" data-bubtid="{{$alu->bubtid}}" data-email="{{$alu->email}}" data-id="{{$alu->id}}" data-password="{{$alu->password}}" data-department="{{$alu->department}}" data-intake="{{$alu->intake}}" data-section="{{$alu->section}}" data-phonenumber="{{$alu->phonenumber}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a>
                        <a href="#" data-name="{{$alu->name}}" data-gender="{{$alu->gender}}" data-bubtid="{{$alu->bubtid}}" data-email="{{$alu->email}}" data-id="{{$alu->id}}" data-password="{{$alu->password}}" data-department="{{$alu->department}}" data-intake="{{$alu->intake}}" data-section="{{$alu->section}}" data-phonenumber="{{$alu->phonenumber}}" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="{{$alu->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete User" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting User</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to trash user?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/viewusers" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('deleteuser', ['id' => $alu->id]) }}" method="post">
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





        <div id="update-modal" tabindex="-1" role="dialog" aria-labelledby="Update User" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating User</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updateuser', ['id' => $alu->id]) }}" method="post">
                        {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="">
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $alu->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="bubtid">BUBT ID</label>
                    <input id="bubtid" type="text" class="form-control" name="bubtid" value="{{ $alu->bubtid }}" required autocomplete="bubtid" autofocus>

                                @error('bubtid')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $alu->email }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">

                                @error('email')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" type="text" class="form-control" value="{{ $alu->department }}" name="department">
                      <option value="">Select Department</option>
                      <option value="CSE">CSE</option>
                      <option value="CSIT">CSIT</option>
                      <option value="BBA">BBA</option>
                      <option value="EEE">EEE</option>
                      <option value="LLB">LLB</option>
                      <option value="Civil">Civil</option>
                      <option value="Textile">Textile</option>
                      <option value="English">English</option>
                      <option value="Economics">Economics</option>
                    </select>
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" type="text" class="form-control" value="{{ $alu->gender }}" name="gender" required autocomplete="gender">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="intake">Intake</label>
                    <input id="intake" type="intake" class="form-control" name="intake" value="{{ $alu->intake }}" class="form-control @error('intake') is-invalid @enderror" required autocomplete="intake">

                                @error('intake')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" value="{{ $alu->password }}" class="form-control @error('password') is-invalid @enderror" required autocomplete="password">

                                @error('password')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="section">Section</label>
                    <input id="section" type="section" class="form-control" name="section" value="{{ $alu->section }}" class="form-control @error('section') is-invalid @enderror" required autocomplete="section">

                                @error('section')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ $alu->phonenumber }}" required autocomplete="phonenumber" autofocus>

                                @error('phonenumber')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Update User</button>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>


              <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="View User Information" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View User Information</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form>
                        {{csrf_field()}}
                <div id="post-content">
                  <p><h5 align="left"><strong>Name : </strong><input id="name" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>BUBT ID : </strong><input id="bubtid" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Department : </strong><input id="department" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Intake : </strong><input id="intake" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Section : </strong><input id="section" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Password : </strong><input id="password" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Gender : </strong><input id="gender" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Email : </strong><input id="email" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Phone Number : </strong><input id="phonenumber" class="border-0" readonly></h5></p>
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
                    
                      {{$allusers->links()}}
                    
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
      var name = a.data('name') 
      var gender = a.data('gender')
      var bubtid = a.data('bubtid') 
      var email = a.data('email') 
      var department = a.data('department')
      var intake = a.data('intake')
      var section = a.data('section')
      var password = a.data('password') 
      var phonenumber = a.data('phonenumber') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #gender').val(gender);
      modal.find('.modal-body #bubtid').val(bubtid);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #department').val(department);
      modal.find('.modal-body #intake').val(intake);
      modal.find('.modal-body #section').val(section);
      modal.find('.modal-body #password').val(password);
      modal.find('.modal-body #phonenumber').val(phonenumber);
      modal.find('.modal-body #id').val(id);
}) 

  $('#view-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var name = a.data('name') 
      var gender = a.data('gender')
      var bubtid = a.data('bubtid') 
      var email = a.data('email') 
      var department = a.data('department')
      var intake = a.data('intake')
      var section = a.data('section')
      var bubtid = a.data('bubtid') 
      var email = a.data('email') 
      var password = a.data('password') 
      var phonenumber = a.data('phonenumber') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #gender').val(gender);
      modal.find('.modal-body #bubtid').val(bubtid);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #department').val(department);
      modal.find('.modal-body #intake').val(intake);
      modal.find('.modal-body #section').val(section);
      modal.find('.modal-body #password').val(password);
      modal.find('.modal-body #phonenumber').val(phonenumber);
      modal.find('.modal-body #id').val(id);
})    


  $('#delete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>

<script>
  $("#searchus").click(function(){
        $("#searchusers").toggle();
    });
</script>


@endsection
