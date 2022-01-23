@extends('layouts.app')
@section('title', 'Notices')

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
                  <li aria-current="page" class="breadcrumb-item active">Notices</li>
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
            <div class="col-lg-9">
              @if(session()->has('notif'))
                  <ul class="breadcrumb">
                  
               {{ session()->get('notif') }} 

              </ul>
                  @endif
              <div class="box">
                  
                  <h3><p style="text-align:left;">
                        Notices
                        <span style="float:right;">
                          <a href="#" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#addnotice-modal">Add Notice</a>
                        </span>
                    </p>
                  </h3>
                <hr>
                

                <div id="addnotice-modal" tabindex="-1" role="dialog" aria-labelledby="Add Notice" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding Notice</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="/viewnotice" method="post" enctype="multipart/form-data">
                        @csrf
                  <div class="form-group">
                    <label for="title">Notice Title</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                                @error('description')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="file">File</label>
                    <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" autofocus>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Add Notice</button>
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
                       <th>Title</th>                       
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allnotice as $aln)
                      <tr>
                        <th>{{$aln->title}}</th>
                        <td> 
                        <a href="#" data-title="{{$aln->title}}" data-file="{{$aln->file}}" data-description="{{$aln->description}}" data-id="{{$aln->id}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a>
                        <a href="/viewupdate/{{$aln->id}}"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="{{$aln->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Notice" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Notice</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to trash notice?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/viewnotice" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('deletenotice', ['id' => $aln->id]) }}" method="post">
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




        <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="View Notice" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Notice</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form>
                        {{csrf_field()}}
                <div id="post-content">
                  <p><h5 align="left"><strong>Notice Title : </strong>
                    <br>
                    <textarea class="border-0" rows="1" cols="60" readonly>{{$aln->title}}</textarea></h5></p>

                  <p><h5 align="left"><strong>Description : </strong>
                    <br>
                    <textarea class="border-0" rows="5" cols="60" readonly>{{$aln->description}}</textarea>
                    </h5></p>

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

  $('#view-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var title = a.data('title') 
      var file = a.data('file') 
      var description = a.data('description') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #file').val(file);
      modal.find('.modal-body #description').val(description);
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
