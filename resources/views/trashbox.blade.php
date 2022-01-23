@extends('layouts.app')
@section('title', 'Trash Box')

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
                  <li aria-current="page" class="breadcrumb-item active">Trash Box</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link active"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
                <h2>Trash Box</h2>
                <hr>

                <h3>Books</h3>
                

                
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                      <th>Picture</th>                       
                       <th>Book Name</th>                        
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allbooks as $alb)
                      <tr>
                        <th><img src="/bookpic/{{$alb->bookpic}}" alt="{{$alb->bookname}}" height="32" width="32"></th>
                        <th>{{$alb->bookname}}</th>
                        <th>{{$alb->depname}}</th>
                        <th>{{$alb->semname}}</th>
                        <td>
                        <a href="#" data-id="{{$alb->id}}" data-toggle="modal" data-target="#bookrestore-modal"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-id="{{$alb->id}}" data-toggle="modal" data-target="#bookdelete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="bookdelete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to permanently delete book?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('bookkill', ['id' => $alb->id]) }}" method="post">
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



        <div id="bookrestore-modal" tabindex="-1" role="dialog" aria-labelledby="Restore Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restoring Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to restore book?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes1').submit();">Yes</a>
                                                     <form id="yes1" action="{{ route('bookrestore', ['id' => $alb->id]) }}" method="post">
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





                      @endforeach 
                    </tbody>
                  </table>
                </div>


                
              </div>


              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allbooks->links()}}
                    
                  </ul>
                </nav>
              </div>


              <div class="box">
                <h3>Departments</h3>


                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>                       
                       <th>Department Name</th>                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($alldepartments as $ald)
                      <tr>
                        <th>{{$ald->depname}}</th>
                        <td>
                        <a href="#" data-id="{{$ald->id}}" data-toggle="modal" data-target="#deprestore-modal"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-id="{{$ald->id}}" data-toggle="modal" data-target="#depdelete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="depdelete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Department" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Department</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to permanently delete department?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes2').submit();">Yes</a>
                                                     <form id="yes2" action="{{ route('depkill', ['id' => $ald->id]) }}" method="post">
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




        <div id="deprestore-modal" tabindex="-1" role="dialog" aria-labelledby="Restore Department" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restoring Department</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to restore department?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes3').submit();">Yes</a>
                                                     <form id="yes3" action="{{ route('deprestore', ['id' => $ald->id]) }}" method="post">
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



                      @endforeach 
                    </tbody>
                  </table>
                </div>


                
              </div>


              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$alldepartments->links()}}
                    
                  </ul>
                </nav>
              </div>



              <div class="box">
                
                <h3>Semesters</h3>

                
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
                        <a href="#" data-id="{{$als->id}}" data-toggle="modal" data-target="#semrestore-modal"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-id="{{$als->id}}" data-toggle="modal" data-target="#semdelete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="semdelete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Semester" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Department</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to permanently delete semester?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes4').submit();">Yes</a>
                                                     <form id="yes4" action="{{ route('semkill', ['id' => $als->id]) }}" method="post">
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


        <div id="semrestore-modal" tabindex="-1" role="dialog" aria-labelledby="Restore Semester" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restoring Semester</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to restore semester?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes5').submit();">Yes</a>
                                                     <form id="yes5" action="{{ route('semrestore', ['id' => $als->id]) }}" method="post">
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



              <div class="box">

                <h3>Users</h3>

                
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
                        <td>
                        <a href="#" data-id="{{$alu->id}}" data-toggle="modal" data-target="#userrestore-modal"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-id="{{$alu->id}}" data-toggle="modal" data-target="#userdelete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="userdelete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete User" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting User</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to permanently delete user?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes6').submit();">Yes</a>
                                                     <form id="yes6" action="{{ route('userkill', ['id' => $alu->id]) }}" method="post">
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



        <div id="userrestore-modal" tabindex="-1" role="dialog" aria-labelledby="Restore User" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restoring User</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to restore user?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes7').submit();">Yes</a>
                                                     <form id="yes7" action="{{ route('userrestore', ['id' => $alu->id]) }}" method="post">
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


              <div class="box">

                <h3>Admins</h3>

                
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
                      @foreach($alladmins as $ala)
                      <tr>
                        <th><img src="/userpic/{{$ala->userpic}}" alt="{{$ala->name}}" height="32" width="32"></th>
                        <th>{{$ala->name}}</th>
                        <th>{{$ala->email}}</th>
                        <th>{{$ala->phonenumber}}</th>
                        <td>
                        <a href="#" data-id="{{$ala->id}}" data-toggle="modal" data-target="#adminrestore-modal"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-id="{{$ala->id}}" data-toggle="modal" data-target="#admindelete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="admindelete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Admin" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Admin</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to permanently delete admin?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes8').submit();">Yes</a>
                                                     <form id="yes8" action="{{ route('adminkill', ['id' => $ala->id]) }}" method="post">
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


        <div id="adminrestore-modal" tabindex="-1" role="dialog" aria-labelledby="Restore Admin" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restoring Admin</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to restore admin?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes9').submit();">Yes</a>
                                                     <form id="yes9" action="{{ route('adminrestore', ['id' => $ala->id]) }}" method="post">
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




              <div class="box">
                <h3>Notices</h3>


                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>                       
                       <th>Notice Title</th>                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allnotice as $aln)
                      <tr>
                        <th>{{$aln->title}}</th>
                        <td>
                        <a href="#" data-id="{{$aln->id}}" data-toggle="modal" data-target="#noticerestore-modal"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-id="{{$aln->id}}" data-toggle="modal" data-target="#noticedelete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="noticedelete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Notice" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Notice</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to permanently delete notice?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes222').submit();">Yes</a>
                                                     <form id="yes222" action="{{ route('noticekill', ['id' => $aln->id]) }}" method="post">
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




        <div id="noticerestore-modal" tabindex="-1" role="dialog" aria-labelledby="Restore Notice" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restoring Notice</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to restore notice?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/trashbox" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes333').submit();">Yes</a>
                                                     <form id="yes333" action="{{ route('noticerestore', ['id' => $aln->id]) }}" method="post">
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



                      @endforeach 
                    </tbody>
                  </table>
                </div>


                
              </div>



              <div class="pages">
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    
                      {{$allnotice->links()}}
                    
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

  $('#bookrestore-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget)  
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})  


  $('#bookdelete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>



<script>

  $('#deprestore-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})


  $('#depdelete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>


<script>

  $('#semrestore-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
}) 


  $('#semdelete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>


<script> 

  $('#userrestore-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
}) 


  $('#userdelete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>


<script> 

  $('#adminrestore-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})


  $('#admindelete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>


<script>

  $('#noticerestore-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})


  $('#noticedelete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>


@endsection
