@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body" >
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none" >
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Add Lead</h6>

                        <form id="myForm" method="POST" action="{{ route('store.leads')}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="name" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Email</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="email" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Phone Number</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="phone" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Address</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="address" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">City</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="city" class="form-control">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label"  style="color: gray;">Description</label>
                                <input type="text" style="background-color: aliceblue;color:black" name="description" class="form-control">
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
