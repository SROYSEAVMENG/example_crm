@extends('admin.admin_dashboard')
@section('admin')
<style>
  .page-breadcrumb .breadcrumb {
    background: aliceblue;
}
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
  .dataTables_length select {
    color: black;}
    .page-link{
    background-color: white;
  } 
  .page-link:hover{
    background-color: aliceblue;
  }

</style>

<div class="page-content" style="background-color: aliceblue;">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.amenitie')}}" class="btn btn-primary"><i class="btn-icon-prepend" data-feather="plus"></i>Add Amenities</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card"  style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Amenities All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th style="color: gray;">S1</th>
            <th style="color: gray;">Amenitie Name</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $amenities as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->amenities_name}}</td>
                <td>
                    <a href="{{ route('edit.amenitie',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('delete.amenitie',$item->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a>
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
@endsection
