@extends('manager.main.app')
@section('content')
<section class="content">
  <a href="{{ route('manager.staff.create') }}" class="btn btn-sm btn-info text-capitalize rounded-0" data-toggle="tooltip" data-placement="top" title="Add Address">Add</a>
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
          @foreach($datas as $key => $user)
          <tr class="text-center">
            <td>{{$key+1}}</td>
            <td>{{$user->user_name}}</td>
            <td>{{$user->name}}</td>
            <td>-</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection