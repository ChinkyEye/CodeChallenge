@extends('staff.main.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Student</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('staff.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">Student Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('staff.student.store')}}" class="validate" id="validate">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="user_name">Student Name</label>
          <input type="text"  class="form-control max" id="user_name" placeholder="Enter Student Name" name="user_name" autocomplete="off" autofocus value="{{old('user_name')}}">
          @error('user_name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="address" class="control-label">Address <span class="text-danger">*</span></label>
          <select class="form-control" name="address_id" id="address">
            <option value="">Select Your Address</option>
            @foreach ($addresses as $key => $address)
            <option value="{{ $address->id }}">
              {{$address->name}}
            </option>
            @endforeach
          </select>
          @error('address_id')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone_no">Phone no</label>
          <input type="text"  class="form-control max" id="phone_no" placeholder="Enter Student Name" name="phone_no" autocomplete="off" autofocus value="{{old('phone_no')}}">
          @error('phone_no')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="text"  class="form-control max" id="age" placeholder="Enter Student Name" name="age" autocomplete="off" autofocus value="{{old('age')}}">
          @error('age')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text"  class="form-control max" id="description" placeholder="write..." name="description" autocomplete="off" autofocus value="{{old('description')}}">
          @error('description')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group item1">
          <label for="image">Image</label>
          <input type="file"  class="form-control max" id="image" placeholder="write..." name="image" autocomplete="off" autofocus value="{{old('image')}}">
          <button type="button" class="btn btn-primary item">Add</button>
          @error('image')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group item2" style="display:none">
          <div class="item3">
            <label for="pdf">File</label>
            <input type="file"  class="form-control max" placeholder="write..." name="pdf" autocomplete="off" autofocus value="{{old('pdf')}}">
            <button type="button" class="btn-danger">Remove</button>
          </div>
        </div>

      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Save</button>
      </div>
    </form>
  </div>
</section>
@endsection
@push('javascript')
<script>
  $(document).ready(function(){
    $(".item").click(function(){
      var inputHtml = $('.item2').html();
      $('.item1').after(inputHtml);
       var c = 100;
       var c=200;
       let x = 10;
       x = 20;
       const name = "milan";
       {
        var c= 500;
        let x = 30;
        const name = "arjun";
       }
       console.log(name);
       console.log(c,x);

    })
  });

  $("body").on("click",'.btn-danger',function(){
    // var lols = $(this).closest('div.item3');
    var lols = $(this).parents('div.item3').remove();
    console.log(lols);
  })

</script>
@endpush