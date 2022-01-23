 @extends('layouts.app')
@section('title', 'Roles')

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
                  <li aria-current="page" class="breadcrumb-item active">Roles</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/roles" class="nav-link active"><i class="fa fa-chevron-right"></i> Roles</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
              	<h3>Roles</h3>

               
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@if($allusers->count() > 0)
                      @foreach($allusers as $alu)
                      <tr>
                        <th><img src="/userpic/{{$alu->userpic}}" alt="{{$alu->name}}" height="32" width="32"></th>
                        <th>{{$alu->name}}</th>
                        <th>{{$alu->email}}</th>
                        <th>@if($alu->is_admin)
                         <a href="{{ route('removeadmin', ['id' => $alu->id]) }}" class="badge badge-danger">Remove Admin</a>
                         @else
                         <a href="{{ route('makeadmin', ['id' => $alu->id]) }}" class="badge badge-success">Make Admin</a>
                         @endif</th>
                        <td><a href="#" data-name="{{$alu->name}}" data-gender="{{$alu->gender}}" data-bubtid="{{$alu->bubtid}}" data-email="{{$alu->email}}" data-id="{{$alu->id}}" data-password="{{$alu->password}}" data-department="{{$alu->department}}" data-intake="{{$alu->intake}}" data-section="{{$alu->section}}" data-phonenumber="{{$alu->phonenumber}}" data-phonenumber="{{$alu->phonenumber}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a></td>
                      </tr>

              <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="View Information" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Information</h5>
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
                      @endif
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

</script>


@endsection