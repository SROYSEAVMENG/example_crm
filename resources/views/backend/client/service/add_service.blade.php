@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body">
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Add Service</h6>

                        <form id="myForm" method="POST" action="{{ route('store.services')}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Service Name</label>
                                <input type="text" name="name" style="background-color: aliceblue; color:black" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Service Description</label>
                                <input type="text" name="description" style="background-color: aliceblue; color:black" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
