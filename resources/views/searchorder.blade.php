@extends('layouts.app')
@section('title', 'Search Order')

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
                  <li class="breadcrumb-item"><a href="/vieworders">Orders</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Search Order</li>
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
                  <ul class="nav nav-pills flex-column"><a href="/admin" class="nav-link"><i class="fa fa-chevron-right"></i> Dashboard</a><a href="/departments" class="nav-link"><i class="fa fa-chevron-right"></i> Departments</a><a href="/semesters" class="nav-link"><i class="fa fa-chevron-right"></i> Semesters</a><a href="/viewbooks" class="nav-link"><i class="fa fa-chevron-right"></i> Books</a><a href="/viewusers" class="nav-link"><i class="fa fa-chevron-right"></i> Users</a><a href="/viewadmins" class="nav-link"><i class="fa fa-chevron-right"></i> Admins</a><a href="/vieworders" class="nav-link active"><i class="fa fa-chevron-right"></i> Orders</a><a href="/viewnotice" class="nav-link"><i class="fa fa-chevron-right"></i> Notices</a><a href="/viewreqbook" class="nav-link"><i class="fa fa-chevron-right"></i> Requests</a><a href="/viewsellbook" class="nav-link"><i class="fa fa-chevron-right"></i> Sell Books</a><a href="/trashbox" class="nav-link"><i class="fa fa-chevron-right"></i> Trash Box</a><a href="/settings" class="nav-link"><i class="fa fa-chevron-right"></i> Settings</a></ul>
                </div>
              </div>


            </div>
            <div class="col-lg-9">
              <div class="box">
                  
                  <h3><p style="text-align:left;">
                        Search Order
                        <span style="float:right;">
                          <a data-toggle="collapse" id="searchorder" href="#" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><i class="fa fa-search"></i></a>
                        </span>
                    </p>
                  </h3>
                <hr>
                
                    <div id="searchorders" class="collapse">
                  <div class="container">
                    <form action="{{ route('searchorders') }}" role="search" class="ml-auto">
                      <div class="input-group">
                        <input type="text" name="search" placeholder="Search Order" class="form-control">
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
                        <th>OrderID</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allorders as $alo)
                      <tr>
                        <th>#BUBT-{{$alo->id}}</th>
                        <th>{{$alo->username}}</th>
                        <th>{{$alo->phonenumber}}</th>
                        <th>{{$alo->address}}</th>
                        <th>{{$alo->status}}</th> 
                        <td><a href="/vieworderbooks/{{$alo->id}}"><i class="fa fa-eye"></i></a>
                          @if($alo->totalamount == $alo->paymentamount)
                          <a href="#" data-status="{{$alo->status}}" data-totalamount="{{$alo->totalamount}}" data-paymentamount="{{$alo->paymentamount}}" data-paymentmethod="{{$alo->paymentmethod}}" data-senderphonenumber="{{$alo->senderphonenumber}}" data-trxid="{{$alo->trxid}}" data-id="{{$alo->id}}" data-toggle="modal" data-target="#update1-modal"><i class="fa fa-pencil"></i></a>
                          @else
                          <a href="#" data-status="{{$alo->status}}" data-totalamount="{{$alo->totalamount}}" data-paymentamount="{{$alo->paymentamount}}" data-paymentmethod="{{$alo->paymentmethod}}" data-senderphonenumber="{{$alo->senderphonenumber}}" data-trxid="{{$alo->trxid}}" data-id="{{$alo->id}}" data-toggle="modal" data-target="#update-modal"><i class="fa fa-pencil"></i></a>
                          @endif
                      </tr>

              <div id="update1-modal" tabindex="-1" role="dialog" aria-labelledby="Update Order Status" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Payment Information</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updateorderstatus', ['id' => $alo->id]) }}" method="post">
                        {{csrf_field()}}
                  <input type="hidden" name="id" id="id" value="">
                  <h3>Payment Information</h3>
                  <hr>
                  <div id="post-content">
                  <p><h5 align="left"><strong>Book OrderID : #BUBT-</strong><input id="id" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Total Amount : </strong><input id="totalamount" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Payment Amount : </strong><input id="paymentamount" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Due Amount : </strong><input id="dueamount" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Payment Method : </strong><input id="paymentmethod" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Sender Phone Number : </strong><input id="senderphonenumber" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>TrxID : </strong><input id="trxid" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Order Status : </strong><input id="status" class="border-0" readonly></h5></p>
                </div>

                <h3>Update Order Status</h3>
                <hr>
                  <div class="form-group">
                    <label for="status">Order Status</label>
                    <select id="status" type="text" class="form-control" name="status">
                      <option value="Pending">Pending</option>
                      <option value="Processing">Processing</option>
                      <option value="Delivered">Delivered</option>
                      <option value="Partial">Partial</option>
                      <option value="Hold">Hold</option>
                      <option value="Cancel">Cancel</option>
                    </select>
                  </div>
                
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Change Status</button>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>


              <div id="update-modal" tabindex="-1" role="dialog" aria-labelledby="Update Order Status" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Payment Information</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('updateorderstatus', ['id' => $alo->id]) }}" method="post">
                        {{csrf_field()}}
                  <input type="hidden" name="id" id="id" value="">

                  <h3>Payment Information</h3>
                  <hr>
                  <div id="post-content">
                  <p><h5 align="left"><strong>Book OrderID : #BUBT-</strong><input id="id" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Total Amount : </strong><input id="totalamount" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Payment Amount : </strong><input id="paymentamount" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Due Amount : </strong><input id="dueamount" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Payment Method : </strong><input id="paymentmethod" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Sender Phone Number : </strong><input id="senderphonenumber" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>TrxID : </strong><input id="trxid" class="border-0" readonly></h5></p>

                  <p><h5 align="left"><strong>Order Status : </strong><input id="status" class="border-0" readonly></h5></p>
                </div>
                <h3>Update Order Status</h3>
                <hr>
                  <div class="form-group">
                    <label for="paymentamount">Payment Amount</label>
                    <input id="payamount" type="text" class="form-control" name="paymentamount" placeholder="">

                                @error('paymentamount')
                                    
                                        <strong>{{ $message }}</strong>
                                    
                                @enderror
                  </div>
                  

                  <div class="form-group">
                    <label for="status">Order Status</label>
                    <select id="status" type="text" class="form-control" name="status">
                      <option value="Pending">Pending</option>
                      <option value="Processing">Processing</option>
                      <option value="Delivered">Delivered</option>
                      <option value="Partial">Partial</option>
                      <option value="Hold">Hold</option>
                      <option value="Cancel">Cancel</option>
                    </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Change Status</button>
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
                    
                      {{$allorders->links()}}
                    
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
      var status = a.data('status') 
      var totalamount = a.data('totalamount')
      var paymentamount = a.data('paymentamount')
      var dueamount = a.data('totalamount') - a.data('paymentamount')
      var paymentmethod = a.data('paymentmethod')
      var senderphonenumber = a.data('senderphonenumber')
      var trxid = a.data('trxid')
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #status').val(status);
      modal.find('.modal-body #totalamount').val(totalamount);
      modal.find('.modal-body #paymentamount').val(paymentamount);
      modal.find('.modal-body #dueamount').val(dueamount);
      modal.find('.modal-body #paymentmethod').val(paymentmethod);
      modal.find('.modal-body #senderphonenumber').val(senderphonenumber);
      modal.find('.modal-body #trxid').val(trxid);
      modal.find('.modal-body #id').val(id);
})    

      $('#update1-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget)   
      var status = a.data('status') 
      var totalamount = a.data('totalamount')
      var paymentamount = a.data('paymentamount')
      var dueamount = a.data('totalamount') - a.data('paymentamount')
      var paymentmethod = a.data('paymentmethod')
      var senderphonenumber = a.data('senderphonenumber')
      var trxid = a.data('trxid')
      var id = a.data('id') 
      var modal = $(this)
      modal.find('.modal-body #status').val(status);
      modal.find('.modal-body #totalamount').val(totalamount);
      modal.find('.modal-body #paymentamount').val(paymentamount);
      modal.find('.modal-body #dueamount').val(dueamount);
      modal.find('.modal-body #paymentmethod').val(paymentmethod);
      modal.find('.modal-body #senderphonenumber').val(senderphonenumber);
      modal.find('.modal-body #trxid').val(trxid);
      modal.find('.modal-body #id').val(id);
})


      $('#view-modal').on('show.bs.modal', function (event) {
      var a = $(event.relatedTarget)    
      var totalamount = a.data('totalamount')
      var paymentamount = a.data('paymentamount')
      var dueamount = a.data('totalamount') - a.data('paymentamount')
      var paymentmethod = a.data('paymentmethod')
      var senderphonenumber = a.data('senderphonenumber')
      var trxid = a.data('trxid')
      var id = a.data('id')
      var modal = $(this)
      modal.find('.modal-body #totalamount').val(totalamount);
      modal.find('.modal-body #paymentamount').val(paymentamount);
      modal.find('.modal-body #dueamount').val(dueamount);
      modal.find('.modal-body #paymentmethod').val(paymentmethod);
      modal.find('.modal-body #senderphonenumber').val(senderphonenumber);
      modal.find('.modal-body #trxid').val(trxid);
      modal.find('.modal-body #id').val(id);
})  
</script>

<script>
  $("#searchorder").click(function(){
        $("#searchorders").toggle();
    });
</script>

@endsection