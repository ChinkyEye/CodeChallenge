@extends('staff.main.app')
@section('content')
<section class="content">
  <a href="{{ route('staff.address.create') }}" class="btn btn-sm btn-info text-capitalize rounded-0" data-toggle="tooltip" data-placement="top" title="Add Address">Add</a>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-bordered table-hover m-0 table-sm">
        <thead class="bg-dark">
          <tr class="text-center">
            <th width="10">SN</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $key => $student)
          <tr class="text-center">
            <td>{{$key+1}}</td>
            <td>{{$student->user_name}}</td>
            <td>{{$student->name}}</td>
            <td>-</td>
          </tr>
          @endforeach
        </tbody>
        <tbody>
          @foreach($students as $key => $data)
          <tr class="text-center">
            <td>{{$key+1}}</td>
            <td>{{$data->user_name}}</td>
            <td>{{$data->getAddress->name}}</td>
            <td>-</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection