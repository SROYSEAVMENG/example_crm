@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="{{route('all.customers')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('all.customers.services')}}">List Services</a></li>
              <li class="breadcrumb-item active"><a href="#">List Call</a></li>
              <li class="breadcrumb-item active"><a href="#">List Appointment</a></li>
              <li class="breadcrumb-item active"><a href="#">List Quotation</a></li>
              <li class="breadcrumb-item active"><a href="#">List Document</a></li>
            </ol>
          </nav>
    </div>
   <br>
    <div class="row profile-body">
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">View Customer Information</h6>

                        <form id="myForm" method="POST" action="" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name</label>
                                <input type="text" style="background-color: aliceblue; color:black" name="name" class="form-control" value="{{ $customers->name }}">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;" >Email</label>
                                <input type="text" style="background-color: aliceblue; color:black" name="email" class="form-control" value="{{ $customers->email }}">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Phone Number</label>
                                <input type="text" style="background-color: aliceblue; color:black" name="phone" class="form-control" value="{{ $customers->phone }}">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address</label>
                                <input type="text" style="background-color: aliceblue; color:black" name="address" class="form-control" value="{{ $customers->address }}">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">City</label>
                                <input type="text" style="background-color: aliceblue; color:black" name="city" class="form-control" value="{{ $customers->city }}">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Description</label>
                                <input type="text" style="background-color: aliceblue; color:black" name="description" class="form-control" value="{{ $customers->description }}">
                            </div>

                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
