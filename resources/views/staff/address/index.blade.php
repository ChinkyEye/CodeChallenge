@extends('staff.main.app')
@section('content')
<section class="content">
  @role('writer|admin')
  <a href="{{ route('staff.address.create') }}" class="btn btn-sm btn-info text-capitalize rounded-0" data-toggle="tooltip" data-placement="top" title="Add Address">Add</a>
  @endrole
  <div class="card">
    <div class="table-responsive">
      <table class="table table-bordered table-hover m-0 table-sm">
        <thead class="bg-dark">
          <tr class="text-center">
            <th width="10">SN</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key => $address)
          <tr class="text-center">
            <td>{{$key+1}}</td>
            <td>{{$address->name}}</td>
            <td>
              <a href="{{ route('staff.address.active',$address->id) }}" data-placement="top" title="{{ $address->is_active == '1' ? 'Click to deactivate' : 'Click to activate' }}">
                <i class="fa {{ $address->is_active == '1' ? 'fa-check check-css' : 'fa-times cross-css' }}"></i>
              </a>
            </td>
            <td class="text-center">
              @role('editor')
               <a href="{{ route('staff.address.edit',$address->id) }}" class="btn btn-xs btn-outline-info" data-placement="top"title="Update"><i class="fas fa-edit"></i></a>
               @endrole
              {{-- @can('edit articles')
               <a href="{{ route('staff.address.edit',$address->id) }}" class="btn btn-xs btn-outline-info" data-placement="top"title="Update"><i class="fas fa-edit"></i></a>
              @endcan --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection