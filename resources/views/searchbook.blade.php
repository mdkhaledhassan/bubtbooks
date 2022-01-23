@extends('layouts.app')
@section('title', 'Search Book')

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
                  <li class="breadcrumb-item"><a href="/viewbooks">Books</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Search Book</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link active"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
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
                        Search Book
                        <span style="float:right;">
                          <a data-toggle="collapse" id="searchbo" href="#" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><i class="fa fa-search"></i></a>
                        </span>
                    </p>
                  </h3>
                <hr>
                

                    <div id="searchbooks" class="collapse">
                  <div class="container">
                    <form method="GET" action="{{ route('searchbooks') }}" role="search" class="ml-auto">
                      <div class="input-group">
                        <input type="text" name="search" placeholder="Search Book" class="form-control">
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
                        <td><a href="#" data-bookname="{{$alb->bookname}}" data-authorname="{{$alb->authorname}}" data-depname="{{$alb->depname}}" data-id="{{$alb->id}}" data-semname="{{$alb->semname}}" data-coursecode="{{$alb->coursecode}}" data-buyingprice="{{$alb->buyingprice}}" data-sellingprice="{{$alb->sellingprice}}" data-totalquantity="{{$alb->totalquantity}}" data-bookpic="{{$alb->bookpic}}" data-bookpdf="{{$alb->bookpdf}}" data-view_count="{{$alb->view_count}}" data-toggle="modal" data-target="#view-modal"><i class="fa fa-eye"></i></a>
                        <a href="/updatebook/{{$alb->id}}"><i class="fa fa-pencil"></i></a>
                        <a href="#" data-id="{{$alb->id}}" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></a></td>
                      </tr>



                      <div id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Delete Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Deleting Book</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p class="text-center text-muted">Are you sure you want to trash book?</p>

                <div class="navbar-buttons d-flex justify-content-end" align="center">


                  <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="/viewbooks" class="btn btn-primary navbar-btn" onclick="event.preventDefault();
                                                     document.getElementById('yes').submit();">Yes</a>
                                                     <form id="yes" action="{{ route('deletebook', ['id' => $alb->id]) }}" method="post">
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



        <div id="view-modal" tabindex="-1" role="dialog" aria-labelledby="View Book" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Book Info</h5>
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

                  <p><h5 align="left" ><strong>Buying Price : </strong><input id="buyingprice" class="border-0" readonly></h5></p>

                  <p><h5 align="left" ><strong>Selling Price : </strong><input id="sellingprice" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Quantity : </strong><input id="totalquantity" class="border-0" readonly></h5></p>
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
                    
                      {{$allbooks->links()}}
                    
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
      var buyingprice = a.data('buyingprice')
      var sellingprice = a.data('sellingprice')
      var totalquantity = a.data('totalquantity')
      var bookpdf = a.data('bookpdf')
      var bookpic = a.data('bookpic') 
      var view_count = a.data('view_count') 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #bookname').val(bookname);
      modal.find('.modal-body #authorname').val(authorname);
      modal.find('.modal-body #depname').val(depname);
      modal.find('.modal-body #semname').val(semname);
      modal.find('.modal-body #coursecode').val(coursecode);
      modal.find('.modal-body #buyingprice').val(buyingprice);
      modal.find('.modal-body #sellingprice').val(sellingprice);
      modal.find('.modal-body #totalquantity').val(totalquantity);
      modal.find('.modal-body #bookpdf').val(bookpdf);
      modal.find('.modal-body #bookpic').val(bookpic);
      modal.find('.modal-body #view_count').val(view_count);
      modal.find('.modal-body #id').val(id);
})    


  $('#delete-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget) 
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
})
</script>

<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

  <script>
         $(document).ready(function() {
        $('#depname').on('change', function() {
            var depname = $(this).val();
            if(depname) {
                $.ajax({
                    url: '/viewbooks/'+depname,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#semname').empty();
                        $('#semname').focus;
                        $('#semname').append('<option value="">Select Semester</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="semname"]').append('<option value="'+ value.semname +'">' + value.semname+ '</option>');
                    });
                  }else{
                    $('#semname').empty();
                  }
                  }
                });
            }else{
              $('#semname').empty();
            }
        });
    });
    </script>

<script>
  $("#searchbo").click(function(){
        $("#searchbooks").toggle();
    });
</script>

@endsection
