@extends('staff.main.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 pl-1">
        <h1 class="text-capitalize">Add Address</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('staff.home')}}">Home</a></li>
          <li class="breadcrumb-item active text-capitalize">Address Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card card-info">
    <form role="form" method="POST" action="{{route('staff.address.store')}}" class="validate" id="validate">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="name">Address</label>
          <input type="text"  class="form-control max" id="name" placeholder="Enter Address" name="name" autocomplete="off" autofocus value="{{old('name')}}">
          @error('name')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="location">Location</label>
          <input type="text"  class="form-control max" id="location" placeholder="Enter location" name="location" autocomplete="off" autofocus value="{{old('location')}}">
          @error('location')
          <span class="text-danger font-italic" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        {{-- <div class="col-md-6 flex-column" id="map" style="width: 600px; height: 400px;">


        </div> --}}  


      </div>
      <div class="card-footer justify-content-between">
        <button type="submit" class="btn btn-info text-capitalize">Save</button>
      </div>
    </form>
  </div>
</section>
@endsection
@push('javascript')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1dKX5bl_Y-oEyO07qya3paa3RpdOVzb0&libraries=places"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var autocomplete;
    var to = 'location';
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)),{
      types:['geocode'],
    });

  });
</script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1dKX5bl_Y-oEyO07qya3paa3RpdOVzb0"></script>
<script type="text/javascript">
    var locations = <?php echo $data ?>;
    let provided_longitude = '<?php echo $data->longitude; ?>';
    let provided_latitude = <?php echo $data->latitude; ?>;

    // console.log(locations,provided_longitude, provided_latitude);

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(provided_latitude, provided_longitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // var infowindow = new google.maps.InfoWindow();

    var marker, i;

    // for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(provided_latitude, provided_longitude),
            map: map
        });
    // }
</script> --}}
@endpush