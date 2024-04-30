@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content" style="background-color: white;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body" >
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Edit Permission</h6>

                        <form id="myForm" method="POST" action="{{ route('update.permission')}}" class="forms-sample" >
                          @csrf
                          <input type="hidden" name="id" value="{{ $permission->id}}">
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Permission Name</label>
                                <input type="text" name="name" style="background-color: aliceblue;color:black" class="form-control" value="{{ $permission->name}}">
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Group Name</label>
                                <select name="group_name" style="background-color: aliceblue;color:black" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="type" {{$permission->group_name == 'type' ? 'selected': ''}}>Service Type</option>
                                    <option value="amenities" {{$permission->group_name == 'amenities' ? 'selected': ''}}>Amenities</option>
                                    <option value="role" {{$permission->group_name == 'role' ? 'selected': ''}}>Role & Permission</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
