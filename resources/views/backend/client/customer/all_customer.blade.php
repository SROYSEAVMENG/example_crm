@extends('admin.admin_dashboard')
@section('admin')
<style>
  .form-select {
    background-color: aliceblue;
  }
  .form-control{
    background-color: aliceblue !important;
    color: black !important;
  }
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
  }
  .dataTables_length{
    color: black;
  }
  .dataTables_info{
    color: black;
  }
  input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
  }
  .dataTables_length select {
    color: black;}
  .page-link{
    background-color: white;
  } 
  .page-link:hover{
    background-color: aliceblue;
  }
  label > span {
  color: red;
  margin-left: 3px;
}
  
  /* .form-control:focus, .form-control:hover, .form-control:active ,.form-control:checked , .form-control:click{
    -webkit-box-shadow: 0 0 0 30px aliceblue !important;
    -webkit-text-fill-color: black !important;
  } */

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content" style="background-color: aliceblue;">
    <div>
    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">
       <i class="btn-icon-prepend" data-feather="plus"></i>Add Customer
    </button>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Customer All</h6>
    <div class="table-responsive">
      <table id="dataTableExample"  class="table">
        <thead>
          <tr>
            <th style="color: gray;">S1</th>
            <th style="color: gray;">Name</th>
            <th style="color: gray;">Email</th>
            <th style="color: gray;">Phone Number</th>
            <th style="color: gray;">Sold by</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $customers as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name}}</td>
                <td style="color: black;">{{ $item->email}}</td>
                <td style="color: black;">{{ $item->phone}}</td>
                <td style="color: black;">Admin</td>
                <td>
                    <a href="{{ route('view.customers',$item->id)}}" class="btn btn-inverse-success" title="View"><i data-feather="eye"></i></a>
                    <a href="{{ route('edit.leads',$item->id)}}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                    <a href="{{ route('delete.services',$item->id)}}" id="delete" class="btn btn-inverse-danger" title="Delete"><i data-feather="trash-2"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>

{{-- Create form --}}
<div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"  style="background-color: aliceblue;">
        <div class="modal-header">
          <h5 class="modal-title" id="varyingModalLabel"  style="color: black;">Add Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <form id="myForm" method="POST" action="{{ route('store.customers')}}" class="forms-sample" >
                @csrf
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name  <span>*</span></label>
                      <input type="text" name="name" class="form-control" style="color: black;background-color:aliceblue" required>
                  </div>
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: gray;">Email <span>*</span></label>
                      <input type="text" name="email" class="form-control" style="color: black; background-color:aliceblue" required>
                  </div>
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: gray;">Phone Number <span>*</span></label>
                      <input type="text" name="phone" class="form-control" style="color: black;background-color:aliceblue" required>
                  </div>
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address <span>*</span></label>
                      <input type="text" name="address" class="form-control" style="color: black;background-color:aliceblue" required>
                  </div>
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: gray;">City <span>*</span></label>
                      <input type="text" name="city" class="form-control" style="color: black;background-color:aliceblue" required>
                  </div>
                  <div class="mb-3 form-group" >
                      <label for="exampleInputEmail1" class="form-label" style="color: gray;">Description <span>*</span></label>
                      <input type="text" name="description" class="form-control" style="color: black;background-color:aliceblue" required>
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Save</button>
              </form>
        </div>

      </div>
    </div>
  </div>
@endsection
